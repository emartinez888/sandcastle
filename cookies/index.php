
<?php
if(array_key_exists('nameInput',$_POST)){
	setcookie('username',$_POST['nameInput']);
	$_COOKIE['username']=$_POST['nameInput'];
}

if(array_key_exists('username', $_COOKIE)){
	include 'views/message.php';
}
else{
	include 'views/myform.php';
}


?>
