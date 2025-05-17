<?php

function check_status($conn, $post_id, $user_id) {

    $sql = "SELECT * FROM likes WHERE post_id = ? AND user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $post_id, $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $stmt->close();
    

    if( $result->num_rows > 0) {
        return true;
    } else {
        return false;
    }

}