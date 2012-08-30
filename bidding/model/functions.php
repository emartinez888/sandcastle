<?php

function addCookie($sUserid){
	//setcookie('username','');// this clears the cookie
	setcookie('userid',$sUserid);
	$_COOKIE['userid']=$sUserid;// sets the value into the array
}

function getCookie($sArrArg){
	return $_COOKIE[$sArrArg];
}

function verify_new_account($aPost){
	// sanitize some fields
	$aPost['usersignin']=filter_var($aPost['usersignin'], FILTER_SANITIZE_STRING);
	$aPost['namesignin']=filter_var($aPost['namesignin'], FILTER_SANITIZE_STRING);
	
	// tests first emails match then email expression	
	$res=($aPost['emailsignin']==$aPost['emailsignin2']) && filter_var($aPost['emailsignin'], FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/^[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i")));
	if($res){
		// check if user name is not duplicated in database
		if(strlen(trim($aPost['usersignin']))>0){
			// check vs database here, must not find any match! returns null for OK or error message if no good
			global $db;
			$query='SELECT user FROM bidders';
			$bidders=$db->query($query);
			foreach($bidders as $user){
				if($user['user']==$aPost['usersignin']){
					return 'User Name already in use.';
				}
			}
			return null;
		}else{
			// user name is empty
			return 'There is no User Name.';
		}
	}
	else{
		// wrong email
		return 'Wrong Email or Emails do not match.';
	}
}

function get_users_list($sUserid){
	// returns string of all valid users id from database
	global $db;$tmp='';
	$query='SELECT user FROM bidders';
	$bidders=$db->query($query);
	foreach($bidders as $user){
		if($user['user']!=$sUserid){
			$tmp.=','.$user['user'].',';
		}
	}
	return $tmp;
}

function update_account($aPost){
	// update db with new $_POST items (Edit user settings), may need cookie to fetch previous userid if this was updated
	// returns null or an error message
	global $db;
	global $USERID;

	$tmp=$aPost['usersignin'];
	if(!$USERID==$aPost['usersignin']){
		// user changed user id, check from previous user id
		// but before check new name vs db
		$tmp=$USERID;
	}
	// we need the existing record
	$query='SELECT * FROM bidders';
	$bidders=$db->query($query);
	
	// validate new user id else skip this stage
	if(!$USERID==$aPost['usersignin']){
		foreach($bidders as $user){
			if($user['user']==$aPost['usersignin'] && (!$aPost['usersignin']==$USERID)){
				// it exsts, must abort
				return 'New User Name already in use';
			}
		}
	}

	// check in the db to replace the items, use $tmp
	foreach($bidders as $user){
		if($user['user']==$tmp){
			// write new info here
			$q=$user['id'];
			$w=$aPost['usersignin'];
			$e=$user['email'];
			$r=$aPost['namesignin'];//
			$t=$aPost['phonesignin'];
			$query = "REPLACE INTO bidders (id, user, email, name, phone) VALUES ('$q', '$w', '$e','$r','$t')";
			$db->exec($query);
			return null;
		}
	}
	return 'Could not find the user.';	
}

function get_user_loginfo($sUserid){
	// returns from db login info for user: userid email name phone
	global $db;
	$query="SELECT * FROM bidders WHERE user='$sUserid'";
	$bidders=$db->query($query);

	foreach($bidders as $user){
		return array($user['user'],$user['email'],($user['name']=='Null')?null:$user['name'],($user['phone'])?null:$user['phone']);
	}
}

function save_new_account($aGet){
	// parse the $_GET array and save to database
	// fetch values for: email user name phone from $aGet['email']...
	
	// check if user name is not duplicated in database. This check was performed in the post but must be repeated in the get
	// no need to check email since we are coming from the user's email. name and phone are not mandatory
	// returns array null and user id OR error message and null
	if(strlen(trim($aGet['user']))>0){
		// check vs database here, must not find any match! returns null for OK or error message if no good
		return array(null,' -- This functionality still on the works -- ');
	}else{
		// user name is empty
		return array('There is no User Name.',null);
	}
}

function verify_account($aPost){
	// needs [email] and [user id] to match against the database
	global $db;
	global $USERID;

	$query='SELECT * FROM bidders';
	$bidders=$db->query($query);
	foreach($bidders as $user){
		if($user['user']==$aPost['usersignin'] && $user['email']==$aPost['emailsignin']){
			return array(null,$user['user']);
		}
	}
	// returns any error message or null
	return array('Could not find user Id.',null);
}

function send_account_email($aPost){
	// will send confirm email to potential user
	// new user to be added to db only if clicking link provided
	global $NAMEBENE;
	$header="Content-Type: text/html\r\n";
	$header.='From: eduardo@eddy.x10.mx';
	
	// blank allowed in user id and name and phone
	$aPost['namesignin']=filter_var($aPost['namesignin'],FILTER_SANITIZE_ENCODED);
	$aPost['usersignin']=filter_var($aPost['usersignin'],FILTER_SANITIZE_ENCODED);
	$aPost['phonesignin']=filter_var($aPost['phonesignin'],FILTER_SANITIZE_ENCODED);
	
	$acctDetails='&email='.$aPost['emailsignin'].'&user='.$aPost['usersignin'].'&name='.$aPost['namesignin'].'&phone='.$aPost['phonesignin'];
	
	$message='Hello '.$aPost['usersignin']."\n";
	$message.='You have just joined the silent auction for '.$NAMEBENE."\n";
	$message.="Thank you so much and please read the bidding regulations and make sure you make at least one good bid.\n";
	$message.='<a href=http://localhost/sandcastle/bidding/index.php?action=subscribe'.$acctDetails.'>Please click this link to get to the bidding page.</a>';
	
	mail($aPost['emailsignin'],'Silent Auction for '.$NAMEBENE,$message,$header);
	return '<div id="email"><h3>Just a pretend email until Watson gets to work.</h3><p>'.$header.'</p><p>Recepient: '.$aPost['emailsignin'].'</p><p>Subject: Silent Auction for '.$NAMEBENE.'</p><p>Message with link to activate new account:</p><p>'.$message.'</p></div>';
}


function reset_items_page(){
	// returns null or an error message
	return null;	
}

?>

