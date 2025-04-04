<?php

if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

$ssid = session_id();
$conn = new mysqli("localhost", "root", "", "dane");

$sql = "SELECT `session_id` FROM `session`";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

$exists = false;

while($row = $result->fetch_assoc()) {
    if($row["session_id"] == $ssid) {
        $exists = true;
    }
}


if(basename($_SERVER['PHP_SELF']) === "feed.php") {
    if(!$exists) {
        header("Location: login.php");
    }
} else if(basename($_SERVER["PHP_SELF"]) === "login.php") {
    if($exists) {
        header("Location: feed.php");
    }
}
