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
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO `users` (`id`, `login`, `password`) VALUES(NULL, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $login, $password_hash);
    $stmt->execute();
    $stmt->close();
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tworzenie Konta | SocialBook</title>

    <link rel="stylesheet" href="styles/basics.css">
    
</head>
<body>

    <form method="post">
        <h1>Tworzenie konta</h1>
        Login:
        <input type="text" name="input-name">
        Hasło:
        <input type="password" name="input-password">
        <button name="submit-form">Stwórz konto</button>
    </form>
</body>
</html>