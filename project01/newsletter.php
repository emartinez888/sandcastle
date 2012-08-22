<?php
$bTest=true;
if(isset($_POST['submit'])){
	// user wants to save info in database
	// don't save any data, just send email response
	// must validate all valid fields, hackers could change the data info
	if(!(strlen(trim($_POST['name_first']))>0 && strlen(trim($_POST['name_last'])) && strlen(trim($_POST['dob'])))>0{
		$bTest=$bTest && false
	}
	
	$res=$_POST['dob'];
	$res=explode('-',$res);
	// checkdate format is mm dd yyyy
	$bTest=$bTest && checkdate($res[1],$res[2],$res[0]);
	
	$res=filter_var($_POST['email'], FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i")) );
	$bTest=$bTest && (strlen($res)>0);
	
	if($bTest){
		// all good, send email
	}
	else{
		
	}
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
							<tr>
								<th>S</th>
								<th>M</th>
								<th>T</th>
								<th>W</th>
								<th>T</th>
								<th>F</th>
								<th>S</th>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
						</table>
						
					</div>
					<input id="send_info" type="submit" value="submit" />
					<input id="reset_info" type="reset" value="Reset Form" />
				</form>
				
			</div> <!-- main -->
			
			<div id="footer">
			</div> <!-- footer -->
			
		</div> <!-- container -->
	</div> <!-- page_wrap -->
	
	
</body>
</html>