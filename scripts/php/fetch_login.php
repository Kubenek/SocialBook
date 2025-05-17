<?php

require_once __DIR__ . "/init.php";

if (!$conn) {
    die("Connection failed.");
}

$login = "NULL";

$sql = "SELECT `login`, `session_id` FROM `session`";
$result = $conn->query($sql);

if (!$result) {
    die("Query failed: " . $conn->error);
}

while ($row = $result->fetch_assoc()) {
    if ($row["session_id"] === $ssid) {
        $login = $row["login"];
        break; // Found match, no need to loop more
    }
}

$result->free();

return $login;
