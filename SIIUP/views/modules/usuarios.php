<h1>REGISTRO DE MAESTROS</h1>
 <form method="post">
    <input type="text" placeholder="Matricula" name="noempleadoRegistro" required>  
	<input type="text" placeholder="Nombre" name="nombreRegistro" required>
	<input type="text" placeholder="Apellido" name="apellidoRegistro" required>
	<input type="email" placeholder="Email" name="emailRegistro" required>
	<input type="text" placeholder="id Carrera" name="id_carreraRegistro" required>
	<input type="submit" value="Enviar">

 </form>
 <?php
 $registro= new MvcController();
 $registro -> registroMaestroController();//Muestra el formulario para registrar y la funcion para traer los datos del formulario, los campos seran de acuerdo a los requeridos
?>
<h1>MAESTROS</h1>
	<table border="1">
		
		<thead>
			
			<tr>
			    <th>Id</th>
				<th>No. Empleado</th>
				<th>Nombres</th>
				<th>Apellidos</th>
				<th>e-mail</th>
				<th>id carrera</th>
				<th></th>
				<th></th>

			</tr>

		</thead>

		<tbody>
			
		<?php

			$vistaUsuario = new MvcController();
			$vistaUsuario -> vistaMaestroController();//trae los datos registrados en la tabla con el  nombre parecidod al metodo
			$vistaUsuario -> borrarMaestroController();//borra el registro de la tabla con respecto al id del registro

		?>

		</tbody>

	</table>


</br></br></br>

<h1>REGISTRO DE ALUMNOS</h1>
 <form method="post">
    <input type="text" placeholder="Matricula" name="matriculaRegistro" required>  
	<input type="text" placeholder="Nombre" name="nombreRegistro" required>
	<input type="text" placeholder="Apellido" name="apellidoRegistro" required>
	<input type="email" placeholder="Email" name="emailRegistro" required>
	<input type="text" placeholder="id Carrera" name="id_carreraRegistro" required>
	<input type="text" placeholder="id Grupo" name="id_grupoRegistro" required>

	<input type="submit" value="Enviar">

 </form>
 <?php
 $registro -> registroAlumnoController();//Muestra el formulario para registrar y la funcion para traer los datos del formulario, los campos seran de acuerdo a los requeridos
?>
<h1>ALUMNOS</h1>
 <table border="1">
	
	<thead>
		
		<tr>
			<th>Matricula</th>
			<th>Nombres</th>
			<th>Apellidos</th>
			<th>e-mail</th>
			<th>id carrera</th>
			<th>id grupo</th>
			<th></th>
			<th></th>

		</tr>

	</thead>

	<tbody>
		
		<?php

		$vistaUsuario = new MvcController();
		$vistaUsuario -> vistaAlumnoController();//trae los datos registrados en la tabla con el  nombre parecidod al metodo
		$vistaUsuario -> borrarAlumnoController();//borra el registro de la tabla con respecto al id del registro

		?>

	</tbody>

 </table>
</br></br></br>

<h1>REGISTRO DE CARRERAS</h1>
 <form method="post">
	<input type="text" placeholder="Nombre" name="nombreRegistro" required>

	<input type="submit" value="Enviar">

 </form>
 <?php
 $registro -> registroCarreraController();//Muestra el formulario para registrar y la funcion para traer los datos del formulario, los campos seran de acuerdo a los requeridos
?>
<h1>CARRERAS</h1>
 <table border="1">
	
	<thead>
		
		<tr>
			<th>Id</th>
			<th>Nombre</th>
			<th></th>
			<th></th>

		</tr>

	</thead>

	<tbody>
		<?php
		$vistaCarrera = new MvcController();
		$vistaCarrera -> vistaCarreraController();//trae los datos registrados en la tabla con el  nombre parecidod al metodo
		$vistaCarrera -> borrarCarreraController();//borra el registro de la tabla con respecto al id del registro
		?>
	</tbody>

	</table>
</br></br></br>

<h1>REGISTRO DE MATERIAS</h1>
 <form method="post">
    <input type="text" placeholder="Id Maestro" name="id_maestroRegistro" required>  
	<input type="text" placeholder="Nombre" name="nombreRegistro" required>
	<input type="int" placeholder="Horas" name="horasRegistro" required>
	<input type="text" placeholder="Créditos" name="creditosRegistro" required>
	<input type="text" placeholder="Id Grupo" name="id_grupoRegistro" required>  

	<input type="submit" value="Enviar">

 </form>
 <?php
 $registro -> registroMateriaController();//Muestra el formulario para registrar y la funcion para traer los datos del formulario, los campos seran de acuerdo a los requeridos
?>
<h1>MATERIAS</h1>
 <table border="1">
	
	<thead>
		
		<tr>
			<th>Id</th>
			<th>Id Maestro</th>
			<th>Nombres</th>
			<th>Horas</th>
			<th>Creditos</th>
			<th>Id Grupo</th>
			<th></th>
			<th></th>

		</tr>

	</thead>

	<tbody>
		
		<?php

		$vistaMateria= new MvcController();
		$vistaMateria -> vistaMateriaController();//trae los datos registrados en la tabla con el  nombre parecidod al metodo
		$vistaMateria -> borrarMateriaController();//borra el registro de la tabla con respecto al id del registro

		?>

	</tbody>

 </table>
</br></br></br>

<h1>REGISTRO DE GRUPOS</h1>
 <form method="post">
	<input type="text" placeholder="Cuatrimestre" name="cuatrimestreRegistro" required>

	<input type="submit" value="Enviar">

 </form>
 <?php
 $registro -> registroGrupoController();//Muestra el formulario para registrar y la funcion para traer los datos del formulario, los campos seran de acuerdo a los requeridos
?>
<h1>GRUPOS</h1>
 <table border="1">
	
	<thead>
		
		<tr>
			<th>Id</th>
			<th>Cuatrimestre</th>
			<th></th>
			<th></th>

		</tr>

	</thead>

	<tbody>
		<?php
		$vistaCarrera = new MvcController();
		$vistaCarrera -> vistaGrupoController();//trae los datos registrados en la tabla con el  nombre parecidod al metodo
		$vistaCarrera -> borrarGrupoController();//borra el registro de la tabla con respecto al id del registro
		?>
	</tbody>

	</table>
</br>




