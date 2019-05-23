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

	#REGISTRO DE USUARIOS
	#------------------------------------
	public function registroUsuarioController(){

		if(isset($_POST["usuarioRegistro"])){

			$datosController = array( "usuario"=>$_POST["usuarioRegistro"], 
								      "password"=>$_POST["passwordRegistro"]);
								      //"email"=>$_POST["emailRegistro"]);

			$respuesta = Datos::registroUsuarioModel($datosController, "administradores");

			if($respuesta == "success"){

				header("location:index.php?action=ok");

			}

			else{

				header("location:index.php");
			}

		}

	}
		#REGISTRO DE CLIENTES
	#------------------------------------
	public function registroClienteController(){

		if(isset($_POST["nombreClienteRegistro"])){

			$datosController = array( "nombre"=>$_POST["nombreClienteRegistro"], 
			                          "tipo"=>$_POST["tipoClienteRegistro"], 
								      "metodo_pago"=>$_POST["metodoClienteRegistro"]);
								      //"email"=>$_POST["emailRegistro"]);

			$respuesta = Datos::registroClienteModel($datosController, "clientes");

			if($respuesta == "success"){

				header("location:index.php?action=okCR");

			}

			else{

				header("location:index.php");
			}

		}

	}
		#REGISTRO DE HABITACION
	#------------------------------------
	public function registroHabitacionController(){

		if(isset($_POST["tipoHabitacionRegistro"])){

			$datosController = array( "tipo"=>$_POST["tipoHabitacionRegistro"], 
								      "precio"=>$_POST["precioHabitacionRegistro"]);
								      //"email"=>$_POST["emailRegistro"]);

			$respuesta = Datos::registroHabitacionModel($datosController, "habitaciones");

			if($respuesta == "success"){

				header("location:index.php?action=okHR");

			}

			else{

				header("location:index.php");
			}

		}

	}
	#RESERVA DE HABITACIONES
	#------------------------------------
	public function reservaHabitacionController(){

		if(isset($_POST["IdClienteReserva"])){

			$datosController = array( "id_cliente"=>$_POST["IdClienteReserva"], 
									  "id_habitacion"=>$_POST["IdHabitacionReserva"],
									  "fecha_entrada"=>$_POST["FechaHabitacionReserva"],
									  "dias_ocupado"=>$_POST["DiasHabitacionReserva"],
									  "pago_total"=>$_POST["PrecioHabitacionReserva"]);

			$respuesta = Datos::reservaHabitacionModel($datosController, "reservas");

			if($respuesta == "success"){

				header("location:index.php?action=okR");

			}

			else{

				header("location:index.php");
			}

		}

	}
	#INGRESO DE USUARIOS
	#------------------------------------
	public function ingresoUsuarioController(){

		if(isset($_POST["usuarioIngreso"])){

			$datosController = array( "usuario"=>$_POST["usuarioIngreso"], 
								      "password"=>$_POST["passwordIngreso"]);

			$respuesta = Datos::ingresoUsuarioModel($datosController, "administradores");

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

	#VISTA DE USUARIOS
	#------------------------------------

	public function vistaUsuariosController(){

		$respuesta = Datos::vistaUsuariosModel("administradores");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.
		#FALTA EMAIL DESPUES DE PASSWORD
		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["usuario"].'</td>
				<td>'.$item["password"].'</td>
				
				<td><a href="index.php?action=editar&id='.$item["id"].'"><button>Editar</button></a></td>
				<td><a href="index.php?action=usuarios&idBorrar='.$item["id"].'"><button>Borrar</button></a></td>
			</tr>';

		}

	}

	#EDITAR USUARIO
	#------------------------------------<input type="email" value="'.$respuesta["email"].'" name="emailEditar" required>

	public function editarUsuarioController(){

		$datosController = $_GET["id"];
		$respuesta = Datos::editarUsuarioModel($datosController, "administradores");

		echo'<input type="hidden" value="'.$respuesta["id"].'" name="idEditar">

			 <input type="text" value="'.$respuesta["usuario"].'" name="usuarioEditar" required>

			 <input type="text" value="'.$respuesta["password"].'" name="passwordEditar" required>

			 

			 <input type="submit" value="Actualizar">';

	}

	#ACTUALIZAR USUARIO
	#------------------------------------  "email"=>$_POST["emailEditar"]);
	public function actualizarUsuarioController(){

		if(isset($_POST["usuarioEditar"])){

			$datosController = array( "id"=>$_POST["idEditar"],
							          "usuario"=>$_POST["usuarioEditar"],
				                      "password"=>$_POST["passwordEditar"]);
				                    
			
			$respuesta = Datos::actualizarUsuarioModel($datosController, "administradores");

			if($respuesta == "success"){

				header("location:index.php?action=cambio");

			}

			else{

				echo "error";

			}

		}
	
	}

	#BORRAR USUARIO
	#------------------------------------
	public function borrarUsuarioController(){

		if(isset($_GET["idBorrar"])){

			$datosController = $_GET["idBorrar"];
			
			$respuesta = Datos::borrarUsuarioModel($datosController, "administradores");

			if($respuesta == "success"){

				header("location:index.php?action=usuarios");
			
			}

		}

	}

}

?>