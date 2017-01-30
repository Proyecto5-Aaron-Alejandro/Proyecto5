<!DOCTYPE html>
<meta charset="utf-8">
<html>
<head>
	<title>MAMProyect</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/costum.css">
	    <script>
    //Funcion para validar  el formulario
    function validar()
    {
      var error ="";

      if(document.getElementById("name").value=="")
      {
        error+="Error, el nombre no puede estar vacio \n";
        document.getElementById("name").style.borderColor="red";
      }
       if(document.getElementById("pass").value=="")
      {
        error+="Error, la contraseña no puede estar vacio \n";
        document.getElementById("pass").style.borderColor="red";
      }
			p1 = document.getElementById("pass").value;
			p2 = document.getElementById("pass2").value
			if(p1 != p2){
				error+="Error, la contraseña no coincide \n";
				document.getElementById("pass2").style.borderColor="red";
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

	<div class="login_general">
		<p class="titulo_mc">My Contacts</p>
	<div class="login_marco">
	<div class="login_logo">
		<img  class=" login_image" src="../img/logo.png">
	</div>
	<form name="login" action="alta.proc.php" method="POST" onsubmit="return validar();" >
		<div class="login">
			<p class="nickname">
				Nombre de usuario:
				<input type="text" class="name" name="name" id="name" maxlength="15" />
			</p>
			<p class="password">
				Contraseña:
				<input type="password" class="pass" name="pass" id="pass" />
			</p>
			<p class="password">
				Repetir contraseña:
				<input type="password" class="pass" name="pass2" id="pass2"/>
			</p>
			<p class="register_login">Ya estas registrado? Inicia sesión haciendo <a href="../index.php">click aquí<a></p>
			<input class="send" id="send" type="submit" value="Acceder" />
		</div>
	</form>
</div>
</div>
</body>
</html>
