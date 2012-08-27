<?php

$data=array("<a href='#'><img src='./images/student.jpg' width=60 height=80 /></a>" ,'The Confused','Jezz Photography',"<a href='http://www.jezzartcrapo.com' target='_blank'>www.jezzartcrapo.com</a>",'(value $22.75)','1 - $26.75 Slick','2 - $26.00 Mambo','3 - $20.00 Suzan V.','17 - $10.50 Chudd',"<label>place bid: </label><input type='text' name='indbid'/>");

$t='';
for($i=1;$i<24;$i++){
	$t.="<ul class='adjthumb'>";
	for($j=0;$j<count($data);$j++){
		$t.='<li'.(($j>count($data)-3)?' class=bold':'').'>'.$data[$j].'</li>';
	}
	$t.='</ul>';
}



?>
<h2>Auctioned Items</h2>
<div>
	<form action="." method="post">
		<?php echo $t; ?>
		<div>
		<input type="submit" name="action" value="place bid" />
		</div>
	</form>		
</div>