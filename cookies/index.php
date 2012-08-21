
<?php



if(!isset($_SERVER['HTTPS'])){
	// make sure the page uses a secure connection
	$url='https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	// $_SERVER['HTTP_HOST'] is "localhost"
	// $_SERVER['REQUEST_URI'] is "sandcastle/httpsonly"
	// this is a redirect on this server
	// BUT if $url starts with https:// then it redirects to another server
	// $url='www.eddy.x10.mx';
	header("Location: ".$url);
	//print_r($url);
	exit();
}

/*active record import for database connection*/
require '../ActiveRecord/ActiveRecord.php';
require 'model/helpers.php';
//require 'model/Users.php';

ActiveRecord\Config::initialize(function($cfg)
{
	$cfg->set_model_directory('model');
	$cfg->set_connections(
			array(
					'development' => 'mysql://root:@localhost/users',
					'test' => 'mysql://username:password@localhost/test_database_name',
					'production' => 'mysql://username:password@localhost/production_database_name'
			)
	);
});
/*end active record import for database connection*/
//echo 'signup: '.array_key_exists('signup', $_POST);
//echo ' submit: '.array_key_exists('submit', $_POST);

if(array_key_exists('signup', $_POST)){
	// from myform.php
	//   isset($_POST['signup'])
	// we want to create new account or login
	include 'views/signup.php';
}
elseif(array_key_exists('submit', $_POST)){
	// from myform.php
	// isset($_POST['submit'])
	// validate password in here!!!
	if(validateUser($_POST)){
		addCookie($_POST['username']);
	}
	else{
		echo 'Your password was: '.$_POST['password'];
	}

}
elseif(array_key_exists('save', $_POST)){
	// coming from creating a new account
	if(addUser($_POST)){
		echo '<div><h2>New account created</h2></div>';
	}
	else{
		echo '<div><h2>Failed to create account</h2></div>';
	}
	addCookie($_POST['username']);
}
elseif(array_key_exists('login', $_POST)){
	// coming from creating a new account

}

if(array_key_exists('username', $_COOKIE)){
	// there is a cookie in the pc, thus build the page with this info
	include 'views/message.php';
}

// we want to refresh the cookie everytime
include 'views/myform.php';

?>
