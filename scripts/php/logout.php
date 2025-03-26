<?php

if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

$ssid = session_id();
$conn = new mysqli("localhost", "root", "", "dane");

$sql = "DELETE FROM `session` WHERE `session_id` = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $ssid);
$stmt->execute();
$stmt->close();
header("Location: /SocialBook/login.php");

$conn->close();
session_destroy();
exit();
