<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");
    error_reporting(0);
	exit();

}

?>

<h1>REGISTRO DE HABITACIONES</h1>

<form method="post">
	
	<input type="text" placeholder="tipo" name="tipoHabitacionRegistro" required>

	<input type="text" placeholder="precio" name="precioHabitacionRegistro" required>

	

	<input type="submit" value="Enviar">

</form>

<?php
// parametros para el registro arriba
$registro = new MvcController();// $registro tipo MvcController, instancia
$registro -> registroHabitacionController();// usa la funcion de MvcController para guardar

if(isset($_GET["action"])){//si esta action en la url

	if($_GET["action"] == "okHR"){//pone ok en action para usar otra funcion de la clase Pagina en enlaces.php y redireccionar

		echo "Registro Exitoso";// mensaje
	
	}

}

?>
