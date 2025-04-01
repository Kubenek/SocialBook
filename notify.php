<?php

session_start();
$conn = new mysqli("localhost", "root", "", "dane");

$ssid = session_id();

$login = include("scripts/php/fetch_login.php");
$cID = include "scripts/php/fetch_id.php";
$bio = include("scripts/php/fetch_bio.php");

function fetch_login_by_id($id) {

    $conn = new mysqli("localhost", "root", "", "dane");

    $sql = "SELECT login FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $results = $stmt->get_result();
    $row = $results->fetch_assoc();
    $stmt->close();
    $conn->close();

    return $row["login"];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/icons/favicon.ico" type="image/x-icon">
    <title>Notifications | SocialBook</title>

    <link href="styles/basics.css" rel="stylesheet">
    <link href="styles/scrollbar.css" rel="stylesheet"> 
    <link href="styles/notify.css" rel="stylesheet">

    <?php include('UI/navigation/navigation-imports.php'); ?>

</head>
<body>

    <?php require('UI/navigation/navigation.php'); ?>

    <div class="container">
        <div class="main-content scrollbar">
            <div class="top-content">
                <h1>Notifications</h1>   
                <button class="readAll">Read All</button>
            </div>

            <div class="page-content">

                <?php

                    $sql = "SELECT * FROM `followers` WHERE `seen` = 0 AND `following_id` = ? ORDER BY `followed_at` DESC";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("i", $cID);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $stmt->close();

                    while($row = $result->fetch_assoc()) {
                        $fLogin = fetch_login_by_id($row['follower_id']);

                        $dateString = $row['followed_at'];
                        $date = DateTime::createFromFormat('Y-m-d H:i:s', $dateString);
                        $formattedDate = $date->format('d M Y H:i');

                        echo "
                            <div class='notify-item'>
                                <div class='notify-cont'>
                                    <img src='images/gen/user.png' width=30 height=30>
                                    <p class='notify-text'> $fLogin has started following you! </p>
                                </div>
                                <p class='notify-date'>$formattedDate</p>
                            </div>
                        ";
                    }
                ?>

            </div>

        </div>
    </div>
    
</body>
</html>