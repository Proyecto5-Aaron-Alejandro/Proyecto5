<!DOCTYPE html>
<meta charset="utf-8">
<html>
<head>
	<title>MAMProyect</title>
	<link rel="stylesheet" type="text/css" href="./css/style.css">
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
	<div class="login_logo">
		<img  class=" login_image" src="img/logo.jpg">
	</div>
		
	<form name="login" action="alta.proc.php" method="POST" onsubmit="return validar();" >
		<div class="login">
			<p class="nickname">
				Introduce un nombre de usuario:<br/>
				<input type="text" class="name" name="name" id="name" maxlength="15" />
			</p>
			<p class="password">
				Introduce una contraseña: <br/>
				<input type="password" class="pass" name="pass" id="pass" />
			</p>
			<input class="send" id="send" type="submit" value="Acceder" />
		</div>
	</form>

</body>