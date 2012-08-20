<?php

// display all table records
$query='select * from meals';
$days=$db->query($query);
foreach($days as $day){
	echo $day['date'].'  '.$day['members'];
}

?>