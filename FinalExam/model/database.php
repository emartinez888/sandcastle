<?php
$dsn = 'mysql:host=localhost;dbname=jobsearch';// connecting to database
$username = 'root';
$password = '';

try {
	$db = new PDO($dsn, $username, $password);// how to connect to database
	// PDO is php data object
} catch (PDOException $e) {
	$error_message = $e->getMessage();// ->getMessage() is a method of $e
	include('database_error.php');
	exit();
}
?>