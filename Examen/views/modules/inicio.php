<h1>REGISTRO DE ALUMNOS</h1>

	<form method="post">
		<input type="text" placeholder="Matricula" name="noempleadoRegistro" required>  
		<input type="text" placeholder="Nombre" name="nombreRegistro" required>
		<input type="text" placeholder="Apellido" name="apellidoRegistro" required>
		<input type="text" placeholder="Carrera" name="carreraRegistro" required>
		<input type="text" placeholder="anio_de_ingreso" name="anio_de_ingresoRegistro" required>
		<input type="text" placeholder="id_grupo" name="id_grupoRegistro" required>

		<input type="submit" value="Enviar">

	</form>
	<?php

	$registro= new MvcController();
	$registro -> registroAlumnoController();

	?>
	<h1>ALUMNOS</h1>

   <table border="1">
	
	<thead>
		
		<tr>
			<th>Matricula</th>
			<th>Nombres</th>
			<th>Apellidos</th>
			<th>Carrera</th>
			<th>Año de Ingreso</th>
			<th>Id Grupo</th>
			<th>Vale por un editar</th>
			<th>Borrar</th>

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





