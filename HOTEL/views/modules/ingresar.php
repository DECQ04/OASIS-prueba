<h1>INGRESAR</h1>

	<form method="post">
		
		<input type="text" placeholder="Usuario" name="usuarioIngreso" required>

		<input type="password" placeholder="Contraseña" name="passwordIngreso" required>

		<input type="submit" value="Enviar">

	</form>

<?php

$ingreso = new MvcController();//crea una instancia llamada $ingreso de tipo MvcController( esta tiene multiples funciones)
$ingreso -> ingresoUsuarioController();// usa el metodo de controller para iniciar la sesion con el usuario

if(isset($_GET["action"])){// verifica "action" en la url

	if($_GET["action"] == "fallo"){

		echo "Fallo al ingresar";//muestra mensaje "Fallo al ingresar" solo si falla al iniciar sesion
	
	}

}

?>