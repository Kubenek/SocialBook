<?php

require_once __DIR__ . "/init.php";

$uID = include "fetch_id.php";

header("Content-Type: application/json");

if($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $sql = "UPDATE `followers` SET `seen` = 1 WHERE `following_id` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i",$uID);
    
    if($stmt->execute()) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false]);
    }

    $stmt->close();

}


