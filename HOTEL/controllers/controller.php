<?php

class MvcController{

	#LLAMADA A LA PLANTILLA
	#-------------------------------------

	public function pagina(){	
		
		include "views/template.php";//usa la plantilla
	
	}

	#ENLACES
	#-------------------------------------Verifica que el parametro action se mande a la funcion de enlacesPagina model para redireccionar a la pagina correspóndiente

	public function enlacesPaginasController(){

		if(isset( $_GET['action'])){//verifica que este en la url
			
			$enlaces = $_GET['action'];//asigna a la variable $enlaces
		
		}

		else{

			$enlaces = "index";//sino redireccionara a inicio
		}

		$respuesta = Paginas::enlacesPaginasModel($enlaces);//regresa la direccion en la pagina correspondiente

		include $respuesta;

	}



	#REGISTRO DE USUARIOS
	#------------------------------------
	public function registroUsuarioController(){

		if(isset($_POST["usuarioRegistro"])){// si hay algo en usuarioRegistro hace el array y usa la funcion de Datos para guardarlos

			$datosController = array( "usuario"=>$_POST["usuarioRegistro"], 
								      "password"=>$_POST["passwordRegistro"]);
								      //"email"=>$_POST["emailRegistro"]);

			$respuesta = Datos::registroUsuarioModel($datosController, "administradores");//funcion para guardar en la tabla administradores

			if($respuesta == "success"){//si  se guardo mandara success y el header cambia a action=ok

				header("location:index.php?action=ok");

			}

			else{

				header("location:index.php");// sino redirecciona a index
			}

		}

	}
		#REGISTRO DE CLIENTES
	#------------------------------------MODIFICACION DE REGISTRO USUARIOS
	public function registroClienteController(){

		if(isset($_POST["nombreClienteRegistro"])){//VERIFICA QUE NO ESTE VACIO

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
	#------------------------------------MODIFICACION DE REGISTRO USUARIOS
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
	#------------------------------------MODIFICACION DE REGISTRO USUARIOS
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
	#------------------------------------MODIFICACION DE REGISTRO USUARIOS
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
	#------------------------------------Todas las vistas muestran una tabla con las caracteristicas necesarias 
	# para visualizar los objetos, para esto utilizan una funcion en la parte del modelo, respectivo a cada vista

	public function vistaUsuariosController(){

		$respuesta = Datos::vistaUsuariosModel("administradores");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.
		#FALTA EMAIL DESPUES DE PASSWORD
		foreach($respuesta as $row => $item){//solo muestra una tabla y un boton con iconos guardados en la carpeta "icons"
		echo'<tr>
				<td>'.$item["usuario"].'</td>
				<td>'.$item["password"].'</td>
				
				<td><a href="index.php?action=editar&id='.$item["id"].'">
				<img src="icons/descarga.png" alt="Enviar" width="30" height="30"></a></td>
				<td><a href="index.php?action=usuarios&idBorrar='.$item["id"].'">
				<img src="icons/delete.png" alt="Enviar" width="20" height="20"></a></td>

			</tr>';

		}

	}
	#VISTA DE CLIENTES
	#------------------------------------MODIFICACION DE VISTA USUARIOS

	public function vistaClienteController(){

		$respuesta = Datos::vistaClienteModel("clientes");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.
		#FALTA EMAIL DESPUES DE PASSWORD
		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["nombre"].'</td>
				<td>'.$item["tipo"].'</td>
				<td>'.$item["metodo_pago"].'</td>
				<td><a href="index.php?action=editarC&id='.$item["id"].'"><img src="icons/descarga.png" alt="Enviar" width="30" height="30"></a></td>
				<td><a href="index.php?action=usuarios&idBorrarC='.$item["id"].'"><img src="icons/delete.png" alt="Enviar" width="20" height="20"></a></td>
			</tr>';

		}

	}

	#VISTA DE HABITACIONES
	#------------------------------------MODIFICACION DE VISTA USUARIOS

	public function vistaHabitacionController(){

		$respuesta = Datos::vistaHabitacionModel("habitaciones");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.
		#FALTA EMAIL DESPUES DE PASSWORD
		foreach($respuesta as $row => $item){
		echo'<tr>
				
				<td>'.$item["tipo"].'</td>
				<td>'.$item["precio"].'</td>
				<td><a href="index.php?action=editarH&id='.$item["id"].'"><img src="icons/descarga.png" alt="Enviar" width="30" height="30"></a></td>
				<td><a href="index.php?action=usuarios&idBorrarH='.$item["id"].'"><img src="icons/delete.png" alt="Enviar" width="30" height="30"></a></td>
			</tr>';

		}

	}
	#VISTA DE RESERVACIONES
	#------------------------------------MODIFICACION DE VISTA USUARIOS

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
				<td><a href="index.php?action=editarR&id='.$item["id"].'"><img src="icons/descarga.png" alt="Enviar" width="30" height="30"></a></td>
				<td><a href="index.php?action=usuarios&idBorrarR='.$item["id"].'"><img src="icons/delete.png" alt="Enviar" width="30" height="30"></a></td>
			</tr>';

		}

	}




	#EDITAR USUARIO
	#------------------------------------<MUESTRA LOS DATOS DE USUARIOS PARA EDITAR

	public function editarUsuarioController(){

		$datosController = $_GET["id"];
		$respuesta = Datos::editarUsuarioModel($datosController, "administradores");//USA LA FUNCION PARA TRAER LOS DATOS CORRESPONDIENTES (COMO TABLA)

		echo'<input type="hidden" value="'.$respuesta["id"].'" name="idEditar">

			 <input type="text" value="'.$respuesta["usuario"].'" name="usuarioEditar" required>

			 <input type="text" value="'.$respuesta["password"].'" name="passwordEditar" required>

			 

			 <input type="submit" value="Actualizar">';

	}

	#EDITAR CLIENTE
	#------------------------------------<MODIFICACION DE EDITAR USUARIOS

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
	#------------------------------------<MODIFICACION DE EDITAR USUARIOS


	public function editarHabitacionController(){

		$datosController = $_GET["id"];
		$respuesta = Datos::editarHabitacionModel($datosController, "habitaciones");

		echo'<input type="hidden" value="'.$respuesta["id"].'" name="idEditar">
			 <input type="text" value="'.$respuesta["tipo"].'" name="tipoEditar" required>
			 <input type="text" value="'.$respuesta["precio"].'" name="precioEditar" required>

			 

			 <input type="submit" value="Actualizar">';

	}
	#EDITAR RESERVACION
	#------------------------------------<MODIFICACION DE EDITAR USUARIOS


	public function editarReservacionController(){

		$datosController = $_GET["id"];
		$respuesta = Datos::editarReservacionModel($datosController, "reservas");

		echo'<input type="hidden" value="'.$respuesta["id"].'" name="idEditar">
			 <input type="text" value="'.$respuesta["id_cliente"].'" name="id_clienteEditar" required>
			 <input type="text" value="'.$respuesta["id_habitacion"].'" name="id_habitacionEditar" required>
			 <input type="date" value="'.$respuesta["fecha_entrada"].'" name="fecha_entradaEditar" required>
			 <input type="text" value="'.$respuesta["dias_ocupado"].'" name="dias_ocupadoEditar" required>
			 <input type="text" value="'.$respuesta["pago_total"].'" name="pago_totalEditar" required>

			 

			 <input type="submit" value="Actualizar">';

	}



	#ACTUALIZAR USUARIO
	#------------------------------------  
	public function actualizarUsuarioController(){//SI HAY DATOS HACE UN ARRAY , Y USA LA FUNCION DE "Datos" para cambiar los datos en la tabla por los ingresados

		if(isset($_POST["usuarioEditar"])){

			$datosController = array( "id"=>$_POST["idEditar"],
							          "usuario"=>$_POST["usuarioEditar"],
				                      "password"=>$_POST["passwordEditar"]);
				                    
			
			$respuesta = Datos::actualizarUsuarioModel($datosController, "administradores");

			if($respuesta == "success"){

				header("location:index.php?action=cambio");//si  se guardo mandara success y el header cambia a action=cambio(esto desencadena unna accion dependiendo, esta en el modelo en "enlaces")

			}

			else{

				echo "error";//si no es success , manda error

			}

		}
	
	}
	#ACTUALIZAR CLIENTE
	#------------------------------------  MODIFICADOR DE ACTUALIZAR USUARIO
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
	#------------------------------------  MODIFICADOR DE ACTUALIZAR USUARIO
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
	#------------------------------------  MODIFICADOR DE ACTUALIZAR USUARIO
	public function actualizarReservacionController(){

		if(isset($_POST["id_clienteEditar"])){

			$datosController = array( "id"=>$_POST["idEditar"],
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
	public function borrarUsuarioController(){//Usa ael id para mandar una sentencia sql que borra donde encuentre un registro con el mismo id,la sentencia esta en "models"->"crud"->"borrarUsuarioModel"

		if(isset($_GET["idBorrar"])){

			$datosController = $_GET["idBorrar"];
			
			$respuesta = Datos::borrarUsuarioModel($datosController, "administradores");

			if($respuesta == "success"){

				header("location:index.php?action=usuarios");
			
			}

		}

	}
	#BORRAR CLIENTE
	#------------------------------------MODIFICADOR DE #BORRAR USUARIO
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
	#------------------------------------MODIFICADOR DE #BORRAR USUARIO
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
	#------------------------------------MODIFICADOR DE #BORRAR USUARIO
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