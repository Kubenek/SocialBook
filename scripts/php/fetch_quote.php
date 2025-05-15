<?php

$JSON = file_get_contents("jsons/quotes.json");
$data = json_decode($JSON, true);

$randomIndex = array_rand($data);

$quote = $data[$randomIndex]['quote'];
$author = $data[$randomIndex]['author'];

$qtD = "Quote: ".$quote." - ".$author;

return $qtD;