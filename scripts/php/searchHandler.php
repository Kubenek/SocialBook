<?php

session_start();
$conn = new mysqli("localhost", "root", "", "dane");

header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === "POST") { 

    $loginU = include "fetch_login.php";
    $idU = include "fetch_id.php";

    if (!isset($_POST['name-input']) || empty(trim($_POST['name-input']))) {
        echo json_encode(["response" => [], "error" => "No input provided"]);
        exit;
    }

    $login = trim($_POST['name-input']);
    $term = $login . "%";

    $sql = "SELECT * FROM `users` WHERE `login` LIKE ? AND `login` != ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $term, $loginU);
    $stmt->execute();
    $result = $stmt->get_result();

    $users = [];
    while ($row = $result->fetch_assoc()) {
        $checkFollow = "SELECT 1 FROM `followers` WHERE `follower_id` = ? AND `following_id` = ?";
        $stmt2 = $conn->prepare($checkFollow);
        $stmt2->bind_param("ss", $idU, $row['login']);
        $stmt2->execute();
        $followResult = $stmt2->get_result();
        $isFollowing = $followResult->num_rows > 0;

        $users[] = [
            "id" => $row["id"],
            "login" => $row['login'],
            "bio" => $row['bio'],
            "following" => ($isFollowing) ? "Following" : "Follow"
        ];
    }

    echo json_encode(["response" => $users]);

    $stmt->close();
    $conn->close();
}
?>
