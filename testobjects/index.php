

<html><body>
<?php
	//require 'model/dog.php';
	require 'model/animal.php';
	include 'views/myform.php';
	$oBingo=new dog('chihuahua');
	if(array_key_exists('foodForm', $_POST)){
		$oBingo->eat($_POST['foodForm'],$oBingo->sBreed);
		$oBingo->show();
	}
	include 'views/feelings.php';
?>
</body></html>