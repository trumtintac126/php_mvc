<?php

require_once 'vendor/autoload.php';

$dotenv = \Dotenv\Dotenv::create(__DIR__);
$dotenv->load();

$host      = $_ENV['DB_HOST'] ?? "postgres";
$username  = $_ENV['DB_USERNAME'] ?? "ultra";
$password  = $_ENV['DB_PASSWORD'] ?? "secret";
$dbname    = $_ENV['DB_DATABASE'] ?? "product_management";
$port      = $_ENV['DB_PORT'] ?? 5432;
$pdoString = "{$_ENV['DB_CONNECTION']}:host=$host;port=$port;dbname=$dbname;user=$username;password=$password";
$options   = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);