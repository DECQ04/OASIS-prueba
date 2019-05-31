<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");
    error_reporting(0);
	exit();

}

?>
<h1>REGISTRO DE CLIENTES</h1>

<form method="post">
	
	<input type="text" placeholder="Nuevo Cliente" name="nombreClienteRegistro" required>
    <input type="text" placeholder="tipo" name="tipoClienteRegistro" required>
	<input type="text" placeholder="metodo de pago" name="metodoClienteRegistro" required>

	

	<input type="submit" value="Enviar">

</form>

<?php// parametros para el registro arriba
//<input type="email" placeholder="Email" name="emailRegistro" required>
$registro = new MvcController();// $registro tipo MvcController, instancia
$registro -> registroClienteController();// usa la funcion de MvcController para guardar

if(isset($_GET["action"])){//si esta action en la url

	if($_GET["action"] == "okC"){//pone ok en action para usar otra funcion de la clase Pagina en enlaces.php y redireccionar

		echo "Registro Exitoso";// mensaje
	
	}

}

?>
