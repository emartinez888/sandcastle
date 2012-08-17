<?php
$t="";
$Purchase=array('one','two','three','four','five');
	foreach($Purchase as $oPurchase){
		$t.='<tr>';
			$t.='<td>'.$oPurchase.'</td>';
			$t.='<td>'.$oPurchase.'</td>';
			$t.='<td>'.$oPurchase.'</td>';
		$t.='</tr>';
	}
?>
<html>
	<body>
		<table>
			<tr>
				<th>Date</th>
				<th>Purchase</th>
				<th>Price</th>
				<th>Total</th>
			</tr>
			<?php echo $t; ?>
		</table>
	</body>
</html>