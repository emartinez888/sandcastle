<?php

function set_record(){
	global $db;
	$date=$_POST['date'];
	$iMem=$_POST['members'];
	
	// write to table only if data available
	if(strlen($date)>0 && strlen($iMem)>0){
		$query="INSERT INTO meals (date, members) VALUES ('$date', '$iMem')";
		$db->exec($query);
	}

}

function analysis($mthArray,$date){
	// extract the month from date passed
	// the array is indexed from 1 to 12
	$d = date_parse_from_format("Y-m-d", $date);
	
	if($d["month"]==1){
		// compare january vs. december
		// the greater months in the array must be from the previous year
		$prevMonth=11;
	}
	else{
		$prevMonth=$d["month"]-1;
	}
	
	if($mthArray[$d["month"]]>$mthArray[$prevMonth]){
		$msg='We ate MORE meals together this month than last month';
	}
	else if($mthArray[$d["month"]]<$mthArray[$prevMonth]){
		$msg='We ate LESS meals together this month than last month';
	}
	else{
		$msg='We ate THE SAME NUMBER OF meals together this month than last month';
	}	
	
	return $msg;
}


?>