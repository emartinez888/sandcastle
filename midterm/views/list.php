<?php

// display all table records
$query='select * from meals';
$days=$db->query($query);
foreach($days as $day){
	echo $day['date'].'  '.$day['members'];
}

?>
<html>
	<body>
		<form action='./index.php' method="post">
			<table>
				<tr>
				 <th><label for="date">Enter a date:</label></th>
				 <th><label for="members">Number of members:</label></th>
				</tr>
				<tr>
				 <th><input type="text" name="date" /></th>
				 <th><input type="text" name="members" /></th>
				 <th><input type="submit" name="submit" value="submit" /></th>
				</tr>
			</table>
		</form>
	</body>
</html>