<?php

require 'model/database.php';

if(isset($_GET['action'])){
	// we're clicking on link to update job posting
	include 'views/update.php';
}

?>
<head>
		<!-- CSS link -->
	<link rel="stylesheet" type="text/css" href="./css/main.css" />
</head>
<html>
<body>
	<form action="." method="post">
		<?php include 'views/list.php'; ?>
		<input type="submit" name="action" value="Update Next Action" />
	</form>
	
</body>
</html>