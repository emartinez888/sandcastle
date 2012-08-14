<html>
<body>
<h1>
<?php

echo 'Gina says "We have a great selection of..."';

//foreach($categories as $category){
//	echo '<br>'.$category;
//}
echo '<ul>';
$i=0;
foreach($categories as $category){
	//echo '<li>'.$category['species'].'</li>';//categoryName
	$tmp0[$i++]=$category['species'];
}

//echo '<br>'.'"And our products are..."';
$i=0;
foreach($products as $product){
	//echo '<li>$'.$product['cash'].'</li>';//productName
	$tmp1[$i++]=$product['cash'];
}

for($i=0;$i<count($tmp0);$i++){
	echo '<li>'.$tmp0[$i]."  $".$tmp1[$i].'</li>';
}

echo '</ul>';
?>
</h1>
</body>
</html>