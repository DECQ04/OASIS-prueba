<?php

#EXTENSIÓN DE CLASES: Los objetos pueden ser extendidos, y pueden heredar propiedades y métodos. Para definir una clase como extensión, debo definir una clase padre, y se utiliza dentro de una clase hija.

require_once "conexion.php";

class Datos extends Conexion{

	#REGISTRO DE USUARIOS
	#-------------------------------------
	public function registroUsuarioModel($datosModel, $tabla){//Obtiene el array de la funcion de "controller.php" con los datos para la sentencia sql menos la tabla, ese es el otro parametro

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (usuario, password) VALUES (:usuario,:password)");	
		#Quite email despues de password
		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		$stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);

		if($stmt->execute()){//ejecuta y dependiendo si se realiza la accion:

			return "success";//regresa "success"

		}

		else{

			return "error";// o regresa "error"

		}

		$stmt->close();//y siempre cierra la sentencia $stmt

	}
	#RESERVA DE HABITACION
	#-------------------------------------MODIFICACION DE #REGISTRO DE USUARIOS
	public function reservaHabitacionModel($datosModel, $tabla){

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (id_cliente, id_habitacion, fecha_entrada, dias_ocupado, pago_total) VALUES (:id_cliente,:id_habitacion,:fecha_entrada,:dias_ocupado,:pago_total)");	
        #Quite email despues de password
		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		$stmt->bindParam(":id_cliente", $datosModel["id_cliente"], PDO::PARAM_STR);
		$stmt->bindParam(":id_habitacion", $datosModel["id_habitacion"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_entrada", $datosModel["fecha_entrada"], PDO::PARAM_STR);
		$stmt->bindParam(":dias_ocupado", $datosModel["dias_ocupado"], PDO::PARAM_STR);
		$stmt->bindParam(":pago_total", $datosModel["pago_total"], PDO::PARAM_STR);
		
		//$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}
	#REGISTRO DE CLIENTES
	#-------------------------------------MODIFICACION DE #REGISTRO DE USUARIOS
	public function registroClienteModel($datosModel, $tabla){

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, tipo, metodo_pago) VALUES (:nombre,:tipo,:metodo_pago)");	
        #Quite email despues de password
		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo", $datosModel["tipo"], PDO::PARAM_STR);
		$stmt->bindParam(":metodo_pago", $datosModel["metodo_pago"], PDO::PARAM_STR);
		

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}
	#REGISTRO DE HABITACION
	#-------------------------------------MODIFICACION DE #REGISTRO DE USUARIOS
	public function registroHabitacionModel($datosModel, $tabla){

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (tipo, precio) VALUES (:tipo,:precio)");	
		#Quite email despues de password
		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		$stmt->bindParam(":tipo", $datosModel["tipo"], PDO::PARAM_STR);
		$stmt->bindParam(":precio", $datosModel["precio"], PDO::PARAM_STR);
		//$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}
	#INGRESO USUARIO
	#-------------------------------------MODIFICACION DE #REGISTRO DE USUARIOS
	public function ingresoUsuarioModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT usuario, password FROM $tabla WHERE usuario = :usuario");	
		$stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
		$stmt->execute();

		#fetch(): Obtiene una fila de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetch();

		$stmt->close();

	}



	
	#VISTA USUARIOS
	#------------------------------------- 

	public function vistaUsuariosModel($tabla){//MUESTRA TODO LO QUE HAYA EN LA TABLA

		$stmt = Conexion::conectar()->prepare("SELECT id, usuario, password FROM $tabla");	//SENTENCIA, SOLO QUE TIENE PARAMETROS DEFINIDOS EN LUGAR DE UN *
		$stmt->execute();//EJECUTA

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();//Lo de arriba X2

		$stmt->close();//cierra el $stmt

	}
	#VISTA CLIENTES
	#-------------------------------------MODIFICACION DE #VISTA CLIENTES

	public function vistaClienteModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id, nombre, tipo, metodo_pago FROM $tabla");	
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();

		$stmt->close();

	}
	#VISTA HABITACIONES
	#-------------------------------------MODIFICACION DE #VISTA CLIENTES

	public function vistaHabitacionModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id, tipo, precio FROM $tabla");	
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();

		$stmt->close();

	}
	#VISTA RESERVACIONES
	#-------------------------------------MODIFICACION DE #VISTA CLIENTES

	public function vistaReservacionModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id, id_cliente, id_habitacion, fecha_entrada, dias_ocupado, pago_total FROM $tabla");	
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();

		$stmt->close();

	}





	#EDITAR USUARIO
	#-------------------------------------

	public function editarUsuarioModel($datosModel, $tabla){# SELECCIONA  TODO DE LA TABLA  INGRESADA EN EL PARAMETRO  DONDE EL ID SEA IGUAL AL IDDE LA BD

		$stmt = Conexion::conectar()->prepare("SELECT id, usuario, password FROM $tabla WHERE id = :id");//SENTENCIA = $stmt
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);//parametros
		$stmt->execute();//ejecuta el $stmt 

		return $stmt->fetch();//trae registro

		$stmt->close();//cierra $stmt

	}
	#EDITAR CLIENTE
	#-------------------------------------MODIFICACION DE #EDITAR USUARIO

	public function editarClienteModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id, nombre, tipo, metodo_pago FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);	
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

	}
	#EDITAR HABITACION
	#-------------------------------------MODIFICACION DE #EDITAR USUARIO


	public function editarHabitacionModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id, tipo, precio FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);	
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

	}
	#EDITAR RESERVACION
	#-------------------------------------MODIFICACION DE #EDITAR USUARIO


	public function editarReservacionModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id, id_cliente, id_habitacion, fecha_entrada, dias_ocupado, pago_total FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);	
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

	}




	#ACTUALIZAR USUARIO
	#-------------------------------------

	public function actualizarUsuarioModel($datosModel, $tabla){ //REQUIERE DE UN ARRAY CON LOS ATRIBUTOS DE LA TABLA Y EL NOMBRE PARA CAMBIAR LOS DATOS DONDE ENCUENTRE UN ID SIMILAR

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET usuario = :usuario, password = :password WHERE id = :id");

		$stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);

		if($stmt->execute()){// ERROR SI NO FUNCIONA LA SENTENCIA = $stmt, success si logra hacerlo

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}
	#ACTUALIZAR CLIENTE
	#-------------------------------------MODIFICACION DE #ACTUALIZAR USUARIO

	public function actualizarClienteModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, tipo = :tipo, metodo_pago = :metodo_pago WHERE id = :id");

		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo", $datosModel["tipo"], PDO::PARAM_STR);
		$stmt->bindParam(":metodo_pago", $datosModel["metodo_pago"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}
	#ACTUALIZAR HABITACION
	#-------------------------------------MODIFICACION DE #ACTUALIZAR USUARIO

	public function actualizarHabitacionModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET tipo = :tipo, precio = :precio WHERE id = :id");

	
		$stmt->bindParam(":tipo", $datosModel["tipo"], PDO::PARAM_STR);
		$stmt->bindParam(":precio", $datosModel["precio"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}
	#ACTUALIZAR RESERVACION
	#-------------------------------------MODIFICACION DE #ACTUALIZAR USUARIO

	public function actualizarReservacionModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_cliente = :id_cliente, id_habitacion = :id_habitacion, fecha_entrada = :fecha_entrada, dias_ocupado = :dias_ocupado, pago_total = :pago_total WHERE id = :id");

	
		$stmt->bindParam(":id_cliente", $datosModel["id_cliente"], PDO::PARAM_STR);
		$stmt->bindParam(":id_habitacion", $datosModel["id_habitacion"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_entrada", $datosModel["fecha_entrada"], PDO::PARAM_STR);
		$stmt->bindParam(":dias_ocupado", $datosModel["dias_ocupado"], PDO::PARAM_STR);
		$stmt->bindParam(":pago_total", $datosModel["pago_total"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}



	#BORRAR USUARIO
	#------------------------------------Sentencia sql , necesita los parametros del array de datos y la tabla para borrar
	public function borrarUsuarioModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

		if($stmt->execute()){// ejecuta y dependiendo marcara "error o success"

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}
	#BORRAR CLIENTE
	#------------------------------------MODIFICACION DEBORRAR USUARIO
	public function borrarClienteModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}
	#BORRAR HABITACION
	#------------------------------------MODIFICACION DEBORRAR USUARIO
	public function borrarHabitacionModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}
	#BORRAR RESERVACION
	#------------------------------------MODIFICACION DEBORRAR USUARIO
	public function borrarReservacionModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}

}

?>