<?php


$dsn = 'mysql:host=localhost;dbname=quizzapp';
$username = 'root';
$password = '';

// TODO: notes to remember
// 1. The sql query that was used on the server is CASE SENSITIVE.
try {
    $conn = new PDO($dsn, $username, $password);
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('database_error.php');
    exit();
}
