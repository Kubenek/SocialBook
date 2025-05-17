<?php

header("Content-Type: application/json");

if($_SERVER['REQUEST_METHOD'] === "POST") {

    $login = $_POST['input-name'];
    $password = $_POST['input-password'];

    if($login == "" || $password == "") {
        echo json_encode(["error" => "Please fill in all fields!"]);
        exit;
    }

    $sql = "SELECT `login` FROM `users`";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
        if($row["login"] == $login) {
            echo json_encode(["error"=> "This login is already exists!"]);
            exit;
        }
    }

    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO `users` (`id`, `login`, `password`) VALUES(NULL, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $login, $password_hash);
    if ($stmt->execute()) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["error"=> $stmt->error]);
    }

    
}