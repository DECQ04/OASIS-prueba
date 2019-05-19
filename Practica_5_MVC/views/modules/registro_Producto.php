<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>



<h1>REGISTRO DE PRODUCTOS</h1>

<form method="post">
	
	<input type="text" placeholder="nombre" name="nombreRegistro" required>

	<input type="text" placeholder="precio" name="pecioRegistro" required>


	<input type="submit" value="Enviar">

</form>

<?php

$regist = new MvcController();
$regist-> registroProductoController();

if(isset($_GET["action"])){

	if($_GET["action"] == "okp"){

		echo "Registro Exitoso";
	
	}

}

?>
