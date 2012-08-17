<?php

$query='SELECT * FROM cds2';
$allcds=$db->query($query);
$c=0;
$cdNums='<option></option>';

foreach($allcds as $acd){
	global $cdlist;
	$cdlist.='<li>'.(++$c)." - ".$acd['name'].'</li>';
	$cdNums.='<option>'.$c.'</option>';
}


?>