<!DOCTYPE html>
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
                <img class="logo_header" src="../img/logo.png" href="#"><a href='#' style="padding-left:10px;">My Contacts</a></img>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>  <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
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
                  <form name="formulario_ins" class="formulario_ins" method="post" action="send_form_email.php">

                  <table width="450px">
                  <tr>
                   <td valign="top">
                    <label for="first_name">Nombre *</label>
                   </td>
                   <td valign="top">
                    <input  type="text" name="first_name" maxlength="50" size="30">
                   </td>
                  </tr>
                  <tr>
                   <td valign="top">
                    <label for="last_name">Apellido *</label>
                   </td>
                   <td valign="top">
                    <input  type="text" name="last_name" maxlength="50" size="30">
                   </td>
                  </tr>
                  <tr>
                   <td valign="top">
                    <label for="email">E-mail *</label>
                   </td>
                   <td valign="top">
                    <input  type="text" name="email" maxlength="80" size="30">
                   </td>
                  </tr>
                  <tr>
                   <td valign="top">
                    <label for="telephone">Telefono</label>
                   </td>
                   <td valign="top">
                    <input  type="text" name="telephone" maxlength="30" size="30">
                   </td>
                  </tr>
                  <tr>
                   <td valign="top">
                    <label for="message">Dirección*</label>

                   </td>
                   <td valign="top">
                        <input  type="text" name="direccion" maxlength="30" size="30">
                   </td>
                  </tr>
                  <tr>
                   <td colspan="2" style="text-align:center">
                    <input type="submit" class="submit" value="Enviar">   <a href="http://www.tufelicidadvacacional.com.ve/email_form.php"></a>
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
