<?php
//realizamos la conexión
		session_start();
        if(!isset($_SESSION["usu_id"])) {
            header("location:../index.php?nolog=2");
        }
        //realizamos la conexión
        $conexion = mysqli_connect('localhost', 'root', '', 'bd_proyecto5');

        //le decimos a la conexión que los datos los devuelva diréctamente en utf8, así no hay que usar htmlentities
        $acentos = mysqli_query($conexion, "SET NAMES 'utf8'");

        if (!$conexion) {
            echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
            echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
            echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
            exit;
        }


        //session_start();
        //$mysqli = new mysqli("localhost", "root", "", "bd_proyecto2");
        //Cogemos el nombre de usuario y la imagen de forma dinámica en la BD
        $con =  "SELECT * FROM `tbl_usuario` WHERE `usu_id` = '". $_SESSION["usu_id"] ."'";
        //echo $con;
        //Lanzamos la consulta a la BD
        $result =   mysqli_query($conexion,$con);
        while ($fila = mysqli_fetch_row($result))
            {
                $usu_nombre  =   $fila[1];
                $usu_id = $fila[0];
            }
        //echo $con;
        //Lanzamos la consulta a la BD



		extract($_REQUEST);

		if ($latitud1==0 AND $longitud1==0) {
			
			$sql_usuario = " UPDATE tbl_contactos SET con_nombre='$nombre', con_apellido='$apellido',con_tlf1='$telefono1',con_tlf2='$telefono2', con_correo='$email',con_latitud='$latitud',con_longitud='$longitud',con_latitud1 = NULL, con_longitud1 = NULL, usuc_id='$usu_id'  WHERE con_id='$con_id'";



		}else{
			$sql_usuario = " UPDATE tbl_contactos SET con_nombre='$nombre', con_apellido='$apellido',con_tlf1='$telefono1',con_tlf2='$telefono2', con_correo='$email',con_latitud='$latitud',con_longitud='$longitud',con_latitud1= '$latitud1', con_longitud1 = '$longitud1', usuc_id='usu_id'  WHERE con_id='$con_id'";


		}

		$usuarios=mysqli_query($conexion, $sql_usuario);


	header('location:contactos.php');
?>
