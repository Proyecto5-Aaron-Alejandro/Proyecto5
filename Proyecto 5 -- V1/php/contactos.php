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


        $sql = "SELECT * FROM `tbl_contactos` WHERE `usuc_id` = '". $_SESSION["usu_id"] ."' AND `con_estado`='alta'";
            //$sql = "SELECT * FROM `tbl_contactos` WHERE `usuc_id` = 1 ";


    
        extract($_REQUEST);

        $contacto = mysqli_query($conexion, $sql);


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
                <a class="navbar-brand" href="#">My Contacts</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> 
                    <?php echo $usu_nombre; ?> <b class="caret"></b></a>
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
                    <li class="active">
                        <a href="#"><i class="fa fa-fw fa-dashboard"></i> Contactos</a>
                    </li>
                    <li>
                        <a href="insertar.php"><i class="fa fa-fw fa-bar-chart-o"></i> FAQ</a>
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper" class="page-wrapper">
            <div class="container-fluid">
                <div class="row tabla">
                <?php

                $vuelta= 0;

        if(mysqli_num_rows($contacto)>0){

                                while($contactos    =   mysqli_fetch_array($contacto)){
                                    echo "<div class='content_rec col-sm-3'>";
                                        //echo $fila[0]
                                    echo "<table border>";
                                            echo "<td>Nombre:".$contactos['con_nombre']."</td>";
                                        echo "</tr>";
                                        echo "<tr>";
                                            echo "<td>Apellido: " .$contactos['con_apellido']. "</td>";
                                        echo "</tr>";
                                        echo "<tr>";
                                            echo "<td>Correo: " .$contactos['con_correo']. "</td>";
                                        echo "</tr>";
                                        echo "<tr>";
                                            echo "<td> Móbil:" .$contactos['con_tlf1']. "</td>";
                                        echo "</tr>";
                                        echo "<tr>";
                                            echo "<td> Teléfono:" .$contactos['con_tlf2']. "</td>";
                                        echo "</tr>";
                                        echo "<tr>";
                                            echo "<td colspan='2'> <a href='mapa.php?con_id=".$contactos['con_id']."' '> DIRECCIÓN </a></td>";
                                        echo "</tr>";
                                        echo "<tr>";
                                            echo "<td colspan='2'> <a href='modificarusuario.php?usu_id=".$contactos['con_id']."' '> MODIFICAR </a></td>";
                                        echo "</tr>";

                                        echo "<tr>";
                                            echo "<td colspan='2'> <a href='bajausuario.proc.php?usu_id=".$contactos['con_id']."' onclick='return destroy();'> DAR DE BAJA </a></td>";
                                        echo "</tr>";


                                    echo "</table>";
                                    echo "</div>";



                                }

            } else {
                echo "No hay recursos disponibles";
            }

        ?>

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
