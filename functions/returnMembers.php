<?php
function returnMembers($id_consulta){
/**
 * $id_consulta -> valor numérico de id_consulta do bando de dados
 * retorna todos os members desta id
 */
	function removeSpaces($str){
		return $str = substr($str, 0, -2);
	}

	$properties = "C:/xampp/htdocs/bd_local.properties";
	$propFile = fopen($properties, "r");

	while (!feof($propFile)) {
		$line = fgets($propFile);
		$split = explode(":", $line);
		switch ($split[0]) {
			case 'host': $host = removeSpaces($split[1]); break;
			case 'user': $user = removeSpaces($split[1]); break;
			case 'password': $password = removeSpaces($split[1]); break;
			case 'dbname': $dbname = $split[1]; break; // local
		}
	}

	$mysqli = new mysqli($host, $user, $password, $dbname);
	$mysqli->set_charset('utf8');

	if ($mysqli->connect_error){
		die("Connection failed: " . $mysqli->connect_error);
		exit();
	}

	else {
		$query = "SELECT * FROM members WHERE id_consulta=$id_consulta";
		// echo $query;
		$result = $mysqli->query($query);

		while($row = $result->fetch_array()){
			$rows[] = $row;
		}
	}
	return $rows;
	$mysqli->close();
}
?>