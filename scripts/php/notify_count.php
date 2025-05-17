<?php

require_once __DIR__ . "/init.php";

$lID = include "fetch_id.php";

$sql = "SELECT * FROM `followers` WHERE `following_id` = ? AND `seen` = 0";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $lID);
$stmt->execute();
$result = $stmt->get_result();

$count = $result->num_rows;

return $count;