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
	#VISTA DE CLIENTES
	#------------------------------------

	public function vistaClienteController(){

		$respuesta = Datos::vistaClienteModel("clientes");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.
		#FALTA EMAIL DESPUES DE PASSWORD
		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["nombre"].'</td>
				<td>'.$item["tipo"].'</td>
				<td>'.$item["metodo_pago"].'</td>
				<td><a href="index.php?action=editarC&id='.$item["id"].'"><button>Editar</button></a></td>
				<td><a href="index.php?action=usuarios&idBorrarC='.$item["id"].'"><button>Borrar</button></a></td>
			</tr>';

		}

	}

	#VISTA DE HABITACIONES
	#------------------------------------

	public function vistaHabitacionController(){

		$respuesta = Datos::vistaHabitacionModel("habitaciones");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.
		#FALTA EMAIL DESPUES DE PASSWORD
		foreach($respuesta as $row => $item){
		echo'<tr>
				
				<td>'.$item["tipo"].'</td>
				<td>'.$item["precio"].'</td>
				<td><a href="index.php?action=editarH&id='.$item["id"].'"><button>Editar</button></a></td>
				<td><a href="index.php?action=usuarios&idBorrarH='.$item["id"].'"><button>Borrar</button></a></td>
			</tr>';

		}

	}
	#VISTA DE RESERVACIONES
	#------------------------------------

	public function vistaReservacionController(){

		$respuesta = Datos::vistaReservacionModel("reservas");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.
		#FALTA EMAIL DESPUES DE PASSWORD
		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["id_cliente"].'</td>
				<td>'.$item["id_habitacion"].'</td>
				<td>'.$item["fecha_entrada"].'</td>
				<td>'.$item["dias_ocupado"].'</td>
				<td>'.$item["pago_total"].'</td>
				<td><a href="index.php?action=editarR&id='.$item["id"].'"><button>Editar</button></a></td>
				<td><a href="index.php?action=usuarios&idBorrarR='.$item["id"].'"><button>Borrar</button></a></td>
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

	#EDITAR CLIENTE
	#------------------------------------<input type="email" value="'.$respuesta["email"].'" name="emailEditar" required>

	public function editarClienteController(){

		$datosController = $_GET["id"];
		$respuesta = Datos::editarClienteModel($datosController, "clientes");

		echo'<input type="hidden" value="'.$respuesta["id"].'" name="idEditar">

			 <input type="text" value="'.$respuesta["nombre"].'" name="nombreEditar" required>

			 <input type="text" value="'.$respuesta["tipo"].'" name="tipoEditar" required>
			 <input type="text" value="'.$respuesta["metodo_pago"].'" name="metodo_pagoEditar" required>

			 

			 <input type="submit" value="Actualizar">';

	}
	#EDITAR HABITACION
	#------------------------------------<input type="email" value="'.$respuesta["email"].'" name="emailEditar" required>

	public function editarHabitacionController(){

		$datosController = $_GET["id"];
		$respuesta = Datos::editarHabitacionModel($datosController, "habitaciones");

		echo'<input type="hidden" value="'.$respuesta["id"].'" name="idEditar">
			 <input type="text" value="'.$respuesta["tipo"].'" name="tipoEditar" required>
			 <input type="text" value="'.$respuesta["precio"].'" name="precioEditar" required>

			 

			 <input type="submit" value="Actualizar">';

	}
	#EDITAR RESERVACION
	#------------------------------------<input type="email" value="'.$respuesta["email"].'" name="emailEditar" required>

	public function editarReservacionController(){

		$datosController = $_GET["id"];
		$respuesta = Datos::editarReservacionModel($datosController, "reservas");

		echo'<input type="hidden" value="'.$respuesta["id"].'" name="idEditar">
			 <input type="text" value="'.$respuesta["id_cliente"].'" name="id_clienteEditar">
			 <input type="text" value="'.$respuesta["id_habitacion"].'" name="id_habitacionEditar">
			 <input type="text" value="'.$respuesta["fecha_entrada"].'" name="fecha_entradaEditar" required>
			 <input type="text" value="'.$respuesta["dias_ocupado"].'" name="dias_ocupadoEditar" required>
			 <input type="text" value="'.$respuesta["pago_total"].'" name="pago_totalEditar">

			 

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
	#ACTUALIZAR CLIENTE
	#------------------------------------  "email"=>$_POST["emailEditar"]);
	public function actualizarClienteController(){

		if(isset($_POST["nombreEditar"])){

			$datosController = array( "id"=>$_POST["idEditar"],
							          "nombre"=>$_POST["nombreEditar"],
									  "tipo"=>$_POST["tipoEditar"],
									  "metodo_pago"=>$_POST["metodo_pagoEditar"]);
				                    
			
			$respuesta = Datos::actualizarClienteModel($datosController, "clientes");

			if($respuesta == "success"){

				header("location:index.php?action=cambio");

			}

			else{

				echo "error";

			}

		}
	
	}
	#ACTUALIZAR HABITACION
	#------------------------------------  "email"=>$_POST["emailEditar"]);
	public function actualizarHabitacionController(){

		if(isset($_POST["tipoEditar"])){

			$datosController = array( "id"=>$_POST["idEditar"],
									  "tipo"=>$_POST["tipoEditar"],
									  "precio"=>$_POST["precioEditar"]);
				                    
			
			$respuesta = Datos::actualizarHabitacionModel($datosController, "habitaciones");

			if($respuesta == "success"){

				header("location:index.php?action=cambio");

			}

			else{

				echo "error";

			}

		}
	
	}
    #ACTUALIZAR RESERVACION
	#------------------------------------  "email"=>$_POST["emailEditar"]);
	public function actualizarReservacionController(){

		if(isset($_POST["id_clienteEditar"])){

			$datosController = array(  "id"=>$_POST["idEditar"],
						 			  "id_cliente"=>$_POST["id_clienteEditar"],
									  "id_habitacion"=>$_POST["id_habitacionEditar"],
									  "fecha_entrada"=>$_POST["fecha_entradaEditar"],
									  "dias_ocupado"=>$_POST["dias_ocupadoEditar"],
									  "pago_total"=>$_POST["pago_totalEditar"]);
									  
				                    
			
			$respuesta = Datos::actualizarReservacionModel($datosController, "reservas");

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
	#BORRAR CLIENTE
	#------------------------------------
	public function borrarClienteController(){

		if(isset($_GET["idBorrarC"])){

			$datosController = $_GET["idBorrarC"];
			
			$respuesta = Datos::borrarClienteModel($datosController, "clientes");

			if($respuesta == "success"){

				header("location:index.php?action=usuarios");
			
			}

		}

	}
	#BORRAR HABITACION
	#------------------------------------
	public function borrarHabitacionController(){

		if(isset($_GET["idBorrarH"])){

			$datosController = $_GET["idBorrarH"];
			
			$respuesta = Datos::borrarHabitacionModel($datosController, "habitaciones");

			if($respuesta == "success"){

				header("location:index.php?action=usuarios");
			
			}

		}

	}
	#BORRAR RESERVACION
	#------------------------------------
	public function borrarReservacionController(){

		if(isset($_GET["idBorrarR"])){

			$datosController = $_GET["idBorrarR"];
			
			$respuesta = Datos::borrarReservacionModel($datosController, "reservas");

			if($respuesta == "success"){

				header("location:index.php?action=usuarios");
			
			}

		}

	}

}

?>
