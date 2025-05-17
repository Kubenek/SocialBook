<?php

$login = include('fetch_login.php');

$usql = "SELECT `id` FROM `users` WHERE `login` = ?";
$stmt = $conn->prepare($usql);
$stmt->bind_param("s", $login);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$userId = $row['id'];

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