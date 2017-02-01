<!DOCTYPE html>
<?php
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
            }
        //echo $con;
        //Lanzamos la consulta a la BD



?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>My Contacts | Contacts</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  	<link rel="stylesheet" type="text/css" href="../css/costum.css">
    <script>
    //Funcion para validar  el formulario
    function validar()
    {
      var error ="";

      if(document.getElementById("nombre").value=="")
      {
        error+="Error, el nombre no puede estar vacío \n";
        document.getElementById("nombre").style.borderColor="red";
      }
       if(document.getElementById("apellido").value=="")
      {
        error+="Error, el apellido no puede estar vacío \n";
        document.getElementById("apellido").style.borderColor="red";
      }

      if(document.getElementById("email").value=="")
      {
        error+="Error, el email no puede estar vacío \n";
        document.getElementById("email").style.borderColor="red";
      }

      if(document.getElementById("telefono1").value=="")
      {
        error+="Error, el teléfono no puede estar vacío \n";
        document.getElementById("telefono1").style.borderColor="red";
      }

      if(document.getElementById("latitud").value=="")
      {
        error+="Error, la latitud no puede estar vacío \n";
        document.getElementById("latitud").style.borderColor="red";
      }

      if(document.getElementById("longitud").value=="")
      {
        error+="Error, la longitud no puede estar vacío \n";
        document.getElementById("longitud").style.borderColor="red";
      }
      if(error!="")
      {
        alert(error);
        return false;
      }
      else{
        return true;
      }
    }
    //END VALIDAR()

    </script>
</head>

<body>

    <div id="wrapper" class="contacts">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <img class="logo_header" src="../img/logo.png" href="#"><a href='#' style="padding-left:10px;">My Contacts</a></img>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $usu_nombre; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="logout.proc.php" onclick="return logout();"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li >
                        <a href="contactos.php"><i class="fa fa-fw fa-users"></i> Contactos</a>
                    </li>
                    <li class="active">
                        <a href="#"><i class="fa fa-fw fa-user"></i> Añadir Contacto</a>
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper" class="page-wrapper">
            <div class="container-fluid container-fluid2">
                <div class="row ">
                    <h2 style="text-align:center;">Añadir Contacto</h2>
                  <form name="formulario_ins" class="formulario_ins" method="post" action="insertar.proc.php" onsubmit="return validar();">

                  <table width="420px">
                  <tr>
                   <td valign="top">
                    <label for="first_name">Nombre *</label>
                   </td>
                   <td valign="top">
                    <input  type="text" id="nombre" name="nombre" maxlength="15" size="30">
                   </td>
                  </tr>
                  <tr>
                   <td valign="top">
                    <label for="last_name">Apellido *</label>
                   </td>
                   <td valign="top">
                    <input  type="text" id="apellido" name="apellido" maxlength="15" size="30">
                   </td>
                  </tr>
                  <tr>
                   <td valign="top">
                    <label for="email">E-mail *</label>
                   </td>
                   <td valign="top">
                    <input  type="text" id="email" name="email" maxlength="50" size="30">
                   </td>
                  </tr>
                  <tr>
                  <td valign="top">
                    <label for="telephone">Teléfono 1 *</label>
                   </td>
                   <td valign="top">
                    <input  type="text" id="telefono1" name="telefono1" maxlength="9" size="30">
                   </td>
                  </tr>
                  <tr>
                   <td valign="top">
                    <label for="telephone">Teléfono 2</label>
                   </td>
                   <td valign="top">
                    <input  type="text" id="telefono2" name="telefono2" maxlength="9" size="30">
                   </td>
                  </tr>
                  <tr>
                   <td valign="top">
                    <label for="message">Latitud *</label>

                   </td>
                   <td valign="top">
                        <input  type="text" id="latitud" name="latitud" maxlength="20" size="30">
                   </td>
                  </tr>
                  <tr>
                  <td valign="top">
                    <label for="message">Longitud *</label>

                   </td>
                   <td valign="top">
                        <input  type="text" id="longitud" name="longitud" maxlength="20" size="30">
                   </td>
                  </tr>
                  <tr>
                   <td valign="top">
                    <label for="message">Latitud(2a dirección)</label>

                   </td>
                   <td valign="top">
                        <input  type="text" id="latitud1" name="latitud1" maxlength="20" size="30">
                   </td>
                  </tr>
                  <tr>
                  <td valign="top">
                    <label for="message">Longitud(2a dirección) *</label>

                   </td>
                   <td valign="top">
                        <input  type="text" id="longitud1" name="longitud1" maxlength="20" size="30">
                   </td>
                  </tr>
                  <tr>
                   <td colspan="2" style="text-align:center">
                    <input type="submit" class="submit" value="Enviar">  
                   </td>
                  </tr>
                  </table>
                  </form>
                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../js/plugins/morris/raphael.min.js"></script>
    <script src="../js/plugins/morris/morris.min.js"></script>
    <script src="../js/plugins/morris/morris-data.js"></script>

</body>

</html>
