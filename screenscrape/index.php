<?php
	// scrapes only the text
	$sUrl='http://www.rssweather.com/wx/ca/on/guelph/rss.php';
	$sUrl='http://www.bankofcanada.ca/stats/assets/rates_rss/noon/en_USD.xml';
	//$sUrl='http://eddy.x10.mx';
	header("Content-Type: text/plain");
	$sIn = file_get_contents($sUrl);
	echo $sIn;
	exit();
	// always put search match info between | and |U
	// check PHP regular expressions for more pattern match
	$m=preg_match_all("|<title>Forecast(.*)</title>|U", $sIn,$aIn);
	echo $m;
	//echo $aIn[0][0];
	foreach($aIn[0] as $sRes){
		echo "$sRes\n";
	}
	//echo $sIn;
?>