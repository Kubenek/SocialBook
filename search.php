<?php

$login = include("scripts/php/fetch_login.php");

$bio = include("scripts/php/fetch_bio.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/icons/favicon.ico" type="image/x-icon">
    <title>Search | SocialBook</title>

    <link href="styles/basics.css" rel="stylesheet">
    <link href="styles/scrollbar.css" rel="stylesheet"> 
    <link href="styles/search.css" rel="stylesheet">

    <?php include('UI/navigation/navigation-imports.php'); ?>

</head>
<body>

    <?php require('UI/navigation/navigation.php'); ?>

    <div class="container">
        <div class="main-content scrollbar">
            <div class="top-content">
                <h1>Search for user</h1>   
                <button class="searchButton" onclick="saveChanges()">
                    <i class="icon bx bx-search"></i>
                </button>
            </div>

        </div>
    </div>
    
</body>
</html>