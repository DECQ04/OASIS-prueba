<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>

<h1>EDITAR HABITACION</h1>

<form method="post">
	
	<?php

	$editarUsuario = new MvcController();
	$editarUsuario -> editarHabitacionController();
	$editarUsuario -> actualizarHabitacionController();

	?>

</form>



