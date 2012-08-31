<?php

// get data from both db and populate fields
$query='SELECT * FROM jobs';
$jobs=$db->query($query);

$query2='SELECT * FROM updates';
$updates=$db->query($query2);

$t='<table><tr><th>date Posted</th><th>Title</th><th>Description</th><th>Link</th><th>Posted by</th></tr>';
foreach($jobs as $job){
	// oooops no time to finish!
	$nextact=$job['nextaction'];
	if($job['nextaction']==Null){
		$nextact='set action';
	}

	$t.='<tr><td>'.$job['pubdate'].'</td><td>'.$job['title'].'</td><td>'.$rrr.'</td><td>'.$rr.'</td><td></td></tr>';
}

$t.='</table>';
echo $t;


?>