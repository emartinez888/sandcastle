<?php

// screen as not signed in

// screen as signed in

// screen as option to register


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<!--
	Website:  		Silent Auction
	File:			
	Developer:      Eduardo Martinez
	Languages Used: XHTML 1.0
	Date Created:   2012-03-22
	Last Revised:   

	Website Description:	
	Silent auction for ...
		
	External files:
		./css/newsletter.css ./js/newsletter.js
-->	
	
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
	<meta http-equiv="Content-type" 
		content="text/html;charset=utf-8" />

	<meta name="description" 
		content="" />	
		
	<meta name="keywords" 
		content="" />
	
	<!-- CSS link -->
	<link rel="stylesheet" type="text/css" href="./css/main.css" />
	
	<!-- JavaScript link -->
	<script src="./js/main.js" type="text/javascript"></script>

	<title>Silent Auction</title>
</head>
<body>
	<div id="intro">
		<?php include 'views/intro.php'; ?>
	</div>
	<div id="main">
		<?php include 'views/items.php'; ?>
	</div>
	<div id="signin">
		<?php include 'views/signin.php'; ?>
	</div>
</body>
</html>