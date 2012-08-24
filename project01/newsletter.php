<?php
$message='';
if(isset($_POST['submit'])){
	// user wants to save info in database
	// don't save any data, just send email response
	// must validate all valid fields, hackers could change the data info
	
	// checkdate format is mm dd yyyy
	$res=$_POST['dob'];
	$res=explode('-',$res);
	//$bTest=$bTest && checkdate($res[1],$res[2],$res[0]);
	
	//$res=filter_var($_POST['email'], FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i")) );
	//$bTest=$bTest && (strlen(filter_var($_POST['email'], FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i")) ))>0);
	
	// test in the given order, keep this order!: names , date and email last
	$bTest=(strlen(trim($_POST['name_first']))>0 && strlen(trim($_POST['name_last']))>0 && strlen(trim($_POST['dob']))>0) && (checkdate($res[1],$res[2],$res[0])) && ((strlen(filter_var($_POST['email'], FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i")) ))>0)) ;


	if($bTest){
		// all good, send email
		$message='Hello '.$_POST['name_first'].' '.$_POST['name_last']."\n";
		$message.="You have just joined the save a pig campain by requesting two jugs of swine juice.\n";
		$message.='You will receive once a year on '.$_POST['dob'].", for the rest of your life, these jugs.\n";
		$message.="Congrats and thanks again.\nThe management\n";
		mail($_POST['email'],'Swine juice jugs request',$message,'From: eduardo@eddy.x10.mx');
		$message='email sent.';
	}
	else{
		$message='SOME WRONG ENTRIES';
	}
}

// build table squeleton for Calendar
$t='';
$aDs=array("","S","M","T","W","T","F","S");
for($i=1;$i<8;$i++){
	$t.='<tr>';
	for($j=1;$j<8;$j++){
		if($i==1){
			$t.='<th>'.$aDs[$j].'</th>';
		}
		else{
			$t.='<td></td>';
		}	
	}
	$t.='</tr>';
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<!--
	Website:  		Email newsletter
	File:			
	Developer:      Eduardo Martinez
	Languages Used: XHTML 1.0
	Date Created:   2012-03-22
	Last Revised:   

	Website Description:	
		tofu products are so tasty, bacon is overrated thus why not
		saving a pig today by ordering a juicy jug of swine?
		
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
	
	<!-- Favicon links 
	<link rel="icon" href="favicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
	-->
	
	<!-- CSS link -->
	<link rel="stylesheet" type="text/css" href="./css/newsletter.css" />
	
	<!-- JavaScript link -->
	<script src="./js/newsletter.js" type="text/javascript"></script>

	<title>Newsletter</title>
</head>
<body id="thebod">
	<div id="page_wrap">
		<div id="container">
			<div id="header">
			</div> <!-- header -->
			
			<div id="main">
				<form action="#" method="post">
					<h1>Sign for our Email Newsletter</h1>
					<img src="./images/swinejugs.gif" alt="Swine Jugs" height="178" width="158" />
					<h2>And get your FREE swine bottle today</h2>
					<div>
						<label for="name_first">First Name</label>
						<input type="text" id="name_first" name="name_first" maxlength="40" value="" />
					</div>
					<div>
						<label for="name_last">Last Name</label>
						<input type="text" id="name_last" name="name_last" maxlength="40" value="" />
					</div>
					<div>
						<label for="email">Email</label>
						<input type="text" id="email" name="email" maxlength="100" value="" />
					</div>
					<div id="div_dob">
						<label for="dob">Date of birth</label>
						<input type="text" id="dob" name="dob" maxlength="10" />
					</div>
					<div id="div_open_cal">
						<img id="open_cal" name="open_cal" alt="Calendar Button" src="./images/calendaricon01.jpg" />
					</div>
					
					<div id="calendar" class="hide">
						<input type="button" id="left" name="left" value="&lt;" />
						<select id="year" name="year" > </select>
						<input type="button" id="right" name="right" value="&gt;" />
						<p id="month"></p>
						<table id="cal_table">
							<?php echo $t; ?>
						</table>
						
					</div>
					<input id="send_info" type="submit" value="submit" name="submit" />
					<input id="reset_info" type="reset" value="Reset Form" />
				</form>
				<div>
					<h2><?php echo $message ?></h2>
				</div>
			</div> <!-- main -->
			
			<div id="footer">
			</div> <!-- footer -->
			
		</div> <!-- container -->
	</div> <!-- page_wrap -->
	
	
</body>
</html>