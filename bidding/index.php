<?php
require 'model/database.php';// may move it from here
require 'model/functions.php';

// global vars
$NAMEBENE='Tracy Q.';// beneficiary
$USERID=null;// user id to fetch data in items.php, unique name as string
$signin=$createAcct=$editAcct=false;
// locals to this file
$ok=$errmsg=$userslist='';

// check for user action from beginning
// options are sign in or create new account
if(isset($_POST['action'])){
	// sign in section
	if($_POST['action']=='Sign In'){
		$signin=true;
	}elseif($_POST['action']=='Create Account'){
		// get a list of all active user id from database, then use javascript to validate new user id
		$createAcct=true;
		// prepare the list fromdb
		$userslist=get_users_list($USERID);
	}elseif($_POST['action']=='Edit Account'){
		$editAcct=true;
		// prepare the list fromdb
		$userslist=get_users_list($USERID);		
	}
	
}
// check user verification from signin section
elseif(isset($_POST['verify'])){
	if($_POST['verify']=='Create Account'){
		// login data must be checked first with javascript
		// send account confirmation to user email
		$errmsg=verify_new_account($_POST);
		if($errmsg==null){
			// no errors
			send_account_email($_POST);
			$ok='Check your email for account confirmation';
		}
	}elseif($_POST['verify']=='Sign In' || $_POST['verify']=='Update Account'){
		// verify user id and email vs database
		$errmsg=verify_account($_POST);
		$USERID=$errmsg[1];// sets our global user
		$errmsg=$errmsg[0];
		if($errmsg==null){
			if($_POST['verify']=='Sign In'){
				// set items page with this user login info
				addCookie($USERID);
				$errmsg=reset_items_page();
				if($errmsg==null){
					$ok='Welcome '.$_POST['usersignin'].'. You are logged in.';
				}
			}else{
				// update database with new info from $_POST
				$errmsg=update_account($_POST);
				if($errmsg==null){
					$ok='Welcome '.$_POST['usersignin'].'. You are logged in.';
				}				
				// if user id was edited, just refresh this id in items page.
			}
					
		}
	}
}

elseif(isset($_GET['action'])){
	// save new account data in database and leave the user logged in
	$errmsg=save_new_account($_GET);
	$USERID=$errmsg[1];// sets our global user
	$errmsg=$errmsg[0];
	if($errmsg==null){
		addCookie($USERID);
		$ok='Welcome '.$_GET['user'].'. You are logged in.';
		// set items page with this user login info
	}	
}

else{
	// we are for the first time in the site, set the cookie
	setcookie('username','silentauction');// sets the cookie header file in the client pc
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<!--
	Website:  		Silent Auction
	File:			
	Developer:      Eduardo Martinez
	Languages Used: XHTML 1.0
	Date Created:   2012-03-22
	Last Revised:   

	Website Description:	
	Silent auction for ...
		
	External files:
		./css/newsletter.css ./js/newsletter.js
-->	
	
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
	<meta http-equiv="Content-type" 
		content="text/html;charset=utf-8" />

	<meta name="description" 
		content="" />	
		
	<meta name="keywords" 
		content="" />
	
	<!-- CSS link -->
	<link rel="stylesheet" type="text/css" href="./css/main.css" />
	
	<!-- JavaScript link -->
	<script src="./js/main.js" type="text/javascript"></script>

	<title>Silent Auction</title>
</head>
<body>
	<div id="intro">
		<?php include 'views/intro.php'; ?>
	</div>
	<div id="signin">
		<?php include 'views/signin.php'; ?>
		<div><p><?php echo $ok; ?></p></div>
		<div><p id="error"><?php echo $errmsg; ?></p></div>
	</div>	
	<div id="main">
		<?php include 'views/items.php'; ?>
	</div>
	<div><p id="hide"><?php echo $userslist; ?></p></div>
</body>
</html>