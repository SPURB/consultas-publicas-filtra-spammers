<?php
function checkRepetition($smallText, $longtext){ 
/**
$smallText, $longtext -> devem ser strings
retorna [boolean, $smallText] quando verdadeiro
retorna [false, "nãó é spam"] quando falso
 */
	$newSmallText = '/' . strtoupper($smallText) . '/mix'; // Regex para remover espaços e ignorar maíusculas 
	$newlongtext = '/' .  strtoupper($longtext)  . '/mix'; // Foi necessário também usar strtoupper() para normalizar caracteres especiais
	preg_match_all($newSmallText, $newlongtext, $matches, PREG_SET_ORDER, 0);
	if ($matches){ 
		return [true, $smallText]; 
	}
	else {  
		return [false, "não é spam" ]; 
	}
}

?>