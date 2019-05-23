<h1>REGISTRO DE CLIENTES</h1>

<form method="post">
	
	<input type="text" placeholder="Nuevo Cliente" name="nombreClienteRegistro" required>
    <input type="text" placeholder="tipo" name="tipoClienteRegistro" required>
	<input type="text" placeholder="metodo de pago" name="metodoClienteRegistro" required>

	

	<input type="submit" value="Enviar">

</form>

<?php
/*<input type="email" placeholder="Email" name="emailRegistro" required>*/
$registro = new MvcController();
$registro -> registroClienteController();

if(isset($_GET["action"])){

	if($_GET["action"] == "okC"){

		echo "Registro Exitoso";
	
	}

}

?>
