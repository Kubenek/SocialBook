<?php

function loadConn() {
    $conn = new mysqli(
        $_ENV["DB_HOST"] ?? 'localhost',
        $_ENV["DB_USER"] ?? 'root',
        $_ENV["DB_PASS"] ?? '',
        $_ENV["DB_NAME"] ?? 'dane'
    );

    if($conn->connect_error) {
        die("Cannot connect to the database! Error: ". $conn->connect_error);
    }

    return $conn;
}

