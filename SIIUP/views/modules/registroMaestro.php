<h1>REGISTRO DE MAESTROS</h1>
 <form method="post">
    <input type="text" placeholder="Matricula" name="noempleadoRegistro" required>  
	<input type="text" placeholder="Nombre" name="nombreRegistro" required>
	<input type="text" placeholder="Apellido" name="apellidoRegistro" required>
	<input type="email" placeholder="Email" name="emailRegistro" required>
	<input type="text" placeholder="id Carrera" name="id_carreraRegistro" required>
	<input type="submit" class="btn btn-secondary" value="Enviar">

 </form>
 <?php
 $registro= new MvcController();
 $registro -> registroMaestroController();//Muestra el formulario para registrar y la funcion para traer los datos del formulario, los campos seran de acuerdo a los requeridos
?>
<h1>MAESTROS</h1>
<table id="example" class="table table-dark" style="width:100%">
		
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
