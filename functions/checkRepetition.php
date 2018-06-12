<?php
function checkRepetition($smallText, $longtext){ 
/**
$smallText, $longtext -> devem ser strings
retorna [true, $smallText] quando verdadeiro
retorna [false, "nãó é spam"] quando falso
 */
	$newSmallText = '/' . str_replace('/', '', $smallText) . '/mix'; // Regex para remover espaços e ignorar maíusculas 
	$newlongtext = '/' .  str_replace('/', '', $longtext)  . '/mix'; // 
	preg_match_all($newSmallText, $newlongtext, $matches, PREG_SET_ORDER, 0);

	if ($matches){ 
		return [true, $smallText]; 
	}
	else {
		return [false, "não é spam" ]; 
	}
}

?>