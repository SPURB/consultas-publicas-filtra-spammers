<?php
//funções que definem variáveis 				parâmetros			
require './functions/returnMembers.php';   //	(id_consulta)  
require './functions/chopTextToArray.php'; //	(número de caracteres)	
require './functions/checkRepetition.php'; //	(texto grande, texto pequeno)
// print_r(returnMembers(5));
// print_r(chopTextToArray(30));
// print_r(checkRepetition('asd', 'dasdasdaddasd'));

// funções para visualizacao
function render($element, $number_id_consulta, $number_spamTextToChop, $txtFile){
	$spammers = []; //lista de memid spammer
	$rows = returnMembers($number_id_consulta);
	$rowsContent = array_map(function($rowsItem){
		$contetNoSpaces = str_replace(' ', '', $rowsItem['content']);
		$content['content'] = $contetNoSpaces;
		$content['memid'] = $rowsItem['memid'];
		$content['name'] = $rowsItem['name'];
		return $content;
	}, $rows);

	$spams = chopTextToArray($number_spamTextToChop, $txtFile);


	echo '<h3>Strings verificados: </h3>
		<div class="spams">';

	foreach ($spams as $spamKey => $spamValue) {
		foreach ($rowsContent as $key => $rowContent) {
			if(checkRepetition($spamValue, $rowContent['content'])[0] == true){
				if($element == 'names'){
					array_push($spammers, $rowContent['name']);
				}
				else{
					array_push($spammers, $rowContent['memid']);
				}
			}
		}
		echo '<p>' . $spamValue . '</p>' ;
	}
	echo '</div>';

	$uniqueSpammers = array_unique($spammers);

	echo '<p>total de spammers: ' . count($uniqueSpammers) . ' | n° de strings verificadas: ' . count($spams) . '</p>';
	echo '<p>Template: ' . chopTextToArray($number_spamTextToChop, $txtFile, true) . '</p>'; 

	echo "<br>";
	if($element == 'names'){
		foreach ($uniqueSpammers as $spammer) {
			echo  $spammer . ", ";
		}
	}

	else {
		echo '<pre>';
		print_r($uniqueSpammers);
		echo '</pre>';
	}
}

?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Filtro Vila Leopoldina</title>
		<style type="text/css">
			body{
				max-width:100%
			}
			div.spams p{
				padding: .3em;
				width: -moz-fit-content;
				border: 1px solid grey;
				display: inline-block;
				margin: .25em;
			}
		</style>
	</head>
	<body>
		<?php

		if (	
			isset($_GET['output_type']) && 
			isset($_GET['id_consulta']) && 
			isset($_GET['spam_characteres']) && 
			isset($_GET['textpath'])) {
			
			render($_GET['output_type'], $_GET['id_consulta'], $_GET['spam_characteres'], $_GET['textpath']);
		}
		else {
			// echo ``;
			echo 'por favor adicione os parâmetros "output_type", id_consulta", "spam_characteres" e "textpath" na URL. Exemplo:</br> 
			http://localhost:7080/consultas-publicas-filtra-spammers/?output_type=names&id_consulta=5&spam_characteres=60&textpath=spam_templates/spam_0.txt';
		}
		?>
	</body>
</html>

<?php
?>