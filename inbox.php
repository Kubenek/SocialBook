<?php

$login = include "scripts/php/fetch_login.php";

include("scripts/php/auto_redirect.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/icons/favicon.ico" type="image/x-icon">
    <title>Inbox | SocialBook</title>

    <link href="styles/scrollbar.css" rel="stylesheet"> 
    <link href="styles/basics.css" rel="stylesheet">
    <link href="styles/inbox.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <?php include('UI/navigation/navigation-imports.php'); ?>

</head>
<body>
    
    <?php require('UI/navigation/navigation.php'); ?>

    <div class="container">
        <div class="main-content scrollbar">
            <div class="top-content">
                <h1>Your Inbox</h1>   
                <div class="pInfo">
                    <img width="30px" height="30px" src="images/gen/user.png">
                    <h3><?php echo "  ".$login; ?></h3>
                </div>
            </div>

            <div class="content">
                <p>Your inbox is empty</p>
            </div>

        </div>
    </div>

</body>
</html>