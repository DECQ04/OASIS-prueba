<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>

<h1>EDITAR CLIENTE</h1>

<form method="post">
	
	<?php

	$editarUsuario = new MvcController();
	$editarUsuario -> editarClienteController();
	$editarUsuario -> actualizarClienteController();

	?>

</form>



