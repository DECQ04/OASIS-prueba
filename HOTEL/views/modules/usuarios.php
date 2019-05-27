<?php
#SI HAY SESION SINO NO
session_start();

if(!$_SESSION["validar"]){//si no es verdad no ingresa porque no hay sesion

	header("location:index.php?action=ingresar"); //redirecciona a validar
    error_reporting(0);
	exit();

}



//  muestra tablas para editar y borrar registros, muestra los atributos correspondientes 
# en la primer fila mas dos columnas en blanco, debajo iran los botones para borrar y editar
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

			$vistaCliente = new MvcController();//instancia
			$vistaCliente -> vistaClienteController();//muestra datos 
			$vistaCliente -> borrarClienteController();// funcion para borrar

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

			$vistaCliente = new MvcController();//instancia
			$vistaCliente -> vistaHabitacionController();//muestra datos 
			$vistaCliente -> borrarHabitacionController();// funcion para borrar

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

			$vistaCliente = new MvcController();//instancia
			$vistaCliente -> vistaReservacionController();//muestra datos 
			$vistaCliente -> borrarReservacionController();// funcion para borrar
			error_reporting(0);
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




