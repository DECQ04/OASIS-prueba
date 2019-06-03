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
	#------------------------------------Trae los campos por metodo POST y los coloca en un araay invoca a la funcion para mandarlos a la BD, devuelve succes si fue posible
	public function registroMaestroController(){

		if(isset($_POST["noempleadoRegistro"])){

			$datosController = array( "noempleado"=>$_POST["noempleadoRegistro"], 
									  "nombre"=>$_POST["nombreRegistro"],
									  "apellido"=>$_POST["apellidoRegistro"],
									  "email"=>$_POST["emailRegistro"],
									  "id_carrera"=>$_POST["id_carreraRegistro"]);

			$respuesta = Datos::registroMaestroModel($datosController, "maestros");

			if($respuesta == "success"){
				//header("location:index.php?action=cambio");
				//echo "Registro Exitoso";

			}

			else{
				//echo "error";
			}

		}

	}
	#REGISTRO DE ALUMNO
	#------------------------------------variacion del primer metodo REGISTRO
	public function registroAlumnoController(){

		if(isset($_POST["matriculaRegistro"])){

			$datosController = array( "matricula"=>$_POST["matriculaRegistro"], 
									  "nombre"=>$_POST["nombreRegistro"],
									  "apellido"=>$_POST["apellidoRegistro"],
									  "email"=>$_POST["emailRegistro"],
									  "id_carrera"=>$_POST["id_carreraRegistro"],
									  "id_grupo"=>$_POST["id_grupoRegistro"]);

			$respuesta = Datos::registroAlumnoModel($datosController, "alumnos");

			if($respuesta == "success"){

				//header("location:index.php?action=cambio");
				//echo "Registro Exitoso";

			}

			else{

				//echo "error";
			}

		}

	}
	#REGISTRO DE CARRERA
	#------------------------------------variacion del primer metodo REGISTRO
	public function registroCarreraController(){

		if(isset($_POST["nombreRegistro"])){

			$datosController = array( 
									  "nombre"=>$_POST["nombreRegistro"]
									  );

			$respuesta = Datos::registroCarreraModel($datosController, "carrera");

			if($respuesta == "success"){
				//header("location:index.php?action=cambio");
				//echo "Registro Exitoso";

			}

			else{
				//echo "error";
			}

		}

	}
	#REGISTRO DE MATERIA
	#------------------------------------variacion del primer metodo REGISTRO
	public function registroMateriaController(){

		if(isset($_POST["nombreRegistro"])){

			$datosController = array( "id_maestro"=>$_POST["id_maestroRegistro"],
									  "nombre"=>$_POST["nombreRegistro"],
									  "horas"=>$_POST["horasRegistro"],
									  "creditos"=>$_POST["creditosRegistro"],
									  "id_grupo"=>$_POST["id_grupoRegistro"]
									
									  );

			$respuesta = Datos::registroMateriaModel($datosController, "materias");

			if($respuesta == "success"){
				//header("location:index.php?action=cambio");
				//echo "Registro Exitoso";

			}

			else{
				//echo "error";
			}

		}

	}
	#REGISTRO DE GRUPO
	#------------------------------------variacion del primer metodo REGISTRO
	public function registroGrupoController(){

		if(isset($_POST["cuatrimestreRegistro"])){

			$datosController = array(
									  "cuatrimestre"=>$_POST["cuatrimestreRegistro"]
									  );

			$respuesta = Datos::registroGrupoModel($datosController, "grupo");

			if($respuesta == "success"){
				//header("location:index.php?action=cambio");
				//echo "Registro Exitoso";

			}

			else{
				//echo "error";
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
	#------------------------------------Invoca la funcion necesaria de la tabla para mostrarla con un echo en un foreach, registro por registro, añade dos botones que anteriormente se agregaron como columnas vacias en usuarios
	public function vistaMaestroController(){

		$respuesta = Datos::vistaMaestroModel("maestros");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){
		echo'<tr>
		        <td>'.$item["id"].'</td>
				<td>'.$item["noempleado"].'</td>
				<td>'.$item["nombre"].'</td>
				<td>'.$item["apellido"].'</td>
				<td>'.$item["email"].'</td>
				<td>'.$item["id_carrera"].'</td>
				<td><a href="index.php?action=editar&id='.$item["id"].'"><button>Editar</button></a></td>
				<td><a href="index.php?action=usuarios&idBorrar='.$item["id"].'"><button>Borrar</button></a></td>
			</tr>';

		}

	}
	#VISTA DE ALUMNOS
	#------------------------------------variacion del primer metodo VISTA
	public function vistaAlumnoController(){

		$respuesta = Datos::vistaAlumnoModel("alumnos");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["matricula"].'</td>
				<td>'.$item["nombre"].'</td>
				<td>'.$item["apellido"].'</td>
				<td>'.$item["email"].'</td>
				<td>'.$item["id_carrera"].'</td>
				<td>'.$item["id_grupo"].'</td>
				<td><a href="index.php?action=editarA&id='.$item["id"].'"><button>Editar</button></a></td>
				<td><a href="index.php?action=usuarios&idBorrar='.$item["id"].'"><button>Borrar</button></a></td>
			</tr>';

		}

	}
	#VISTA DE CARRERA
	#------------------------------------variacion del primer metodo VISTA
	public function vistaCarreraController(){

		$respuesta = Datos::vistaCarreraModel("carrera");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["id"].'</td>
				<td>'.$item["nombre"].'</td>
				<td><a href="index.php?action=editarC&id='.$item["id"].'"><button>Editar</button></a></td>
				<td><a href="index.php?action=usuarios&idBorrar='.$item["id"].'"><button>Borrar</button></a></td>
			</tr>';

		}

	}
	#VISTA DE MATERIA
	#------------------------------------variacion del primer metodo VISTA
	public function vistaMateriaController(){

		$respuesta = Datos::vistaMateriaModel("materias");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){
		echo'<tr>
		        <td>'.$item["id"].'</td>
				<td>'.$item["id_maestro"].'</td>
				<td>'.$item["nombre"].'</td>
				<td>'.$item["horas"].'</td>
				<td>'.$item["creditos"].'</td>
				<td>'.$item["id_grupo"].'</td>

				<td><a href="index.php?action=editarMA&id='.$item["id"].'"><button>Editar</button></a></td>
				<td><a href="index.php?action=usuarios&idBorrar='.$item["id"].'"><button>Borrar</button></a></td>
			</tr>';

		}

	}
	#VISTA DE GRUPO
	#------------------------------------variacion del primer metodo VISTA
	public function vistaGrupoController(){

		$respuesta = Datos::vistaGrupoModel("grupo");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["id"].'</td>
				<td>'.$item["cuatrimestre"].'</td>
				<td><a href="index.php?action=editarG&id='.$item["id"].'"><button>Editar</button></a></td>
				<td><a href="index.php?action=usuarios&idBorrar='.$item["id"].'"><button>Borrar</button></a></td>
			</tr>';

		}

	}





	#EDITAR MAESTRO
	#------------------------------------Obtiene el id, usa la funcion "editarMaestrosModel" para recojer la respuesta y hacer un formulario con las propiedades, añade actualizar para confirmar

	public function editarMaestroController(){

		$datosController = $_GET["id"];
		$respuesta = Datos::editarMaestroModel($datosController, "maestros");

		echo'<input type="hidden" value="'.$respuesta["id"].'" name="idEditar">

			 <input type="text" value="'.$respuesta["noempleado"].'" name="noempleadoEditar" required>
			 <input type="text" value="'.$respuesta["nombre"].'" name="nombreEditar" required>
			 <input type="text" value="'.$respuesta["apellido"].'" name="apellidoEditar" required>
			 <input type="email" value="'.$respuesta["email"].'" name="emailEditar" required>
			 <input type="text" value="'.$respuesta["id_carrera"].'" name="id_carreraEditar" required>

			 <input type="submit" value="Actualizar">';

	}
	#EDITAR ALUMNO
	#------------------------------------variacion del primer metodo EDITAR
	public function editarAlumnoController(){

		$datosController = $_GET["id"];
		$respuesta = Datos::editarAlumnoModel($datosController, "alumnos");

		echo'<input type="hidden" value="'.$respuesta["id"].'" name="idEditar">

			 <input type="text" value="'.$respuesta["matricula"].'" name="matriculaEditar" required>
			 <input type="text" value="'.$respuesta["nombre"].'" name="nombreEditar" required>
			 <input type="text" value="'.$respuesta["apellido"].'" name="apellidoEditar" required>
			 <input type="email" value="'.$respuesta["email"].'" name="emailEditar" required>
			 <input type="text" value="'.$respuesta["id_carrera"].'" name="id_carreraEditar" required>
			 <input type="text" value="'.$respuesta["id_grupo"].'" name="id_grupoEditar" required>


			 <input type="submit" value="Actualizar">';

	}
	#EDITAR CARRERA
	#------------------------------------variacion del primer metodo EDITAR
	public function editarCarreraController(){

		$datosController = $_GET["id"];
		$respuesta = Datos::editarCarreraModel($datosController, "carrera");

		echo'<input type="hidden" value="'.$respuesta["id"].'" name="idEditar">

			 <input type="text" value="'.$respuesta["nombre"].'" name="nombreEditar" required>


			 <input type="submit" value="Actualizar">';

	}
	#EDITAR MATERIA
	#------------------------------------variacion del primer metodo EDITAR
	public function editarMateriaController(){

		$datosController = $_GET["id"];
		$respuesta = Datos::editarMateriaModel($datosController, "materias");

		echo'<input type="hidden" value="'.$respuesta["id"].'" name="idEditar">

			 <input type="text" value="'.$respuesta["id_maestro"].'" name="id_maestroEditar" required>
			 <input type="text" value="'.$respuesta["nombre"].'" name="nombreEditar" required>
			 <input type="text" value="'.$respuesta["horas"].'" name="horasEditar" required>
			 <input type="text" value="'.$respuesta["creditos"].'" name="creditosEditar" required>


			 <input type="submit" value="Actualizar">';

	}
	#EDITAR GRUPO
	#------------------------------------variacion del primer metodo EDITAR
	public function editarGrupoController(){

		$datosController = $_GET["id"];
		$respuesta = Datos::editarGrupoModel($datosController, "grupo");

		echo'<input type="hidden" value="'.$respuesta["id"].'" name="idEditar">

			 <input type="text" value="'.$respuesta["cuatrimestre"].'" name="cuatrimestreEditar" required>


			 <input type="submit" value="Actualizar">';

	}




	#ACTUALIZAR MAESTRO
	#------------------------------------Con los campos de editar, los pone en un array y usa la funcion "actualizarMaestroModel" para actualizar en la tabla los valores
	public function actualizarMaestroController(){ 

		if(isset($_POST["nombreEditar"])){

			$datosController = array( "id"=>$_POST["idEditar"],
							          "noempleado"=>$_POST["noempleadoEditar"],
									  "nombre"=>$_POST["nombreEditar"],
									  "apellido"=>$_POST["apellidoEditar"],
									  "email"=>$_POST["emailEditar"],
									  "id_carrera"=>$_POST["id_carreraEditar"]);
			
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
	#------------------------------------variacion del primer metodo ACTUALIZAR
	public function actualizarAlumnoController(){

		if(isset($_POST["nombreEditar"])){

			$datosController = array( "id"=>$_POST["idEditar"],
							          "matricula"=>$_POST["matriculaEditar"],
									  "nombre"=>$_POST["nombreEditar"],
									  "apellido"=>$_POST["apellidoEditar"],
									  "email"=>$_POST["emailEditar"],
									  "id_carrera"=>$_POST["id_carreraEditar"],
									  "id_grupo"=>$_POST["id_grupoEditar"]);
			
			$respuesta = Datos::actualizarAlumnoModel($datosController, "alumnos");

			if($respuesta == "success"){

				header("location:index.php?action=cambio");

			}

			else{

				echo "error";

			}

		}
	
	}
	#ACTUALIZAR CARRERA
	#------------------------------------variacion del primer metodo ACTUALIZAR
	public function actualizarCarreraController(){

		if(isset($_POST["nombreEditar"])){

			$datosController = array( "id"=>$_POST["idEditar"],
									  "nombre"=>$_POST["nombreEditar"]);
			
			$respuesta = Datos::actualizarCarreraModel($datosController, "carrera");

			if($respuesta == "success"){

				header("location:index.php?action=cambio");

			}

			else{

				echo "error";

			}

		}
	
	}
	#ACTUALIZAR MATERIA
	#------------------------------------variacion del primer metodo ACTUALIZAR
	public function actualizarMateriaController(){

		if(isset($_POST["nombreEditar"])){

			$datosController = array( "id"=>$_POST["idEditar"],
							          "id_maestro"=>$_POST["id_maestroEditar"],
									  "nombre"=>$_POST["nombreEditar"],
									  "horas"=>$_POST["horasEditar"],
									  "creditos"=>$_POST["creditosEditar"]
									 );
			
			$respuesta = Datos::actualizarMateriaModel($datosController, "materias");

			if($respuesta == "success"){

				header("location:index.php?action=cambio");

			}

			else{

				echo "error";

			}

		}
	
	}
	#ACTUALIZAR GRUPO
	#------------------------------------variacion del primer metodo ACTUALIZAR
	public function actualizarGrupoController(){

		if(isset($_POST["cuatrimestreEditar"])){

			$datosController = array( "id"=>$_POST["idEditar"],
									  "cuatrimestre"=>$_POST["cuatrimestreEditar"]);
			
			$respuesta = Datos::actualizarGrupoModel($datosController, "grupo");

			if($respuesta == "success"){

				header("location:index.php?action=cambio");

			}

			else{

				echo "error";

			}

		}
	
	}



	#BORRAR MAESTROS
	#------------------------------------Obtiene el Id lo pasa a la variable $datosController y usa el metodo de model para borrar el registro con ese id
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
	#------------------------------------variacion del primer metodo BORRAR
	public function borrarAlumnoController(){

		if(isset($_GET["idBorrar"])){

			$datosController = $_GET["idBorrar"];
			
			$respuesta = Datos::borrarAlumnoModel($datosController, "alumnos");

			if($respuesta == "success"){

				header("location:index.php?action=usuarios");
			
			}

		}

	}
	#BORRAR CARRERAS
	#------------------------------------variacion del primer metodo BORRAR
	public function borrarCarreraController(){

		if(isset($_GET["idBorrar"])){

			$datosController = $_GET["idBorrar"];
			
			$respuesta = Datos::borrarAlumnoModel($datosController, "carrera");

			if($respuesta == "success"){

				header("location:index.php?action=usuarios");
			
			}

		}

	}
	#BORRAR MATERIAS
	#------------------------------------variacion del primer metodo BORRAR
	public function borrarMateriaController(){

		if(isset($_GET["idBorrar"])){

			$datosController = $_GET["idBorrar"];
			
			$respuesta = Datos::borrarAlumnoModel($datosController, "materias");

			if($respuesta == "success"){

				header("location:index.php?action=usuarios");
			
			}

		}

	}
	#BORRAR GRUPOS
	#------------------------------------variacion del primer metodo BORRAR
	public function borrarGrupoController(){

		if(isset($_GET["idBorrar"])){

			$datosController = $_GET["idBorrar"];
			
			$respuesta = Datos::borrarGrupoModel($datosController, "grupo");

			if($respuesta == "success"){

				header("location:index.php?action=usuarios");
			
			}

		}

	}
}

?>