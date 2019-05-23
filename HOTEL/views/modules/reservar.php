<h1>RESERVA DE HABITACION</h1>

<form method="post">
<input type="text" placeholder="Id Cliente" name="IdClienteReserva" required>
	<input type="text" placeholder="Id Habitacion" name="IdHabitacionReserva" required>
    <input type="date" placeholder="FechaEntrada" name="FechaHabitacionReserva" required>
    <input type="text" placeholder="Dias Ocupados" name="DiasHabitacionReserva" required>
    <input type="text" placeholder="Precio" name="PrecioHabitacionReserva" required>

	<input type="submit" value="Enviar">

</form>

<?php
$registro = new MvcController();
$registro -> reservaHabitacionController();

if(isset($_GET["action"])){

	if($_GET["action"] == "okR"){

		echo "Reserva Exitosa";
	
	}

}

?>