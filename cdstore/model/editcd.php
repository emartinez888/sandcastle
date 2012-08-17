<?php


$name=trim($_POST['cdname']);

if(isset($_POST['add']) && strlen($name)>0){
	$name='"'.$name.'"';

	$query = 'INSERT INTO cds2 (name) VALUES ('.$name.')';
	$db->exec($query);
	

}

$trgnum=$_POST['cdnumber'];
echo $trgnum;
if(isset($_POST['delete']) && strlen($trgnum)>0){
	$c=0;
	$trgnum--;
	
	$query='SELECT * FROM cds2';
	$allcds=$db->query($query);
	
	foreach($allcds as $theid){
		
		if($c==$trgnum){
			$target=$theid['id'];
			
			$query="DELETE FROM cds2 WHERE id= $target";
			$db->exec($query);			
			break;
		}
		$c++;
	}

}

$trgnum=$_POST['cdnumber2'];
$trgtxt=trim($_POST['cdedit']);

if(isset($_POST['edit']) && strlen($trgnum)>0 && strlen($trgtxt)>0){
	$c=0;
	$trgnum--;
	$trgtxt='"'.$trgtxt.'"';
	$query='SELECT * FROM cds2';
	$allcds=$db->query($query);

	foreach($allcds as $theid){
		if($c==$trgnum){
			$target=$theid['id'];
			$query='update cds2 set name='.$trgtxt.' WHERE id= '.$target;
			$db->exec($query);			
			break;
		}
		$c++;
	}
}
?>