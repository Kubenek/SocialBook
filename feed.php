<?php

include("scripts/php/auto_redirect.php");

$posts = include("scripts/php/fetch_posts.php");

shuffle($posts);

$login = include("scripts/php/fetch_login.php");

$cur_id = include("scripts/php/fetch_id.php");

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

function delete_post($id) {
    $conn = new mysqli("localhost", "root", "", "dane");

    $sql = "DELETE FROM `posts` WHERE `posts`.`id` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}

function add_like($post_id, $user_id) {
    // Connect to the database
    $conn = new mysqli("localhost", "root", "", "dane");

    $sql = "SELECT * FROM likes WHERE post_id = ? AND user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $post_id, $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the like already exists
    if ($result->num_rows > 0) {
        // User has already liked, so remove the like
        $delete_sql = "DELETE FROM likes WHERE post_id = ? AND user_id = ?";
        $delete_stmt = $conn->prepare($delete_sql);
        $delete_stmt->bind_param("ii", $post_id, $user_id);
        $delete_stmt->execute();

        // Decrease the like count in the posts table
        $update_sql = "UPDATE posts SET likes = likes - 1 WHERE id = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("i", $post_id);
        $update_stmt->execute();

    } else {
        // User hasn't liked yet, so add the like
        $insert_sql = "INSERT INTO likes (post_id, user_id) VALUES (?, ?)";
        $insert_stmt = $conn->prepare($insert_sql);
        $insert_stmt->bind_param("ii", $post_id, $user_id);
        $insert_stmt->execute();

        // Increase the like count in the posts table
        $update_sql = "UPDATE posts SET likes = likes + 1 WHERE id = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("i", $post_id);
        $update_stmt->execute();

    }

    // Close the connection
    $conn->close();
}

if(isset($_POST['like_post'])) {

    $postID = $_POST["like_post"];

    add_like($postID, $cur_id);

}

if(isset($_POST["d_post"])) {

    $id = $_POST["d_post"];

    delete_post($id);
    header("Location: feed.php");

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
    <link href="styles/scrollbar.css" rel="stylesheet">

    <?php include('UI/navigation/navigation-imports.php'); ?>
    
</head>
<body>

    <?php require('UI/navigation/navigation.php'); ?>

    <div class="container">
        <div class="main-content scrollbar">

            <div class="m-post">
                <h1>Welcome <?php echo $login?>!</h1>
                <p><?php echo $quote; ?></p>
            </div>

            <hr class="grn-seperator" style="display: block; margin-top: 40px; width: 50%;">

            <?php
                foreach ($posts as $post) {?>
                    <div class="post">
                        <?php  
                            $date = DateTime::createFromFormat('Y-m-d H:i:s', $post['created_at']);
                            $formattedDate = $date->format('d M Y');
                            $uName = fetch_login_by_id($post['user_id']);
                        ?>
                        <div class="top-content">
                            <img width="30px" height="30px" src="images/gen/user.png">
                            <h3><?php echo "  ".$uName; ?></h3>

                            <form method="post" id="top-buttons-form">

                                <button name="like_post" value="<?php echo $post['id'] ?>">
                                    <i class="hicon icon bx bx-heart"></i>
                                </button>

                            <?php if($uName == $login) { ?>

                                <button name="d_post" value="<?php echo $post['id'] ?>">
                                    <i class='bx bx-trash'></i>
                                </button>

                            <?php } ?>

                            </form>

                        </div>
                        
                        <h1><?php echo $post['title'] ?></h1>
                        
                        <p class="content"><?php echo $post['content']; ?></p>
                        <hr class="grn-seperator" style="display: block; width: 100%; margin-bottom: 20px; margin-top: 20px;">
                        <div class="post-footer">
                            
                            <p>
                                <?php echo "Likes: ".$post['likes']?>
                            </p>

                        </div>
                    </div>
                <?php } ?>

        </div>
    </div>

</body>
</html>