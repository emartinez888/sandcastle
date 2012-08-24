<form action="." method="post">
	<ul>
	<?php 
		foreach(Email::find('all')as $sEmail){
			echo '<li>'.$sEmail->email.'</li>';
			// ?action we pass a value to any variable we want in php
			// with links always use $_GET its a must!
			echo "<a href=?action=Delete&email=$sEmail->email><img src='views/images/cross.png' alt='Delete' /></a>";
		}
	?>
	</ul>
	<label>New Email:</label>
	<input type="text" name="email" /><br/>
	<input type="submit" value="Subscribe" name="action"/>
		
</form>	