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
    <title>Account Settings | SocialBook</title>

    <link href="styles/basics.css" rel="stylesheet">
    <link href="styles/scrollbar.css" rel="stylesheet"> 
    <link href="styles/settings.css" rel="stylesheet">
    <link href="styles/dropdown.css" rel="stylesheet">

    <script src="scripts/dropdown.js" defer></script>
    <script src="scripts/char_counter.js" defer></script>
    <script src="scripts/save_changes.js" defer></script>

    <?php include('UI/navigation/navigation-imports.php'); ?>

</head>
<body>

    <?php require('UI/navigation/navigation.php'); ?>

    <div class="container">
        <div class="main-content scrollbar">
            <div class="top-content">
                <h1>Account Settings</h1>   
                <button class="saveButton" onclick="saveChanges()">Save changes</button>
            </div>

            <div class="dropdownSets">
                <div class="infoSet dropdown">
                    <button class="dropdown-button">User Information</button>
                    <div class="dropdown-content">
                        <form id="settingsForm">
                            <p>
                                Username: 
                                <input type="text" id="usernameInput" class="sInput" value="<?php echo $login ?>">
                            </p>
                            <div>
                                Bio:
                                <div class="sTextAreaWrapper">
                                    <textarea id="bioInput" class="sTextArea" maxlength="120"><?php echo $bio; ?></textarea>
                                    <p id="charCount">0/120</p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="priSet dropdown">
                    <button class="dropdown-button">Privacy</button>
                    <div class="dropdown-content">
                        <div class="dropdown-in">
                            <button class="dropdown-button-in">Change password</button>
                            <div class="dropdown-content-in">
                                <p>Old Password</p>
                                <p>New Password</p>
                                <p>Repeat Password</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    
</body>
</html>