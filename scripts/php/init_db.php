<?php

require_once __DIR__ . '/../../vendor/autoload.php';
use Dotenv\Dotenv;

if(!isset($_ENV['DB_HOST'])) {
    $dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
    $dotenv->load();
}

require_once __DIR__ . '/fetch_database_connection.php';

$conn = loadConn();

// SESSION TABLE
$conn->query("CREATE TABLE IF NOT EXISTS session (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    login VARCHAR(50),
    session_id TEXT
)");

// USERS TABLE
$conn->query("CREATE TABLE IF NOT EXISTS users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    login VARCHAR(50),
    password TEXT,
    bio TEXT,
    theme INT(11) DEFAULT 0
)");

// POSTS TABLE
$conn->query("CREATE TABLE IF NOT EXISTS posts (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    user_id INT(11),
    title VARCHAR(255),
    content TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    likes INT(11) DEFAULT 0,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
)");

// LIKES TABLE
$conn->query("CREATE TABLE IF NOT EXISTS likes (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    user_id INT(11),
    post_id INT(11),
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (post_id) REFERENCES posts(id) ON DELETE CASCADE
)");

// FOLLOWERS TABLE
$conn->query("CREATE TABLE IF NOT EXISTS followers (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    follower_id INT(11),
    following_id INT(11),
    followed_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    seen TINYINT(1) DEFAULT 0,
    FOREIGN KEY (follower_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (following_id) REFERENCES users(id) ON DELETE CASCADE
)");

echo "✅ Database initialized successfully.";
