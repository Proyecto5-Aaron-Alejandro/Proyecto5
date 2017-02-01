<?php
//realizamos la conexión
	session_start();
        if(!isset($_SESSION["usu_id"])) {
            header("location:../index.php?nolog=2");
        }
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
		if ($latitud1==0 AND $longitud1==0) {
			$sql_usuario = "INSERT INTO tbl_contactos ( con_nombre, con_apellido, con_tlf1, con_tlf2, con_correo, con_latitud, con_longitud, con_latitud1, con_longitud1, usuc_id )  VALUES ('$nombre', '$apellido', '$telefono1', '$telefono2', '$email', '$latitud','$longitud', NULL, NULL,'". $_SESSION["usu_id"] ."')";



		}else{
			$sql_usuario = "INSERT INTO tbl_contactos ( con_nombre, con_apellido, con_tlf1, con_tlf2, con_correo, con_latitud, con_longitud, con_latitud1, con_longitud1, usuc_id )  VALUES ('$nombre', '$apellido', '$telefono1', '$telefono2', '$email', '$latitud','$longitud', '$latitud1','$longitud1','". $_SESSION["usu_id"] ."')";

		}


	

		


	
	$usuario=mysqli_query($conexion, $sql_usuario);
	

	header('location: contactos.php');
?>