<?php

function sendEmails(){



	foreach(Email::find('all') as $sEmail){
		$message=$_POST['message'];
		$subject=$_POST['subject'];
	}
	
	if($bTest){
		// all good, send email
		$message='Hello '.$_POST['name_first'].' '.$_POST['name_first'].'\r\n';
		$message.='You have just joined the save a pig campain by requesting two jugs of swine.\r\n';
		$message.='You will receive once a year on '.$_POST['dob'].' for the rest of your life these jugs.\r\n';
		$message.='Congrats and thanks again.\r\nThe management\r\n';
		mail($_POST['email'],'Swine jugs request',$message,'From: hello@eddy.x10.mx');
		echo 'email sent.';
	}
	else{
		echo 'SOME WRONG ENTRIES';
	}

}

?>

