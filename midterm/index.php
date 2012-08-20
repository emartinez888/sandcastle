<?php

$list="";// populated within 'views/list.php'
$msg="";
// initialize array for month comparaison
$months=array_fill(1, 12, 0);
	
	// must always connect to database
	require 'model/database.php';
	
	if(array_key_exists('submit', $_POST)){

		require 'model/functions.php';

		// must add new record to table		
		set_record();
		
		// always display the updated table contents
		include 'views/list.php';
				
		// compare months, needs to be executed after the listing
		// assume the current month is the one enterred by the user
		$msg=analysis($months,$_POST['date']);
	}
	else{
		// always display the updated table contents
		include 'views/list.php';		
	}


?>
<html>
	<body>
		<form action='.' method="post">
			<h1>Days we ate together</h1>
			<table>
				<tr>
				 <th>date</th>
				 <th>members</th>
				</tr>		
				<?php echo $list; ?>	
				<tr>
				 <th><label for="date">Enter a date:</label></th>
				</tr>			
				<tr>
				 <th><label for="date">(yyyy - mm - dd)</label></th>
				 <th><label for="members">Number of members:</label></th>
				</tr>
				<tr>
				 <th><input type="text" name="date" /></th>
				 <th><input type="text" name="members" /></th>
				 <th><input type="submit" name="submit" value="submit" /></th>
				</tr>
			</table>
		</form>
		<div>
			<h2>
				<?php echo $msg; ?>
			</h2>
		</div>
	</body>
</html>