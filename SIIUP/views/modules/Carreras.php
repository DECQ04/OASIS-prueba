
<h1>REGISTRO DE CARRERAS</h1>
 <form method="post">
	<input type="text" placeholder="Nombre" name="nombreRegistro" required>

	<input type="submit" class="btn btn-secondary" value="Enviar">

 </form>
 <?php
  $registro= new MvcController();
 $registro -> registroCarreraController();//Muestra el formulario para registrar y la funcion para traer los datos del formulario, los campos seran de acuerdo a los requeridos
?>
<h1>CARRERAS</h1>
<table id="example" class="table table-dark" style="width:100%">
	
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
