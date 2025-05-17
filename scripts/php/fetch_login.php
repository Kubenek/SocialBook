<?php

require_once __DIR__ . "/init.php";

$login = "NULL";

$sql = "SELECT `login`, `session_id` FROM `session`";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();

while($row = $result->fetch_assoc()) {
    if($row["session_id"] == $ssid) {
        $login = $row["login"];
    }
}

return $login;