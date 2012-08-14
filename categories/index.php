<?php
require 'model/myfunctions.php';

$categories=get_categories();
$products=get_products();

include 'view/list.php';
?>