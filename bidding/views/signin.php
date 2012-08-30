<?php

if($signin){
	$t='<div class="ralign"><label>User Id:</label>';
	$t.='<input type="text" name="usersignin" /><br/>';
	$t.='<label>Email:</label>';
	$t.='<input type="text"  id="emailsignin" name="emailsignin" /><br/></div>';
	$t.='<br/><input type="submit" name="verify" value="Sign In" id="signacct"/>';
	$t.='<div><p id="errmsg"></p></div>';
		
}elseif($createAcct){
	$t='<div class="ralign2">';
	$t.='<table><tr><td><label>User Id:</label></td>';
	$t.='<td><input type="text" name="usersignin" /></td><td><label class="red"><sup>required</sup></label></td></tr>';
	$t.='<tr><td><label>Email:</label></td>';
	$t.='<td><input type="text" id="emailsignin" name="emailsignin" /></td><td><label class="red"><sup>required</sup></label></td></tr>';
	$t.='<tr><td><label>Re Enter Email:</label></td>';
	$t.='<td><input type="text" id="emailsignin2" name="emailsignin2" /></td><td><label class="red"><sup>required</sup></label></td>';
	$t.='<tr><td><label>Name:</label></td>';
	$t.='<td><input type="text" id="namesignin" name="namesignin" /></td><td></td></tr>';
	$t.='<tr><td><label>Phone:</label></td>';
	$t.='<td><input type="text" id="phonesignin" name="phonesignin" /></td><td></td></tr></table></div>';
	$t.='<br/><input type="submit" name="verify" value="Create Account" id="veracct" />';
	$t.='<div><p id="errmsg"></p></div>';
}elseif($editAcct){
	// these fields must be populated with $USERID db data
	echo $USERID.' *** ';
	$arr=get_user_loginfo($USERID);

	$t='<div class="ralign2">';
	$t.='<table><tr><td><label>User Id:</label></td>';
	$t.="<td><input type='text' name='usersignin' value='$arr[0]' /></td><td><label class='red'><sup>required</sup></label></td></tr>";
	$t.='<tr><td><label>Name:</label></td>';
	$t.="<td><input type='text' id='namesignin' name='namesignin' value='$arr[2]' /></td><td></td></tr>";
	$t.='<tr><td><label>Phone:</label></td>';
	$t.="<td><input type='text' id='phonesignin' name='phonesignin' value='$arr[3]' /></td><td></td></tr></table></div>";
	$t.='<br/><input type="submit" name="verify" value="Update Account" id="veracct" />';
	$t.='<div><p id="errmsg"></p></div>';			
}else{

	// do allow to re-sign in and you could still create another new account while signed in
	// signin.php and items.php must be complately independent of each other until a defined $USERID is assigned
	$t='<input type="submit" name="action" value="Sign In" />';
	$t.='<input type="submit" name="action" value="Create Account" />';
	if($USERID!=null){
		// allow to edit account
		$t.='<input type="submit" name="action" value="Edit Account" />';
	}
}

?>

<h2>Please Sign In before bidding</h2>
<form action="." method="post">

<?php echo $t; ?>

</form>

