<?php

if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

$ssid = session_id();
$conn = new mysqli("localhost", "root", "", "dane");

$login = include("scripts/php/fetch_login.php");

$id = "NULL";

$sql = "SELECT `id` FROM `users` WHERE `login` = '$login'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();

while($row = $result->fetch_assoc()) {
    $id = $row['id'];
}

return $id;