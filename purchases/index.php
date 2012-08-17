<?php


/*active record import for database connection*/
require '../ActiveRecord/ActiveRecord.php';

ActiveRecord\Config::initialize(function($cfg)
{
	$cfg->set_model_directory('model');
	$cfg->set_connections(
			array(
					'development' => 'mysql://root:@localhost/purchases',
					'test' => 'mysql://username:password@localhost/test_database_name',
					'production' => 'mysql://username:password@localhost/production_database_name'
			)
	);
});
/*end active record import for database connection*/

//handling adding to db
if(array_key_exists('submit', $_POST)){
	$oPurchase = new Purchase;	//create a new object to store purchase values
	$oPurchase->date = $_POST['date'];   //assigning the date field of the post array to the $oPurchase object variable
	$oPurchase->purchase = $_POST['purchase'];
	$oPurchase->price = $_POST['price'];
	$oPurchase->save();	//save object to database
	
	//print_r($oPurchase);
	//print_r is  a debugging tool that prints out all aspects of an object or variable
}


//handling which screen to display - list or add
if(array_key_exists('add', $_POST)){
	include 'view/add.php';   //bring up the add item form if the add button has been pressed
}//end if
else{
	include 'view/list.php';	//or the list of stuff if it hasn't
}//end else

?>

