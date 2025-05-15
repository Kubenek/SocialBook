<?php

if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['dark_status'])) {
    $_SESSION['dark_status'] = $data['dark_status'];
    echo json_encode(['status' => 'success', 'dark_status' => $_SESSION['dark_status']]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Missing dark_status']);
}