<?php
?>

<html>
	<body>
		<form action="." method="POST">
			<input type="submit" name="add" value="Add" />
		
		<table>			
			<tr>
				<th>date</th>
				<th>purchase</th>
				<th>price</th>
				<th>total</th>
			</tr>
			
			<?php foreach(Purchase::find('all') as $oPurchase){ ?>  <!-- note php tag enclosing foreach code here, and the closing brace of it below in a seperate php tag -->
			<tr>
					<td><?php echo $oPurchase->date ?> </td>
					<td><?php echo $oPurchase->purchase ?> </td>
					<td><?php echo $oPurchase->price ?> </td>
			</tr>		 
				<?php } ?>		<!-- note php tag enclosing closing brace of php foreach code -->			
		</table>		
		
			<input type="submit" name="add" value="Add" />
		</form>
	</body>
</html>