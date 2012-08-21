<?php

if(!isset($_SERVER['HTTPS'])){
	// make sure the page uses a secure connection
	$url='https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	// $_SERVER['HTTP_HOST'] is "localhost"
	// $_SERVER['REQUEST_URI'] is "sandcastle/httpsonly"
	// this is a redirect on this server
	// BUT if $url starts with https:// then it redirects to another server
	// $url='www.eddy.x10.mx';
	header("Location: ".$url);
	//print_r($url);
	exit();
}
?>
<html><body><h1>Wazzup!</h1></body></html>