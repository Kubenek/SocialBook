<?php

require_once __DIR__ . "/init.php";

function add_like($conn, $post_id, $user_id) {

    $sql = "SELECT * FROM likes WHERE post_id = ? AND user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $post_id, $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    if ($result->num_rows > 0) {
        $delete_sql = "DELETE FROM likes WHERE post_id = ? AND user_id = ?";
        $delete_stmt = $conn->prepare($delete_sql);
        $delete_stmt->bind_param("ii", $post_id, $user_id);
        $delete_stmt->execute();
        $delete_stmt->close();

        $update_sql = "UPDATE posts SET likes = likes - 1 WHERE id = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("i", $post_id);
        $update_stmt->execute();
        $update_stmt->close();

    } else {
        $insert_sql = "INSERT INTO likes (post_id, user_id) VALUES (?, ?)";
        $insert_stmt = $conn->prepare($insert_sql);
        $insert_stmt->bind_param("ii", $post_id, $user_id);
        $insert_stmt->execute();
        $insert_stmt->close();

        $update_sql = "UPDATE posts SET likes = likes + 1 WHERE id = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("i", $post_id);
        $update_stmt->execute();
        $update_stmt->close();

    }

    
}