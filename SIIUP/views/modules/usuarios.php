
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
  $registro= new MvcController();
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
  $registro= new MvcController();

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




