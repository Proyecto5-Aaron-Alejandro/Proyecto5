<?php
extract($_POST);

//Realizamos la conexión a la BD
$mysqli = new mysqli("localhost", "root", "", "bd_proyecto5");
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
//Consulta de busqueda del usuario
	$con =	"SELECT * FROM `tbl_usuario` WHERE `usu_nombre` = '". $name ."' AND `usu_pass` = '" . $pass . "'";	
	//Lanzamos la consulta a la BD
	$result	=	mysqli_query($mysqli,$con);
	//Contamos los resultados que nos devuelve
	$total  = mysqli_num_rows($result); 
	//Ponemos el condicional según el nombre de registros que nos devuelva
	if($total>=1){
		//Iniciamos sessión para las variables de sesion
		session_start();
		while ($fila = mysqli_fetch_row($result)) 
		{
			//Asignamos la variable de session "usu_id" al ID del usuario
			$_SESSION['usu_id']	=	$fila[0];
			//Redireccionamos
			if ($_SESSION['usu_id']!=5) {
			header("location:contactos.php");	
			}else{
			header("location:contactos.php");
			}
		}
	}
	//Si no nos devuelve registros significa que el usuario o contraseña han sido incorrectos.
	else{		
		header("location: ../index.php?nolog=1");
	}
?>