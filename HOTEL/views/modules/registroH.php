<h1>REGISTRO DE HABITACIONES</h1>

<form method="post">
	
	<input type="text" placeholder="tipo" name="tipoHabitacionRegistro" required>

	<input type="text" placeholder="precio" name="precioHabitacionRegistro" required>

	

	<input type="submit" value="Enviar">

</form>

<?php
/*<input type="email" placeholder="Email" name="emailRegistro" required>*/
$registro = new MvcController();
$registro -> registroHabitacionController();

if(isset($_GET["action"])){

	if($_GET["action"] == "okHR"){

		echo "Registro Exitoso";
	
	}

}

?>
