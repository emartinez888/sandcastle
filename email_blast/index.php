<?php

/*active record import for database connection*/
require '../ActiveRecord/ActiveRecord.php';

ActiveRecord\Config::initialize(function($cfg)
{
	$cfg->set_model_directory('model');
	$cfg->set_connections(
			array(
					'development' => 'mysql://root:@localhost/emails',
					'test' => 'mysql://username:password@localhost/test_database_name',
					'production' => 'mysql://username:password@localhost/production_database_name'
			)
	);
});
/*end active record import for database connection*/

// either from POST or GET
$action=(array_key_exists('action',$_POST)?$_POST['action']:'');
$action=(array_key_exists('action',$_GET)?$_GET['action']:$action);

if($action=='Subscribe'){
	$oEmail=new Email;
	$oEmail->email=$_POST['email'];
	$oEmail->Save();
}elseif($action=='Unsuscribe'){
	$oEmail=Email::find_by_email($_GET['email']);
	if(isset($oEmail)){
		$oEmail->delete();
		echo "You have been unsubscribed";
		exit();
	}
}


if($action=='Edit list'){
	include 'views/edit.php';
}
else{
	include 'views/email.php';
}
?>