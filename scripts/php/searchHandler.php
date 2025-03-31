<?php

session_start();
$conn = new mysqli("localhost", "root", "", "dane");

header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    // Check if 'name-input' is set
    if (!isset($_POST['name-input']) || empty(trim($_POST['name-input']))) {
        echo json_encode(["response" => [], "error" => "No input provided"]);
        exit;
    }

    $login = trim($_POST['name-input']);
    $term = $login . "%";

    $sql = "SELECT * FROM `users` WHERE `login` LIKE ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $term);
    $stmt->execute();
    $result = $stmt->get_result();

    $users = [];
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }

    echo json_encode(["response" => $users]);

    $stmt->close();
    $conn->close();
}
?>
