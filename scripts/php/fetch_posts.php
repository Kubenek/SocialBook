<?php

if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

$ssid = session_id();
$conn = new mysqli("localhost", "root", "", "dane");

$sql = "SELECT * FROM `posts`";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

$posts = [];

while($row = $result->fetch_assoc()) {
    $posts[] = $row;
}

$stmt->execute();
$conn->close();

return $posts;