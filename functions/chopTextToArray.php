<?php
function chopTextToArray($l = 0, $txtFileLocation, $fullText = false) {
	// /**
	// $l -> valor numérico
	// retorna um array de strings do conteúdo de 'spam.txt' dividido por $numberOfStrings com encoding 'utf-8'
	//  */

	// lê spam.txt
	$filename = $txtFileLocation;
	$handle = fopen($filename, "r");
	$longText = fread($handle, filesize($filename));
	$str = str_replace(' ', '', $longText); //remove todos os espaços
	fclose($handle);

	if($fullText == true){
		return $longText;
	}

	else{
		if ($l > 0) { 
			$ret = array();
			$len = mb_strlen($str, "UTF-8");
			for ($i = 0; $i < $len; $i += $l) {
				$ret[] = mb_substr($str, $i, $l, "UTF-8");
			}
			return $ret;
		}
		return preg_split("//u", $str, -1, PREG_SPLIT_NO_EMPTY);
	}
}
?>

