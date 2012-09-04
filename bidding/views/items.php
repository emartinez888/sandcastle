<?php
// get data from db based on user id, $USERID
// $USERID='Julia R.';

$query='SELECT art.itemid,art.title,art.value,picfiles.filename,picfiles.rank,artists.name,artists.web,bids.id,bidders.user,bids.bid,bids.ts FROM art INNER JOIN picfiles ON picfiles.itemid=art.itemid INNER JOIN artists ON art.aid=artists.aid INNER JOIN bids ON bids.itemid=art.itemid INNER JOIN bidders ON bidders.id=bids.uid ORDER BY art.title';
$allart=$db->query($query);

$master=$idas=array();
$c=0;

$picsrnk=$picsfile=$bidsbid=$bidsts=$bidsuser=$bidsid=array();

foreach($allart as $art){
	//$t.="<ul class='adjthumb'>";
	for($i=0;$i<(0.5*count($art));$i++){

		if(in_array($art['itemid'],$idas)){
			// existing item update pictures and bids
			for($j=0;$j<count($master);$j++){
				if($art['itemid']==$master[$j][0]){

					if(!in_array($art['rank'],$picsrnk[$j])){
						array_push($picsrnk[$j],$art['rank']);
						array_push($picsfile[$j],$art['filename']);
					}
					if(!in_array($art['id'],$bidsid[$j])){
						array_push($bidsbid[$j],$art['bid']);
						array_push($bidsts[$j],$art['ts']);
						array_push($bidsuser[$j],$art['user']);
						array_push($bidsid[$j],$art['id']);
					}
					break;
				}
			}
		}else{
			// new item, fetch
			$master[$c]=$picsrnk[$c]=$picsfile[$c]=$bidsbid[$c]=$bidsts[$c]=$bidsuser[$c]=$bidsid[$c]=array();// holds art id, title, artist name, website, value
			array_push($master[$c],$art['itemid'],$art['title'],$art['name'],$art['web'],$art['value']);
			array_push($picsrnk[$c],$art['rank']);
			array_push($picsfile[$c],$art['filename']);
			array_push($bidsbid[$c],$art['bid']);
			array_push($bidsts[$c],$art['ts']);
			array_push($bidsuser[$c],$art['user']);
			array_push($bidsid[$c],$art['id']);
			// append
			array_push($idas, $art['itemid']);
			$c++;
		}
	}
}

// prepare subheader


// lets fill the screen
// loop through each art auctioned
$t='';
for($i=0;$i<count($master);$i++){
	// do some sorting

	array_multisort($picsrnk[$i],$picsfile[$i]);
	$img=$picsfile[$i][0];
	$img="<a href='#'><img src='./images/$img' draggable='true' width=100 height=162 title='Click to enlarge' /></a>";
	
	array_multisort($bidsbid[$i],SORT_DESC,$bidsts[$i],SORT_ASC,$bidsuser[$i],$bidsid[$i]);
	
	$t.="<ul class='adjthumb'>";
	$t.='<li>'.$img.'</li>';
	$t.='<li class="bold">'.$master[$i][1].'</li>';// title
	$t.='<li>'.$master[$i][2].'</li>';// name
	if($master[$i][3]!='Null'){
		$web=$master[$i][3];
		$web="<a href='http://$web'"." target='_blank'>".$web.'</a>';
		$t.='<li>'.$web.'</li>';// web
	}
	
	if($master[$i][4]>0){
		$t.='<li>value: $'.$master[$i][4].'</li>';// value
	}
	
	$tmp='';
	for($j=0;$j<count($bidsbid[$i]);$j++){
		if($bidsuser[$i][$j]==$USERID){
			$tmp='<li class="bold">['.($j+1).' - '.$bidsuser[$i][$j].' $'.$bidsbid[$i][$j].']</li>';
		}
		if($j<3){
			$t.='<li>'.($j+1).' - '.$bidsuser[$i][$j].' $'.$bidsbid[$i][$j].'</li>';
		}
	}
	$t.=$tmp;
	
	if(!is_null($USERID)){
		$t.="<li class='bold'><label>place bid: </label><input type='text' name='indbid'/></li>";
	}
	$t.='</ul>';

}
$t.='<div><input type="submit" name="action" value="place bid" /></div>';

?>
<h2>Auctioned Items</h2>
<?php 
	if(!is_null($USERID)){
		echo "<p>Displaying $USERID bids</p>";
	}	
?>
<div>
	<form action="." method="post">
		<?php echo $t; ?>
	</form>		
</div>