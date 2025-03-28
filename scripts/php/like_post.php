<?php

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