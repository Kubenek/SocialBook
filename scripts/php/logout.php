<?php

$Tsql = "UPDATE `users` SET `theme` = ? WHERE `id` = ?";
$cur_id = include("fetch_id.php");
$currTheme = $_SESSION['dark_status'];

$stmt = $conn->prepare($Tsql);
$stmt->bind_param("ii", $currTheme, $cur_id);
$stmt->execute();
$stmt->close();


$sql = "DELETE FROM `session` WHERE `session_id` = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $ssid);
$stmt->execute();
$stmt->close();
header("Location: /SocialBook/login.php");


session_destroy();
exit();
