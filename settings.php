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

    <?php include('UI/navigation/navigation-imports.php'); ?>

</head>
<body>

    <?php require('UI/navigation/navigation.php'); ?>

    <div class="container">
        <div class="main-content scrollbar">
            <div class="top-content">
                <h1>Account Settings</h1>   
                <button class="saveButton">Save changes</button>
            </div>

            <div class="dropdownSets">
                <div class="infoSet dropdown">
                    <button class="dropdown-button">User Information</button>
                    <div class="dropdown-content">
                        <p>Setting 1</p>
                        <p>Setting 2</p>
                        <p>Setting 3</p>
                    </div>
                </div>

                <div class="priSet dropdown">
                    <button class="dropdown-button">Privacy</button>
                    <div class="dropdown-content">
                        <p>Setting 1</p>
                        <p>Setting 2</p>
                        <p>Setting 3</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    
</body>
</html>