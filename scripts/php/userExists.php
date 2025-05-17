<?php

require_once __DIR__ . "/init.php";

$sql = "SELECT `login` FROM `users`";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
    if($row["login"] == $existLogin) {
        return true;
    }
}

return false;
