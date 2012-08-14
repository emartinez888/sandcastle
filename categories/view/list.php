<html>
<body>
<h1>
<?php

echo 'Gina says "We have a great selection of..."';

//foreach($categories as $category){
//	echo '<br>'.$category;
//}

foreach($categories as $category){
	echo '<br>'.$category['categoryName'];
}

echo '<br>'.'"And our products are..."';

foreach($products as $product){
	echo '<br>'.$product['productName'];
}

?>
</h1>
</body>
</html>