<?php

function addCookie($sUser){
	// in cookies we store all the info for the shopping cart in the client pc
	setcookie('username',$_POST['username']);// sets the cookie header file in the client pc
	//setcookie('username','');// this clears the cookie
	$_COOKIE['username']=$_POST['username'];// sets the value into the array	
}

function addUser($aPost){
	if($aPost['newpassword']==$aPost['repassword']){
		$oUser=new Users;
		$oUser->password=$aPost['newpassword'];
		$oUser->username=$aPost['username'];
		$oUser->save();
		return true;
	}
	return false;
}


function validateUser($aPost){
	if($aPost['password']=='pa55word'){
		return true;
	}
	return false;
}
?>