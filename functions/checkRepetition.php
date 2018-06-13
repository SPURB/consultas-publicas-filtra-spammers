<?php
function checkRepetition($smallText, $longtext){ 
/**
$smallText, $longtext -> devem ser strings
retorna [true, $smallText] quando verdadeiro
retorna [false, "nãó é spam"] quando falso
 */

	$toIgnore = [' ','/', '(',')','[',']','*','+', '.', ''];

	$newSmallText = '/' . str_replace($toIgnore, '', $smallText) . '/miXx'; // Regex para remover espaços e ignorar maíusculas 
	$newlongtext = '/' .  str_replace($toIgnore, '', $longtext)  . '/miXx'; // 
	// $newSmallText = '/' .  $smallText . '/miXx'; // Regex para remover espaços e ignorar maíusculas 
	// $newlongtext = '/' 	.  $longtext  . '/miXx'; // 

// ((?!\/).)+

	preg_match_all($newSmallText, $newlongtext, $matches, PREG_SET_ORDER, 0);

	if ($matches){ 
		return [true, $smallText]; 
	}
	else {
		return [false, "não é spam" ]; 
	}
}

?>