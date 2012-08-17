<?php
require 'model/myfunctions.php';

$categories=get_dogs();
$products=get_price();
$details=get_dogstuff();

include 'view/list.php';
?>