<?php

$action = array_key_exists('code', $_GET)?'complete':(array_key_exists('action', $_POST)?$_POST['action']:'');
if($action == 'signin'){
	include 'model/starter.php';
}elseif($action=='complete'){
	include 'model/complete.php';
	$username = $oProfile->id . ' aka ' . $oProfile->name;
	setcookie('username', $username );
	$_COOKIE['username']= $username;
}
if(array_key_exists('username', $_COOKIE)){
	include 'views/hello.php';
}
include 'views/signin.php';
?>
