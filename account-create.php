<?php 

require_once __DIR__ . "/scripts/php/init.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/icons/favicon.ico" type="image/x-icon">
    <title>Account Creation | SocialBook</title>

    <link href="styles/basics.css" rel="stylesheet">
    <link href="styles/login.css" rel="stylesheet">
    <link href="styles/seperators.css" rel="stylesheet">
    <link href="styles/modal.css" rel="stylesheet">

    <?php include("UI/splide/splide-imports.php"); ?>

    <script src="scripts/login-splide.js" defer></script>
    <script src="scripts/accrAJAX.js" defer></script>
    
</head>
<body>

    <div class="content-wrapper">

        <div class="container">
            <div class="content">
                <div class="text">
                    <h1>Create account</h1>
                </div>
                <hr class="grn-seperator" style="margin: 10px 0; margin-right: 20%;">
                <div class="fields">
                    <form method="post">
                        <label for="input-name">Username</label>
                        <input type="text" name="input-name" id="input-name" placeholder="Username" autocomplete="off">

                        <label for="input-password">Password</label>
                        <input type="password" name="input-password" id="input-password" placeholder="Password">

                        <button name="submit-form" class="submit-btn">Create</button>
                    </form>
                    <div class="acc-link">
                       Already have an account? <a href="login.php">Log in here!</a>
                    </div>
                </div>
            </div>

            <div class="promo">
                <div class="text">
                    <h2>Welcome to SocialBook!</h2>
                    <p>Connect, Share and Grow</p>
                </div>
                <div class="splide" id="promoSplide">
                    <div class="splide__track">
                        <ul class="splide__list">
                            <li class="splide__slide"><img src="images/login-splide/1.jpg"></li>
                            <li class="splide__slide"><img src="images/login-splide/2.jpg"></li>
                            <li class="splide__slide"><img src="images/login-splide/3.jpg"></li>
                            <li class="splide__slide"><img src="images/login-splide/4.jpg"></li>
                        </ul>
                    </div>
                </div>
            </div>
            
        </div>

    </div>


</body>
</html>
