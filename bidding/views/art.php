<?php



?>
<!!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<!-- 
	Website:
	Developer:
	Languages Used: XHTML 1.0
	Date created:
	Last Revised:
	
	Website description:
	
	External files: xmlns="http://www.w3.org/1999/xhtml",type="image/x-icon",type="text/javascript"
	<link rel="icon" type="image/x-icon" href="favicon.ico" />,apple touch icons are 114 x 114,
	<meta http-equiv="content-type" content="text;charset=utf-8" />
-->	

<html lang=en>

	<head>
		<meta charset=utf-8" />
		<!-- this line above should always be the first line in "head", very important -->
		
		<!-- Favicon links, first is for all browsers, the last for IE
		
		<link rel="shortcut icon"  href="favicon.ico" />
		<link rel="apple-touch-icon" href="apple-touch-icon.png"/>
		-->
		<meta name="description" content="art update" />
		<!-- Keep keywords upto 20 -->
		
		<!-- CSS link -->
		<link rel="stylesheet" type="text/css" href="../css/main.css" />
		
		<!-- JavaScript link -->
		<script src="../js/main.js" type="text/javascript"></script>


		<title>Add Art</title>

	</head>
<body>
	<form action="." method="post">
		<h1>Update Art</h1>
		<h2>Personal Info</h2>
		<table>
			<tr><td><label>Name (displayed):</label></td><td><input type="text" name="piname"/></td><td><label class="red"><sup>required</sup></label></td></tr>
			<tr><td><label>Web (displayed):</label></td><td><input type="text" name="piweb"/></td><td></td></tr>
			<tr><td><label>Email:</label></td><td><input type="text" name="piemail"/></td><td></td></tr>
			<tr><td><label>Phone:</label></td><td><input type="text" name="piphone"/></td><td></td></tr>
			<tr><td><h2>Art Info</h2></td><td><a id="addart" href="#" />Add Art</a></td><td></td></tr>
		</table>
	</form>

</body>
</html>