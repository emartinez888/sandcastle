<?php

function addCookie($sUser){
	// in cookies we store all the info for the shopping cart in the client pc
	setcookie('username',$_POST['username']);// sets the cookie header file in the client pc
	//setcookie('username','');// this clears the cookie
	$_COOKIE['username']=$_POST['username'];// sets the value into the array	
}

function addUser($aPost){
	$oUser = Users::find_by_username($aPost['username']);
	if($oUser){
		$sErr="User Name already taken";
	}
	elseif($aPost['newpassword']!=$aPost['repassword']){
		$sErr="Passwords do not match!";
	}
	elseif($aPost['newpassword']==$aPost['repassword']){
		$oUser=new Users;
		$oUser->password=sha1($aPost['username'].$aPost['newpassword']);
		$oUser->username=$aPost['username'];
		$oUser->save();
		return true;
	}
	if(isset($sErr)){
		echo $sErr;
	}
	return false;
}


function validateUser($aPost,$sPsswd){
	$oUser = Users::find_by_username($aPost['username']);
	// $oUser is an object of User not a string
	// if($oUser && ...) will check the first test and abour without checking the second one and won't crash!
	if($oUser && sha1($aPost['username'].$aPost[$sPsswd])==$oUser->password){
		return true;
	}
	return false;
}
?>