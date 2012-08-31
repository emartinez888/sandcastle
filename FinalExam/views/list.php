<?php

// must perform rss check & update db before the list
// get db data
$query='SELECT * FROM jobs';
$jobs=$db->query($query);

// scraper
// scrapes only the text
$sUrl='http://www.wowjobs.ca/wowrss.aspx?q=Web+Developer&l=N2T1G8&s=&sr=25&t=30&f=r&e=&si=A&Dup=H';
//$sUrl='http://eddy.x10.mx';
//header("Content-Type: text/plain");
$sIn = file_get_contents($sUrl);
if(preg_match_all("|<item(.*)</item>|U", $sIn, $aItem)){
	// always put search match info between | and |U
	// check PHP regular expressions for more pattern match
	foreach($aItem[0] as $sItem){
		if(preg_match_all("|<guid>(.*)</guid>|U", $sItem, $aGuid)){
			// looping through each guid
			// only update db if guid is missing
			$gu=$st=$li=$dt=$de=$au='';
			$gu=$aGuid[0][0];
			//echo mysql_num_rows($jobs);
			//exit(); (
			if(empty($jobs)){
				// fresh db
				if(preg_match_all("|<title(.*)</title>|U", $sItem, $aTitle)){
					$sTitle = preg_replace('/<!\[CDATA\[/', '', $aTitle[0][0]);
					$sTitle = preg_replace('/\]\]>/', '', $sTitle);
					$st=strip_tags($sTitle);
				}
				if(preg_match_all("|<description(.*)</description>|U", $sItem, $aDescription)){
					$description = preg_replace('/<!\[CDATA\[/', '', $aTitle[0][0]);
					$description = preg_replace('/\]\]>/', '', $sTitle);
					$de=$aDescription[0][0];
				}
				if(preg_match_all("|<link(.*)</link>|U", $sItem, $aLink)){
					$li=$aLink[0][0];
				}
				if(preg_match_all("|<pubDate(.*)</pubDate>|U", $sItem, $aDate)){
					$dt=$aDate[0][0];
				}
				if(preg_match_all("|<author(.*)</author>|U", $sItem, $aAuthor)){
					$au=$aAuthor[0][0];
				}
				$query="INSERT INTO jobs (guid,title,link,pubdate,description,author) VALUES ('$gu','$st','$li','$dt','$de','$au')";
				$db->exec($query);
			}else{
				// db has rows thus loop through db
				$match=false;
				foreach($jobs as $job){
					if($aGuid[0][0]==$job['guid']){
						$match=true;
						break;
					}
				}
					if(!$match){
						// new guid, scrape and insert
						if(preg_match_all("|<title(.*)</title>|U", $sItem, $aTitle)){
							$sTitle = preg_replace('/<!\[CDATA\[/', '', $aTitle[0][0]);
							$sTitle = preg_replace('/\]\]>/', '', $sTitle);
							$st=strip_tags($sTitle);
						}
						if(preg_match_all("|<description(.*)</description>|U", $sItem, $aDescription)){
							$description = preg_replace('/<!\[CDATA\[/', '', $aTitle[0][0]);
							$description = preg_replace('/\]\]>/', '', $sTitle);
							$de=$aDescription[0][0];
						}
						if(preg_match_all("|<link(.*)</link>|U", $sItem, $aLink)){
							$li=$aLink[0][0];
						}
						if(preg_match_all("|<pubDate(.*)</pubDate>|U", $sItem, $aDate)){
							$dt=$aDate[0][0];
						}
						if(preg_match_all("|<author(.*)</author>|U", $sItem, $aAuthor)){
							$au=$aAuthor[0][0];
						}
						$query="INSERT INTO jobs (guid,title,link,pubdate,description,author) VALUES ('$gu','$st','$li','$dt','$de','$au')";
						$db->exec($query);
					}
						
			}
		}
	}	
}


$query='SELECT * FROM jobs';
$jobs=$db->query($query);
//localhost/sandcastle/bidding/index.php?action=subscribe
//$sels='<td><select><option></option><option>Perform search</option><option>Send resume</option><option>Prepare for interview</option><option>Attend interview</option><option>Send thank-you</option><option>Follow-up</option><option>None</option></select></td>';
$t='<table><tr><th>date Posted</th><th>Title</th><th>Link</th><th>Next Action</th></tr>';
foreach($jobs as $job){
	$nextact=$job['nextaction'];
	if($job['nextaction']==Null){
		$nextact='set action';
	}
	$rr='<a href="localhost/sandcastle/FinalExam/index.php?action=nextaction'.$job['id'].'" />'.$nextact.'</a>';
	$rrr='<a href="'.$job['link'].'" />'.$job['link'].'</a>';
	$t.='<tr><td>'.$job['pubdate'].'</td><td>'.$job['title'].'</td><td>'.$rrr.'</td><td>'.$rr.'</td></tr>';
}

$t.='</table>';
echo $t;


?>