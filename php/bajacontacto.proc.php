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
		session_start();
		$usuario = $_SESSION['usu_id'];
		$sql = "UPDATE tbl_contactos SET con_estado='baja' WHERE con_id='$con_id'";
		$baja_producto = mysqli_query($conexion, $sql); 

			header("location:contactos.php");	

	
		