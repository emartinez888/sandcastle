<?php

// display all table records
// get all records
$query='select * from meals';
$days=$db->query($query);

// make a list of all records
foreach($days as $day){
	$list.='<tr>';
	$list.= '<th>'.$day['date'].'</th>';
	$list.= '<th>'.$day['members'].'</th>';
	$list.='</tr>';
	$d = date_parse_from_format("Y-m-d", $day['date']);
	
	// populate global array to compare months later on 'index.php'
	$months[$d["month"]]+=$day['members'];
}

?>
