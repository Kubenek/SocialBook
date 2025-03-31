<?php
session_start();
$conn = new mysqli("localhost", "root", "", "dane");

header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['followUser'])) {

    $follower = include "fetch_id.php";
    $following = $_POST['followUser']; 

    $checkQuery = "SELECT * FROM `followers` WHERE `follower_id` = ? AND `following_id` = ?";
    $stmt = $conn->prepare($checkQuery);
    $stmt->bind_param("ss", $follower, $following);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo json_encode(["success" => false, "error" => "Already following this user."]);
    } else {
        $insertQuery = "INSERT INTO `followers` (`follower_id`, `following_id`) VALUES (?, ?)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param("ss", $follower, $following);
        if ($stmt->execute()) {
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["success" => false, "error" => "Database error"]);
        }
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(["success" => false, "error" => "Invalid request"]);
}
?>
