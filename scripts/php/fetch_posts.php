<?php

$sql = "SELECT * FROM `posts`";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

$posts = [];

while($row = $result->fetch_assoc()) {
    $posts[] = $row;
}

$stmt->execute();


return $posts;