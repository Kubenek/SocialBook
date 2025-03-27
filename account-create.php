<?php
$conn = new mysqli("localhost", "root", "", "dane");

$ssid = session_id();
$sql = "SELECT `session_id` FROM `session`";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

while($row = $result->fetch_assoc()) {
    if($row["session_id"] == $ssid) {
        header("Location: feed.php");
    }
}

if(isset($_POST["submit-form"])) {

    $login = $_POST['input-name'];
    $password = $_POST['input-password'];

    if($login == "" || $password == "") {
        echo "Wypełnij wszystkie pola!";
        die();
    }

    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO `users` (`id`, `login`, `password`) VALUES(NULL, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $login, $password_hash);
    if ($stmt->execute()) {
        // Success
        header("Location: login.php");
    } else {
        // Error
        echo "Error: " . $stmt->error;
    }
    //header("Location: login.php");
}
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

    <?php include("UI/splide/splide-imports.php"); ?>

    <script src="scripts/login-splide.js" defer></script>
    
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
