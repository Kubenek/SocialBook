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

    $ssql = "DELETE FROM `likes` WHERE `post_id` = ?";
    $stmt = $conn->prepare($ssql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();

    $conn->close();
}

if(isset($_POST["d_post"])) {

    $id = $_POST["d_post"];

    delete_post($id);
    header("Location: feed.php");

}

include "scripts/php/like_post.php";
include "scripts/php/is_plbc_user.php";

if (
    isset($_SESSION['dark_status']) &&
    $_SESSION['dark_status'] == 1 &&
    !(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest')
) {
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
} elseif (!isset($_SESSION['dark_status'])) {
    $_SESSION['dark_status'] = 0;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['like_post'])) {
    $post_id = $_POST['like_post']; 
    $user_id = $cur_id;

    add_like($post_id, $user_id);

    $conn = new mysqli("localhost", "root", "", "dane");
    $sql = "SELECT likes FROM posts WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $post_id);
    $stmt->execute();
    $stmt->bind_result($updated_likes);
    $stmt->fetch();
    $stmt->close();
    $conn->close();

    echo $updated_likes;
    exit;
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
    <link href="styles/like.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="scripts/toggle-like-icon.js" defer></script>

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
                foreach ($posts as $post) { ?>
                    <div class="post">
                        <?php  
                            $date = DateTime::createFromFormat('Y-m-d H:i:s', $post['created_at']);
                            $formattedDate = $date->format('d M Y');
                            $uName = fetch_login_by_id($post['user_id']);
                        ?>
                        <div class="top-content">

                            <img width="30px" height="30px" src="images/gen/user.png">
                            <h3><?php echo "  ".$uName; ?></h3>

                            <div class="topButtons">

                                <form id="likeForm">

                                    <?php $hStatus = check_status($post['id'], $cur_id); ?>

                                    <button class="hicon like-button" name="like_post" value="<?php echo $post['id'] ?>">
                                        <i class="icon like-icon bx <?php echo ($hStatus) ? "bxs-heart" : "bx-heart" ?>"></i>
                                    </button>

                                </form>

                                <?php if($uName == $login) { ?>

                                    <form method="post">

                                        <button name="d_post" value="<?php echo $post['id'] ?>">
                                            <i class='bx bx-trash'></i>
                                        </button>

                                    </form>

                                <?php } ?>

                            </div>

                        </div>
                        
                        <h1><?php echo $post['title'] ?></h1>
                        
                        <p class="content"><?php echo $post['content']; ?></p>
                        <hr class="grn-seperator" style="display: block; width: 100%; margin-bottom: 20px; margin-top: 20px;">
                        <div class="post-footer">
                            
                            <p id="likes-<?php echo $post['id'] ?>">
                                <?php echo "Likes: ".$post['likes']?>
                            </p>

                        </div>
                    </div>
                <?php } ?>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.like-button').on('click', function(event) {
            event.preventDefault();

            var post_id = $(this).val();
            var user_id = <?php echo $cur_id; ?>;
            var like_icon = $(this).find('.like-icon');

            $.ajax({
                url: 'feed.php',
                type: 'POST',
                data: {
                    like_post: post_id,
                    user_id: user_id
                },
                success: function(response) {
                    $('#likes-' + post_id).text("Likes: " + response);

                    like_icon.addClass('liked');

                    setTimeout(function() {
                        like_icon.removeClass('liked');
                    }, 300);
                },
                error: function(xhr, status, error) {
                console.error('AJAX Error: ' + status + error);
                }
            });
            });
        });
    </script>


</body>
</html>
