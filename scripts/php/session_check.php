<?php

require_once __DIR__ . '/init.php';

header('Content-Type: application/json');

$exists = false;

$sql = "SELECT `session_id` FROM `session` WHERE `session_id` = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $ssid);
$stmt->execute();
$result = $stmt->get_result();

if ($result->fetch_assoc()) {
    $exists = true;
}

$stmt->close();

echo json_encode(["valid" => $exists]);