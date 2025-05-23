<?php

require_once __DIR__ . "/init.php";

header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['followUser'])) {

    $follower = include "fetch_id.php";
    $following = $_POST['followUser'];  

    $checkQuery = "SELECT * FROM `followers` WHERE `follower_id` = ? AND `following_id` = ?";
    $stmt = $conn->prepare($checkQuery);
    $stmt->bind_param("ii", $follower, $following);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo json_encode(["success" => false, "error" => "Already following this user."]);
    } else {
        $insertQuery = "INSERT INTO `followers` (`id`, `follower_id`, `following_id`, `followed_at`, `seen`) VALUES (NULL, ?, ?, NOW(), FALSE)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param("ii", $follower, $following);
        if ($stmt->execute()) {
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["success" => false, "error" => "Database error"]);
        }
    }

    $stmt->close();
    
} else {
    echo json_encode(["success" => false, "error" => "Invalid request"]);
}
?>
