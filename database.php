<?php
    // $dsn = 'mysql:host=localhost;dbname=D00245674';
    // $username = 'D00245674';
    // $password = 'aN1pqNSB';
	
	$dsn = 'mysql:host=localhost;dbname=D00245674';
    $username = 'root';
    $password = '';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('database_error.php');
        exit();
    }
?>