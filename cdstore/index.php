<?php
	require 'model/database.php';
	
    // Get category ID
    if(array_key_exists('cdname', $_POST)){
    	// adding a cd AND/OR deleting a cd
    	include 'model/editcd.php';
    }

  include 'views/list_cds.php';
    

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<link rel="stylesheet" type="text/css" href="main.css" />
	<title>My CD list</title>
<body>
<div id="container">
	<form action="index.php" method="post">
		<h1>Top Selling Albums of all Time</h1><br/>
		<ul>
			<?php echo $cdlist; ?>
		</ul>
		<br/>
		<label for="cdname">Add a CD name:</label><br />
		<input type="text" name="cdname"/>
		<input type="submit" name="add" value="Add to list" />
		<br/>
		<label for="cdnumber">Delete a DC:</label><br />
		<select name="cdnumber">
			<?php echo $cdNums; ?>
		</select>
		<input type="submit" name="delete" value="Delete CD from list" /><br/>
		<label for="cdedit">Edit a CD name:</label><br />
		<select name="cdnumber">
			<?php echo $cdNums; ?>
		</select>
		<input type="text" name="cdedit"/>
		<input type="submit" name="edit" value="Edit CD name" /><br/>
	</form>
</div>
</body>
</html>