<?php

require_once __DIR__ . "/init.php";

$login = include("scripts/php/fetch_login.php");

$bio = "No information";

$sql = "SELECT `bio` FROM `users` WHERE `login` = '$login'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();

while($row = $result->fetch_assoc()) {
    $bio = $row['bio'];
}

return $bio;