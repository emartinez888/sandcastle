
<?php
if(array_key_exists('nameInput',$_POST)){
	// in cookies we store all the info for the shopping cart in the client pc
	setcookie('username',$_POST['nameInput']);// sets the cookie header file in the client pc
	// setcookie('username','');// this clears the cookie
	$_COOKIE['username']=$_POST['nameInput'];// sets the value into the array
}

if(array_key_exists('username', $_COOKIE)){
	// there is a cookie in the pc, thus build the page with this info
	include 'views/message.php';
}
else{
	include 'views/myform.php';
}


?>
