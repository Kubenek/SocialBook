<?php

include("scripts/php/auto_redirect.php");

$posts = include("scripts/php/fetch_posts.php");

shuffle($posts);

$login = include("scripts/php/fetch_login.php");

$quote = include("scripts/php/fetch_quote.php");

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
    <title>Your Feed | SocialBook</title>
    
    <link href="styles/basics.css" rel="stylesheet">
    <link href="styles/feed.css" rel="stylesheet">
    <link href="styles/seperators.css" rel="stylesheet">

    <?php include('UI/navigation/navigation-imports.php'); ?>
    
    
</head>
<body>

    <?php require('UI/navigation/navigation.php'); ?>

    <div class="container">
        <div class="main-content">

            <div class="m-post">
                <h1>Welcome <?php echo $login?>!</h1>
                <p><?php echo $quote; ?></p>
            </div>

            <hr class="grn-seperator" style="display: block; margin-top: 40px; width: 50%;">

            <?php
                foreach ($posts as $post) {?>
                    <div class="post">
                        <h1><?php echo $post['title'] ?></h1>
                        
                        <p class="content"><?php echo $post['content']; ?></p>
                        <hr class="grn-seperator" style="display: block; width: 100%; margin-bottom: 20px; margin-top: 20px;">
                        <div class="post-footer">
                            <?php  
                                $date = DateTime::createFromFormat('Y-m-d H:i:s', $post['created_at']);
                                $formattedDate = $date->format('d M Y');
                                $uName = fetch_login_by_id($post['user_id']);
                            ?>
                            <p><?php echo "Posted on ".$formattedDate." by ".$uName ?></p>
                            <p><?php echo "Likes: ".$post['likes']?></p>
                        </div>
                    </div>
                <?php } ?>

        </div>
    </div>


</body>
</html>