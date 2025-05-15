<?php

include("scripts/php/auto_redirect.php");

$login = include("scripts/php/fetch_login.php");

$bio = include("scripts/php/fetch_bio.php");

if(isset($_SESSION['dark_status'])) {
    if($_SESSION['dark_status'] == 1) {
        echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
                const body = document.querySelector("body");
                const modeText = body.querySelector(".mode-text");

                body.classList.add("dark");
                if (modeText) {
                    modeText.innerText = "Light mode";
                }
            });
          </script>';
    } else {
        $_SESSION['dark_status'] = 0;
    }
}

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
    <link href="styles/seperators.css" rel="stylesheet">

    <script src="scripts/searchAJAX.js" defer></script>

    <?php include('UI/navigation/navigation-imports.php'); ?>

</head>
<body>

    <?php require('UI/navigation/navigation.php'); ?>

    <div class="container">
        <div class="main-content scrollbar">
            <div class="top-content">
                <h1>Search for user</h1>   
            </div>

            <div class="searchWrapper">
                <form method="post" id="searchForm">
                    
                    <input type="text" name="name-input" class="searchInput" placeholder="Enter Username..." autocomplete="off">

                    <button class="searchButton">
                        <i class="icon bx bx-search"></i>
                    </button>

                </form>

            </div>

            <div class="spWrapper">
                <hr class="grn-seperator">
            </div>            

            <div class="resultWrapper">
                <div class="resultList">

                </div>
            </div>

        </div>
    </div>
    
</body>
</html>