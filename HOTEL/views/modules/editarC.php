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

	$editarUsuario = new MvcController();//crea una instancia llamada $editarUsuario de tipo MvcController( esta tiene multiples funciones)
	$editarUsuario -> editarClienteController();//usa el metodo de controller que a su vez usa el metodo de model para mostrar el usuario a editar
	$editarUsuario -> actualizarClienteController();//cambia la informacion con la funcion de controller ,que a su vez usa la funcion en model con la sentecia para cambiar los datos

	?>

</form>



