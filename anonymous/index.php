<?php

function display(){
	echo "Gina Lollobrigida was here yesterday.";
}

// function assigned to a variable used for callbacks
// don't forget the ";" at the end since it is a variable not a function
$fSayHiToGina=function(){
	echo '<br>'." Hello Gina.";
};

// we need to create those variable functions to pass them as arguments to the callback function
// since the callback function can only get variables as arguments!
function callMeBack($fCallMe){
	$fCallMe();
	echo '<br>'." Sammy Sosa was here too";
}

?>

<html><body><h1>
	<?php display();
	$fSayHiToGina();
	callMeBack($fSayHiToGina);
	?>
</h1></body></html>