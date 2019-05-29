<h1>REGISTRO DE MAESTROS</h1>

<form method="post">
    <input type="text" placeholder="Matricula" name="noempleadoRegistro" required>  
	<input type="text" placeholder="Nombre" name="nombreRegistro" required>
	<input type="text" placeholder="Apellido" name="apellidoRegistro" required>
	<input type="email" placeholder="Email" name="emailRegistro" required>
	<input type="text" placeholder="Carrera" name="carreraRegistro" required>
	<input type="submit" value="Enviar">

</form>
<?php

$registro= new MvcController();
$registro -> registroMaestroController();
/*if(isset($_GET["action"])){

	if($_GET["action"] == "ok"){

		echo "Registro Exitoso";
	
	}

}*/
?>

<h1>REGISTRO DE ALUMNOS</h1>

<form method="post">
    <input type="text" placeholder="Matricula" name="matriculaRegistro" required>  
	<input type="text" placeholder="Nombre" name="nombreRegistro" required>
	<input type="text" placeholder="Apellido" name="apellidoRegistro" required>
	<input type="email" placeholder="Email" name="emailRegistro" required>
	<input type="text" placeholder="Carrera" name="carreraRegistro" required>
	<input type="submit" value="Enviar">

</form>
<?php

//$registro= new MvcController();
$registro -> registroAlumnoController();

?>
<h1>MAESTROS</h1>

	<table border="1">
		
		<thead>
			
			<tr>
				<th>No. Empleado</th>
				<th>Nombres</th>
				<th>Apellidos</th>
				<th>e-mail</th>
				<th>carrera</th>
				<th></th>
				<th></th>

			</tr>

		</thead>

		<tbody>
			
			<?php

			$vistaUsuario = new MvcController();
			$vistaUsuario -> vistaMaestroController();
			$vistaUsuario -> borrarMaestroController();

			?>

		</tbody>

	</table>


	</br>
<h1>ALUMNO</h1>

<table border="1">
	
	<thead>
		
		<tr>
			<th>Matricula</th>
			<th>Nombres</th>
			<th>Apellidos</th>
			<th>e-mail</th>
			<th>carrera</th>
			<th></th>
			<th></th>

		</tr>

	</thead>

	<tbody>
		
		<?php

		$vistaUsuario = new MvcController();
		$vistaUsuario -> vistaAlumnoController();
		$vistaUsuario -> borrarAlumnoController();

		?>

	</tbody>

</table>

<?php
/*
if(isset($_GET["action"])){

	if($_GET["action"] == "cambio"){

		echo "Cambio Exitoso";
	
	}

}
*/
?>




