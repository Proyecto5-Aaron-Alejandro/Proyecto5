<?php
//realizamos la conexión
		$conexion = mysqli_connect('localhost', 'root', '', 'bd_proyecto5');

		//le decimos a la conexión que los datos los devuelva diréctamente en utf8, así no hay que usar htmlentities
		$acentos = mysqli_query($conexion, "SET NAMES 'utf8'");

		if (!$conexion) {
		    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
		    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		    exit;
		}


		extract($_REQUEST);

	

		$sql_usuario = "INSERT INTO tbl_usuario (usu_nombre, usu_pass)  VALUES ('$name', '$pass')";


	
	$usuario=mysqli_query($conexion, $sql_usuario);
	

	header('location: ../index.php');
?>