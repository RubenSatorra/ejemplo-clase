<!DOCTYPE html>
<html>
<head>
</head>

<body>
<?php

	/**
	* Esto es un comentario
	* @author Ruben
	* @return nada
	*/


	ini_set('display_errors',1);
	error_reporting(E_ALL);

	$host = 'localhost';
	$usuario = 'admin';
	$password = 'abc123.';
	$base_datos = 'world';

	$conn = new mysqli($host, $usuario, $password, $base_datos);

	if($conn->connect_error){
		die("Error de conexión: ".$conn->connect_error);
	}

	echo "<p>conexión a la base de datos</p>";



	$sql = "SELECT Name, CountryCode, Population FROM city ORDER BY population DESC LIMIT 10";

	$result = $conn->query($sql);


	if ($result->num_rows >0){

		echo "<table>";
		echo "<tr><th>Ciudad</th><th>País</th><th>Población</th></tr>";

		
		while($row = $result->fetch_assoc()){

			echo "<tr>";
			echo "<td>".$row["Name"]."</td>";
			echo "<td>".$row["CountryCode"]."</td>";
			echo "<td>".$row["Population"]."</td>";
			echo "</tr>";

		}

		echo "</table>";
	}
	if (!$result){
	
		die("Error en la consulta: ".$conn->error);
	}

	else{

	echo "<p>No hay resultados</p>";
	}

	









	$conn->close();


?>
</body>
</html>
