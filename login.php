<?php
session_start();
$conn = new mysqli("localhost", "root", "", "dane");

$ssid = session_id();

include("scripts/php/auto_redirect.php");

if(isset($_POST['submit-form'])) {
    
    $login = $_POST["input-name"];
    $pass = $_POST["input-password"];
    $ssid = session_id();

    if($login == "" || $pass == "") {
        echo "Wypełnij wszystkie pola!";
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

                    header("Location: feed.php");
                } else {
                    echo "Hasło się nie zgadza!";
                }
                break;
            }
        }
        if(! $found) {
            echo "Nie znaleziono takiego loginu!";
        }

    }

}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/icons/favicon.ico" type="image/x-icon">
    <title>Login | SocialBook</title>

    <link href="styles/basics.css" rel="stylesheet">
    <link href="styles/login.css" rel="stylesheet">
    <link href="styles/seperators.css" rel="stylesheet">

    <?php include("UI/splide/splide-imports.php"); ?>

    <script src="scripts/login-splide.js" defer></script>

</head>
<body>

    <div class="content-wrapper">

        <div class="container">
            <div class="content">
                <div class="text">
                    <h1>Sign In</h1>
                </div>
                <hr class="grn-seperator" style="margin: 10px 0; margin-right: 20%;">
                <div class="fields">
                    <form method="post">
                        <label for="input-name">Username</label>
                        <input type="text" name="input-name" id="input-name" placeholder="Username" autocomplete="off">

                        <label for="input-password">Password</label>
                        <input type="password" name="input-password" id="input-password" placeholder="Password">

                        <button name="submit-form" class="submit-btn">Log In</button>
                    </form>
                    <div class="acc-link">
                        Don't have an account? <a href="account-create.php">Create it here!</a>
                    </div>
                </div>
            </div>

            <div class="promo">
                <div class="text">
                    <h2>Welcome back, Friend!</h2>
                    <p>Log back in and catch up with everything</p>
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