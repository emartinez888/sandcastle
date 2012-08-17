<?php
	require 'model/database.php';
	
    // Get category ID
    if(array_key_exists('cdname', $_POST)){
    	// adding a cd AND/OR deleting a cd
    	include 'model/editcd.php';
    }

  include 'views/list_cds.php';
    

?>
<html>
<body>
<form action="index.php" method="post">
<h1>Top Selling Albums of all Time</h1><br/>
<ul>
	<?php echo $cdlist; ?>
</ul>
<br/>
<label for="cdname">Add a CD name:</label><br />
<input type="text" name="cdname"/><br/>
<input type="submit" name="add" value="Add to list" />
<br/>
<label for="cdnumber">Delete a DC:</label><br />
<select name="cdnumber">
	<?php echo $cdNums; ?>
</select>
<br/>
<input type="submit" name="delete" value="Delete CD from list" />

</form>
</body>
</html>