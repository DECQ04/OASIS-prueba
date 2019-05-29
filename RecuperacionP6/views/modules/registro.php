<h1>REGISTRO DE MAESTRO</h1>

<form method="post">
    <input type="text" placeholder="Matricula" name="matriculaRegistro" required>  
	<input type="text" placeholder="Nombre" name="nombreRegistro" required>
	<input type="text" placeholder="Apellido" name="apellidoRegistro" required>
	<input type="email" placeholder="Email" name="emailRegistro" required>
	<input type="text" placeholder="Carrera" name="carreraRegistro" required>
	<input type="submit" value="Enviar">

</form>

<?php

$registro = new MvcController();
$registro -> registroMaestroController();
//$registro -> registroAlumnoController();
if(isset($_GET["action"])){

	if($_GET["action"] == "ok"){

		echo "Registro Exitoso";
	
	}

}

?>
