<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");
    error_reporting(0);
	exit();

}

?>


<h1>RESERVA DE HABITACION</h1>

<form method="post">
<input type="text" placeholder="Id Cliente" name="IdClienteReserva" required>
	<input type="text" placeholder="Id Habitacion" name="IdHabitacionReserva" required>
    <input type="date" placeholder="FechaEntrada" name="FechaHabitacionReserva" required>
    <input type="text" placeholder="Dias Ocupados" name="DiasHabitacionReserva" required>
    <input type="text" placeholder="Precio" name="PrecioHabitacionReserva" required>

	<input type="submit" value="Enviar">

</form>

<?php// parametros para el registro arriba
$registro = new MvcController();// $registro tipo MvcController, instancia
$registro -> reservaHabitacionController();// usa la funcion de MvcController para guardar

if(isset($_GET["action"])){//si esta action en la url

	if($_GET["action"] == "okR"){//pone ok en action para usar otra funcion de la clase Pagina en enlaces.php y redireccionar

		echo "Reserva Exitosa";// mensaje
	
	}

}

?>