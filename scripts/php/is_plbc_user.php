<?php

function check_status($post_id, $user_id) {
    // Connect to the database
    $conn = new mysqli("localhost", "root", "", "dane");

    $sql = "SELECT * FROM likes WHERE post_id = ? AND user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $post_id, $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $stmt->close();
    $conn->close();

    if( $result->num_rows > 0) {
        return true;
    } else {
        return false;
    }

}