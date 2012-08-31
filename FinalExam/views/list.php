<?php

$query='SELECT * FROM jobs';
$jobs=$db->query($query);
$t='<ul>';
foreach($jobs as $job){
	$t.='<li>'.$job['date'].' '.$job['title'].' '.$job['link'].' '.$job['action'].'</li>';
}
$t.='</ul>';
echo $t;
?>