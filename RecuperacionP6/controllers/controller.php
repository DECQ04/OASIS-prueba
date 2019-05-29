<?php

class MvcController{

	#LLAMADA A LA PLANTILLA
	#-------------------------------------

	public function pagina(){	
		
		include "views/template.php";
	
	}

	#ENLACES
	#-------------------------------------

	public function enlacesPaginasController(){

		if(isset( $_GET['action'])){
			
			$enlaces = $_GET['action'];
		
		}

		else{

			$enlaces = "index";
		}

		$respuesta = Paginas::enlacesPaginasModel($enlaces);

		include $respuesta;

	}




	#REGISTRO DE MAESTRO
	#------------------------------------
	public function registroMaestroController(){

		if(isset($_POST["nombreRegistro"])){

			$datosController = array( "noempleado"=>$_POST["noempleadoRegistro"], 
									  "nombre"=>$_POST["nombreRegistro"],
									  "apellido"=>$_POST["apellidoRegistro"],
									  "email"=>$_POST["emailRegistro"],
									  "carrera"=>$_POST["carreraRegistro"]);

			$respuesta = Datos::registroMaestroModel($datosController, "maestros");

			if($respuesta == "success"){

				//header("location:index.php?action=ok");
				echo "Registro Exitoso";

			}

			else{

				header("location:index.php");
			}

		}

	}
	#REGISTRO DE ALUMNO
	#------------------------------------
	public function registroAlumnoController(){

		if(isset($_POST["nombreRegistro"])){

			$datosController = array( "matricula"=>$_POST["matriculaRegistro"], 
									  "nombre"=>$_POST["nombreRegistro"],
									  "apellido"=>$_POST["apellidoRegistro"],
									  "email"=>$_POST["emailRegistro"],
									  "carrera"=>$_POST["carreraRegistro"]);

			$respuesta = Datos::registroAlumnoModel($datosController, "alumnos");

			if($respuesta == "success"){

				//header("location:index.php?action=ok");
				echo "Registro Exitoso";

			}

			else{

				header("location:index.php");
			}

		}

	}

	#INGRESO DE USUARIOS
	#-------------------------XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX---------------------------------------------
	public function ingresoUsuarioController(){

		if(isset($_POST["usuarioIngreso"])){

			$datosController = array( "usuario"=>$_POST["usuarioIngreso"], 
								      "password"=>$_POST["passwordIngreso"]);

			$respuesta = Datos::ingresoUsuarioModel($datosController, "usuarios");

			if($respuesta["usuario"] == $_POST["usuarioIngreso"] && $respuesta["password"] == $_POST["passwordIngreso"]){

				session_start();

				$_SESSION["validar"] = true;

				header("location:index.php?action=usuarios");

			}

			else{

				header("location:index.php?action=fallo");

			}

		}	

	}


	#VISTA DE MAESTROS
	#------------------------------------

	public function vistaMaestroController(){

		$respuesta = Datos::vistaMaestroModel("maestros");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["noempleado"].'</td>
				<td>'.$item["nombre"].'</td>
				<td>'.$item["apellido"].'</td>
				<td>'.$item["email"].'</td>
				<td>'.$item["carrera"].'</td>
				<td><a href="index.php?action=editar&id='.$item["id"].'"><button>Editar</button></a></td>
				<td><a href="index.php?action=usuarios&idBorrar='.$item["id"].'"><button>Borrar</button></a></td>
			</tr>';

		}

	}
	#VISTA DE ALUMNOS
	#------------------------------------

	public function vistaAlumnoController(){

		$respuesta = Datos::vistaAlumnoModel("alumnos");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["matricula"].'</td>
				<td>'.$item["nombre"].'</td>
				<td>'.$item["apellido"].'</td>
				<td>'.$item["email"].'</td>
				<td>'.$item["carrera"].'</td>
				<td><a href="index.php?action=editarA&id='.$item["id"].'"><button>Editar</button></a></td>
				<td><a href="index.php?action=usuarios&idBorrar='.$item["id"].'"><button>Borrar</button></a></td>
			</tr>';

		}

	}



	#EDITAR MAESTRO
	#------------------------------------

	public function editarMaestroController(){

		$datosController = $_GET["id"];
		$respuesta = Datos::editarMaestroModel($datosController, "maestros");

		echo'<input type="hidden" value="'.$respuesta["id"].'" name="idEditar">

			 <input type="text" value="'.$respuesta["noempleado"].'" name="noempleadoEditar" required>
			 <input type="text" value="'.$respuesta["nombre"].'" name="nombreEditar" required>
			 <input type="text" value="'.$respuesta["apellido"].'" name="apellidoEditar" required>
			 <input type="email" value="'.$respuesta["email"].'" name="emailEditar" required>
			 <input type="text" value="'.$respuesta["carrera"].'" name="carreraEditar" required>

			 <input type="submit" value="Actualizar">';

	}
	#EDITAR ALUMNO
	#------------------------------------
	public function editarAlumnoController(){

		$datosController = $_GET["id"];
		$respuesta = Datos::editarAlumnoModel($datosController, "alumnos");

		echo'<input type="hidden" value="'.$respuesta["id"].'" name="idEditar">

			 <input type="text" value="'.$respuesta["matricula"].'" name="matriculaEditar" required>
			 <input type="text" value="'.$respuesta["nombre"].'" name="nombreEditar" required>
			 <input type="text" value="'.$respuesta["apellido"].'" name="apellidoEditar" required>
			 <input type="email" value="'.$respuesta["email"].'" name="emailEditar" required>
			 <input type="text" value="'.$respuesta["carrera"].'" name="carreraEditar" required>

			 <input type="submit" value="Actualizar">';

	}


	#ACTUALIZAR MAESTRO
	#------------------------------------
	public function actualizarMaestroController(){

		if(isset($_POST["nombreEditar"])){

			$datosController = array( "id"=>$_POST["idEditar"],
							          "noempleado"=>$_POST["noempleadoEditar"],
									  "nombre"=>$_POST["nombreEditar"],
									  "apellido"=>$_POST["apellidoEditar"],
									  "email"=>$_POST["emailEditar"],
									  "carrera"=>$_POST["carreraEditar"]);
			
			$respuesta = Datos::actualizarMaestroModel($datosController, "maestros");

			if($respuesta == "success"){

				header("location:index.php?action=cambio");

			}

			else{

				echo "error";

			}

		}
	
	}

	#ACTUALIZAR ALUMNO
	#------------------------------------
	public function actualizarAlumnoController(){

		if(isset($_POST["nombreEditar"])){

			$datosController = array( "id"=>$_POST["idEditar"],
							          "matricula"=>$_POST["matriculaEditar"],
									  "nombre"=>$_POST["nombreEditar"],
									  "apellido"=>$_POST["apellidoEditar"],
									  "email"=>$_POST["emailEditar"],
									  "carrera"=>$_POST["carreraEditar"]);
			
			$respuesta = Datos::actualizarAlumnoModel($datosController, "alumnos");

			if($respuesta == "success"){

				header("location:index.php?action=cambio");

			}

			else{

				echo "error";

			}

		}
	
	}



	#BORRAR MAESTROS
	#------------------------------------
	public function borrarMaestroController(){

		if(isset($_GET["idBorrar"])){

			$datosController = $_GET["idBorrar"];
			
			$respuesta = Datos::borrarMaestroModel($datosController, "maestros");

			if($respuesta == "success"){

				header("location:index.php?action=usuarios");
			
			}

		}

	}
	#BORRAR ALUMNOS
	#------------------------------------
	public function borrarAlumnoController(){

		if(isset($_GET["idBorrar"])){

			$datosController = $_GET["idBorrar"];
			
			$respuesta = Datos::borrarAlumnoModel($datosController, "alumnos");

			if($respuesta == "success"){

				header("location:index.php?action=usuarios");
			
			}

		}

	}

}

?>