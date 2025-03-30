<?php
header('Content-Type: application/json');
ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the JSON input from the POST body
    $data = json_decode(file_get_contents('php://input'), true);

    $username = $data['username'];
    $bio = $data['bio'];
    $user_id = include("fetch_id.php");

    // Validate input (you can adjust this as needed)
    if (empty($username) || empty($bio)) {
        echo json_encode(['success' => false, 'message' => 'Username and bio cannot be empty.']);
        exit;
    }

    // Connect to the database
    $conn = new mysqli("localhost", "root", "", "dane");

    // Check connection
    if ($conn->connect_error) {
        echo json_encode(['success' => false, 'message' => 'Database connection failed.']);
        exit;
    }

    // Prepare the update query
    $stmt = $conn->prepare("UPDATE `users` SET `login` = ?, `bio` = ? WHERE `id` = ?");
    $stmt->bind_param("ssi", $username, $bio, $user_id); // Assuming you have the user_id stored

    // Execute the query
    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to update data.']);
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}
?>
