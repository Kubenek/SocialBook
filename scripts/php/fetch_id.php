<?php

require_once __DIR__ . "/init.php";

$login = include("fetch_login.php");

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