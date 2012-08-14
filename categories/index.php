<?php
require 'model/myfunctions.php';

$categories=get_dogs();
$products=get_price();

include 'view/list.php';
?>