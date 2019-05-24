<?php
#SI HAY SESION SINO NO
session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");
    error_reporting(0);
	exit();

}

?>

<h1>USUARIOS</h1>
	
	<table border="1">
		
		<thead>
			
			<tr>
				<th>Usuario</th>
				<th>Contraseña</th>
				
				<th></th>
				<th></th>

			</tr>

		</thead>

		<tbody>
			
			<?php

			$vistaUsuario = new MvcController();
			$vistaUsuario -> vistaUsuariosController();
			$vistaUsuario -> borrarUsuarioController();
			
			?>
		</tbody>
		
	</table>
	</br>
<h1>CLIENTES</h1>
	<table border="1">
		
		<thead>
			
			<tr>
				<th>Cliente</th>
				<th>Tipo</th>
				<th>metodo de pago</th>
				<th></th>
				<th></th>

			</tr>

		</thead>

		<tbody>
			
			<?php

			$vistaCliente = new MvcController();
			$vistaCliente -> vistaClienteController();
			$vistaCliente -> borrarClienteController();

			?>

		</tbody>

	</table>
	</br>
<h1>HABITACIONES</h1>
	<table border="1">
		
		<thead>
			
			<tr>
				
				<th>Tipo</th>
				<th>precio</th>
				<th></th>
				<th></th>

			</tr>

		</thead>

		<tbody>
			
			<?php

			$vistaCliente = new MvcController();
			$vistaCliente -> vistaHabitacionController();
			$vistaCliente -> borrarHabitacionController();

			?>

		</tbody>

	</table>
<h1>RESERVACIONES</h1>
	<table border="1">
		
		<thead>
			
			<tr>
				
				<th>Id Cliente</th>
				<th>Id Habitacion</th>
				<th>Fecha de Entrada</th>
				<th>Dias Ocupados</th>
				<th>Costo</th>

				<th></th>
				<th></th>

			</tr>

		</thead>

		<tbody>
			
			<?php

			$vistaCliente = new MvcController();
			$vistaCliente -> vistaReservacionController();
			$vistaCliente -> borrarReservacionController();

			?>

		</tbody>

	</table>

<?php

if(isset($_GET["action"])){

	if($_GET["action"] == "cambio"){

		echo "Cambio Exitoso";
	
	}

}

?>




