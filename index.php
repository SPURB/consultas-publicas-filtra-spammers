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
		return $content;
	}, $rows);

	$spams = chopTextToArray($number_spamTextToChop, $txtFile);
	$spam_index = 0;

	foreach ($rowsContent as $key=>$rowContent) {
		if(checkRepetition($spams[$spam_index], $rowContent['content'])[0] == true){
			array_push($spammers, $rowContent['memid']);
		}
	}

	echo '<h1>Checando string: "' . $spams[$spam_index] . '"</h1>' ;
	echo '<p>total de spammers: ' . count($spammers) . '</p>';
	echo '<p>Template: ' . chopTextToArray($number_spamTextToChop, $txtFile, true) . '</p>'; 
	
	if($element == 'li'){
		echo "<ul>";
		foreach ($spammers as $spammer) {
			echo "<li>". $spammer . "</li>";
		}
		echo "</ul>";
	}

	elseif($element == 'csv'){
		echo "<br>";
		foreach ($spammers as $spammer) {
			echo  $spammer . ", ";
		}
	}

	else {
		echo '<pre>';
		print_r($spammers);
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
		</style>
	</head>
	<body>
		<?php
		render('csv', 5, 60, 'spam_templates/spam_1.txt');// ($element, $number_id_consulta, $number_spam, $textToChop)
		?>
	</body>
</html>

<?php
?>