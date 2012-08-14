<?php
require 'database.php';

// need functions to manipulate the database. see p163 of murach

/*
function get_categories(){
	// returns array of products, use the php method "array" to build an array
	// return array('guitars','basses','drums');
	global $db;// this asserts that $db is global (from database.php) not a local variable
	$query='select categoryName from categories';
	return $db->query($query);
}

function get_products(){
	// returns array of products, use the php method "array" to build an array
	// return array('guitars','basses','drums');
	global $db;// this asserts that $db is global (from database.php) not a local variable
	$query='select productName from products';
	return $db->query($query);
}
*/

function get_dogs(){
	global $db;// this asserts that $db is global (from database.php) not a local variable
	$query='select species from dogs';
	return $db->query($query);	
}

function get_price(){
	// returns array of products, use the php method "array" to build an array
	// return array('guitars','basses','drums');
	global $db;// this asserts that $db is global (from database.php) not a local variable
	$query='select cash from dogs';
	return $db->query($query);
}



?>