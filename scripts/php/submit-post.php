<?php

if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

$conn = new mysqli("localhost", "root", "", "dane");
$ssid = session_id();

$login = include('fetch_login.php');

$usql = "SELECT `id` FROM `users` WHERE `login` = '$login'";
$userId = $conn->query($usql);

$sql = "INSERT INTO `posts` (`id`, `title`, `content`, `user_id`) VALUES(NULL, ?, ?, ?)";

$title = $_POST['title'];
$content = $_POST['content'];

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssi", $title, $content, $userId);
if ($stmt->execute()) {
    header("Location: /SocialBook/feed.php");
} else {
    echo "Error: " . $stmt->error;
}