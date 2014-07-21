<?php 
function microtime_text(){
	list($useg, $seg) = explode(" ", microtime());
	$tiempo_long = "".$seg."".$useg;
	$tiempo = substr($tiempo_long,0,10)."".substr($tiempo_long,12,18); 
	return $tiempo;
}

?>