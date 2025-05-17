<?php

require_once __DIR__ . "/init.php";

header('Content-Type: application/json');
ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    $username = $data['username'];

    $login = include "fetch_login.php";

    $existLogin = $username;
    $exists = include "userExists.php";

    if($exists && $username != $login) {
        echo json_encode(['success' => false, 'message' => 'Username already exists']);
        exit;
    }

    $bio = $data['bio'];
    $user_id = include("fetch_id.php");

    if (empty($username)) {
        echo json_encode(['success' => false, 'message' => 'Username cannot be empty.']);
        exit;
    }

    if ($conn->connect_error) {
        echo json_encode(['success' => false, 'message' => 'Database connection failed.']);
        exit;
    }

    $conn->begin_transaction();

    try {
        $stmt1 = $conn->prepare("UPDATE `users` SET `login` = ?, `bio` = ? WHERE `id` = ?");
        $stmt1->bind_param("ssi", $username, $bio, $user_id);
        
        if (!$stmt1->execute()) {
            throw new Exception('Failed to update users table.');
        }

        $stmt2 = $conn->prepare("UPDATE `session` SET `login` = ? WHERE `session_id` = ?");
        $stmt2->bind_param("ss", $username, $ssid);

        if (!$stmt2->execute()) {
            throw new Exception('Failed to update session table.');
        }

        $conn->commit();
        
        echo json_encode(['success' => true]);

    } catch (Exception $e) {
        $conn->rollback();
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }

    $stmt1->close();
    $stmt2->close();
    
}
?>
