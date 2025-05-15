<?php

session_start();
$conn = new mysqli("localhost","root","","dane");

header("Content-Type: application/json");

if($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $login = $_POST["input-name"];
    $pass = $_POST["input-password"];
    $ssid = session_id();

    if($login == "" || $pass == "") {
        echo json_encode(["error" => "Please fill in all fields!"]);
        exit;
    } else {
        $found = false;
        $sql2 = "SELECT * FROM `users`";
        $result = $conn->query($sql2);

        while($row = $result->fetch_assoc()) {
            if($row["login"] == $login) {
                $found = true;
                if(password_verify($pass, $row['password'])) {

                    $sql = "DELETE FROM `session`";
                    $conn->query($sql);

                    $sql = "INSERT INTO `session` (`id`, `session_id`, `login`) VALUES (NULL,?,?);";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("ss", $ssid, $login);
                    $stmt->execute();
                    $stmt->close();

                    echo json_encode(["success" => true]);
                } else {
                    echo json_encode(["error"=> "Invalid password!"]);
                }
                exit;
            }
        }
        if(! $found) {
            echo json_encode(["error"=> "Cannot find specified login!"]);
        }

    }

}

$conn->close();
