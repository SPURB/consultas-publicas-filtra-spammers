<?php
function chopTextToArray($numberOfStrings){
/**
$numberOfStrings -> valor numérico
retorna um array de strings do conteúdo de 'spam.txt' dividido por $numberOfStrings 
 */
	$filename = "spam.txt";
	$handle = fopen($filename, "r");
	$longText = fread($handle, filesize($filename));
	$noSpaces = preg_replace('/\s+/ix', '', $longText);

	return str_split($noSpaces, $numberOfStrings);
	// return str_split($longText, $numberOfStrings);
	fclose($handle);
}
?>