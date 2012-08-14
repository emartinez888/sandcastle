<?php
    $dsn = 'mysql:host=localhost;dbname=my_guitar_shop1';// connecting to database
    $username = 'mgs_user';
    $password = 'pa55word';

    try {
        $db = new PDO($dsn, $username, $password);// how to connect to database
        // PDO is php data object
    } catch (PDOException $e) {
        $error_message = $e->getMessage();// ->getMessage() is a method of $e
        include('database_error.php');
        exit();
    }
?>