<?php
// get data from db based on user id, $USERID
/*
$data[0]=array("<a href='#'><img src='./images/student.jpg' width=100 height=162 title='Click to enlarge' /></a>" ,'The Confused','Jezz Photography',"<a href='http://www.jezzartcrapo.com' target='_blank'>www.jezzartcrapo.com</a>",'(value $22.75)','1 - $26.75 Slick','2 - $26.00 Mambo','3 - $20.00 Suzan V.','17 - $10.50 '.$USERID,"<label>place bid: </label><input type='text' name='indbid'/>");

$t='';
for($i=1;$i<24;$i++){
	$t.="<ul class='adjthumb'>";
	for($j=0;$j<count($data[0]);$j++){
		$t.='<li'.(($j>count($data[0])-3)?' class=bold':'').'>'.$data[0][$j].'</li>';
	}
	$t.='</ul>';
}
*/

// ,artists.web,art.title,art.value,picfiles.filename,picfiles.rank,bidders.user,bids.bid
// start by displaying all the info ie: $USERID is null
// "SELECT art.title,artists.name,picfiles.filename,bids.bid,bidders.user FROM art INNER JOIN artists ON art.aid=artists.aid INNER JOIN picfiles ON picfiles.itemid=art.itemid INNER JOIN bids ON bids.itemid=art.itemid INNER JOIN bidders ON bidders.id=bids.uid ORDER BY art.title"
// 'SELECT artists.name,artists.web,art.title,art.value,picfiles.filename,picfiles.rank,bidders.user,bids.bid FROM art INNER JOIN picfiles ON art.itemid=picfiles.itemid INNER JOIN artists ON art.aid=artists.aid INNER JOIN bids ON art.itemid=bids.itemid INNER JOIN bidders ON bids.uid=bidders.id ORDER BY art.title GROUP BY art.itemid'
$query='SELECT art.title,art.value,picfiles.filename,picfiles.rank,artists.name,bids.bid,bidders.user FROM art INNER JOIN picfiles ON picfiles.itemid=art.itemid INNER JOIN artists ON art.aid=artists.aid INNER JOIN bids ON bids.itemid=art.itemid INNER JOIN bidders ON bidders.id=bids.uid ORDER BY art.title';
//$query='SELECT * FROM art';
$allart=$db->query($query);
echo print_r($allart);
$t='';
foreach($allart as $art){
	$t.="<ul class='adjthumb'>";
	for($i=0;$i<(0.5*count($art));$i++){
		$t.='<li>'.$art[$i].'</li>';
	}
	$t.='</ul>';
}

$t.='<div><input type="submit" name="action" value="place bid" /></div>';
?>
<h2>Auctioned Items</h2>
<div>
	<form action="." method="post">
		<?php echo $t; ?>
	</form>		
</div>