<h1>REGISTRO DE USUARIO</h1>

<form method="post">
	
	<input type="text" placeholder="Usuario" name="usuarioRegistro" required>

	<input type="password" placeholder="Contraseña" name="passwordRegistro" required>

	

	<input type="submit" value="Enviar">

</form>

<?php // parametros para el registro arriba
/*<input type="email" placeholder="Email" name="emailRegistro" required>*/
$registro = new MvcController();// $registro tipo MvcController, instancia
$registro -> registroUsuarioController();// usa la funcion de MvcController para guardar

if(isset($_GET["action"])){//si esta action en la url

	if($_GET["action"] == "ok"){//pone ok en action para usar otra funcion de la clase Pagina en enlaces.php y redireccionar

		echo "Registro Exitoso";// mensaje
	
	}

}

?>
