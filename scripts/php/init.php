<?php

require_once __DIR__ . '/../../vendor/autoload.php';
use Dotenv\Dotenv;

if(!isset($_ENV['DB_HOST'])) {
    $dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
    $dotenv->load();
}

require_once __DIR__ . '/fetch_database_connection.php';

$conn = loadConn();

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$ssid = session_id();