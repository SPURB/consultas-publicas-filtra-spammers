<?php
//funções que definem variáveis 				parâmetros			
require './functions/returnMembers.php';   //	(id_consulta)  
require './functions/chopTextToArray.php'; //	(número de caracteres)	
require './functions/checkRepetition.php'; //	(texto grande, texto pequeno)
// print_r(returnMembers(5));
// print_r(chopTextToArray(30));
// print_r(checkRepetition('asd', 'dasdasdaddasd'));

// funções para visualizacao
function render(){
	$rows = returnMembers(5);
	$spams = chopTextToArray(200);

	echo '<pre>';
	// foreach ($rows as $row) {
	// 	foreach ($spams as $spam) {
	// 		// print_r(checkRepetition($row['content'], $spam));
	// 		$repetitionState =  checkRepetition($row['content'], 'olar');
	// 		if( $repetitionState[0] == true){
	// 			echo $repetitionState[1];
	// 		}
	// 	}
	// }

	// echo '<pre>';
		print_r($spams);
		print_r($rows);
	echo '</pre>';

}

?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Filtro Vila Leopoldina</title>
	</head>
	<body>

		<?php
		render();
		// foreach ($spams as $spam) {
		// 	foreach ($rows as $row) {
		// 		$spamTest = '/' . $spam . '/i';
		// 		$content = $row["content"];
		// 		$test = preg_match($spamTest, $content);
		// 		if($test){
		// 			echo "<br>";
		// 			echo "content: " 	. $row['content']	. '<br>'; 
		// 			echo "memid: "		. $row['memid'] 	. '<br>'; 
		// 			echo "commentid: "	. $row['commentid'] . '<br>'; 
		// 			echo "name: "		. $row['name'] 		. '<br>'; 
		// 			echo "spam: "		. $spam 			. '<br>'; 
		// 			echo "teste: "		. $test 			. '<br><hr>';
		// 		}
		// 	}
		// }
		?>
	</body>
</html>

<?php
?>