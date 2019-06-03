<?php

#EXTENSIÓN DE CLASES: Los objetos pueden ser extendidos, y pueden heredar propiedades y métodos. Para definir una clase como extensión, debo definir una clase padre, y se utiliza dentro de una clase hija.

require_once "conexion.php";

class Datos extends Conexion{

	#REGISTRO DE MAESTRO
	#-------------------------------------recibe los datos para hacer la insercion en la tabla del parametro $tabla, ejecuta y devuelve una respuesta
	public function registroMaestroModel($datosModel, $tabla){

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (noempleado, nombre, apellido, email, id_carrera) VALUES (:noempleado,:nombre,:apellido ,:email ,:id_carrera)");	

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		$stmt->bindParam(":noempleado", $datosModel["noempleado"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apellido", $datosModel["apellido"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$stmt->bindParam(":id_carrera", $datosModel["id_carrera"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}
	#REGISTRO DE ALUMNOS
	#-------------------------------------variacion del primer metodo REGISTRO
	public function registroAlumnoModel($datosModel, $tabla){

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla ( matricula, nombre, apellido, email, id_carrera, id_grupo) VALUES (:matricula,:nombre,:apellido ,:email ,:id_carrera, :id_grupo)");	

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		$stmt->bindParam(":matricula", $datosModel["matricula"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apellido", $datosModel["apellido"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$stmt->bindParam(":id_carrera", $datosModel["id_carrera"], PDO::PARAM_STR);
		$stmt->bindParam(":id_grupo", $datosModel["id_grupo"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}
	#REGISTRO DE CARRERA
	#-------------------------------------variacion del primer metodo REGISTRO
	public function registroCarreraModel($datosModel, $tabla){

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla ( nombre) VALUES (:nombre)");	

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}
    #REGISTRO DE MATERIAS
	#-------------------------------------variacion del primer metodo REGISTRO
	public function registroMateriaModel($datosModel, $tabla){

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla ( id_maestro, nombre, horas, creditos,id_grupo) VALUES ( :id_maestro ,:nombre ,:horas ,:creditos,:id_grupo)");	

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		$stmt->bindParam(":id_maestro", $datosModel["id_maestro"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":horas", $datosModel["horas"], PDO::PARAM_STR);
		$stmt->bindParam(":creditos", $datosModel["creditos"], PDO::PARAM_STR);
		$stmt->bindParam(":id_grupo", $datosModel["id_grupo"], PDO::PARAM_STR);



		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}
	#REGISTRO DE GRUPO
	#-------------------------------------variacion del primer metodo REGISTRO
	public function registroGrupoModel($datosModel, $tabla){

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (  cuatrimestre) VALUES ( :cuatrimestre)");	

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		$stmt->bindParam(":cuatrimestre", $datosModel["cuatrimestre"], PDO::PARAM_STR);


		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}



	#INGRESO USUARIO
	#-------------------------------------
	public function ingresoUsuarioModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT usuario, password FROM $tabla WHERE usuario = :usuario");	
		$stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
		$stmt->execute();

		#fetch(): Obtiene una fila de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetch();

		$stmt->close();

	}




	#VISTA MAESTRO
	#-------------------------------------ejecuta la sentencia SQL en la tabla correspondiente devuelve todo lo que contiene

	public function vistaMaestroModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id, noempleado, nombre, apellido, email, id_carrera FROM $tabla");	
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();

		$stmt->close();

	}
	#VISTA ALUMNOS
	#-------------------------------------variacion del primer metodo VISTA
	public function vistaAlumnoModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id, matricula, nombre, apellido, email, id_carrera, id_grupo FROM $tabla");	
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();

		$stmt->close();

	}
	#VISTA CARRERA
	#-------------------------------------variacion del primer metodo VISTA
	public function vistaCarreraModel($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT id, nombre FROM $tabla");	
		$stmt->execute();
		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();
		$stmt->close();

	}
	#VISTA MATERIA
	#-------------------------------------variacion del primer metodo VISTA
	public function vistaMateriaModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id, id_maestro, nombre, horas, creditos, id_grupo FROM $tabla");	
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();

		$stmt->close();

	}
	#VISTA GRUPO
	#-------------------------------------variacion del primer metodo VISTA
	public function vistaGrupoModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id, cuatrimestre FROM $tabla");	
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();

		$stmt->close();

	}




	#EDITAR MAESTRO
	#-------------------------------------ejecuta la sentecia y devuelve solo lo que coincida con los datos del id
	public function editarMaestroModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id, noempleado, nombre, apellido, email, id_carrera FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);	
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

	}
	#EDITAR ALUMNO
	#-------------------------------------variacion del primer metodo EDITAR
	public function editarAlumnoModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id, matricula, nombre, apellido, email, id_carrera, id_grupo FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);	
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

	}
	#EDITAR CARRERA
	#-------------------------------------variacion del primer metodo EDITAR
	public function editarCarreraModel($datosModel, $tabla){
		$stmt = Conexion::conectar()->prepare("SELECT id, nombre FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);	
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();

	}
	#EDITAR MATERIA
	#-------------------------------------variacion del primer metodo EDITAR
	public function editarMateriaModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id, id_maestro, nombre, horas, creditos FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);	
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

	}
	#EDITAR GRUPO
	#-------------------------------------variacion del primer metodo EDITAR
	public function editarGrupoModel($datosModel, $tabla){
		$stmt = Conexion::conectar()->prepare("SELECT id, cuatrimestre FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);	
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();

	}




	#ACTUALIZAR MAESTRO
	#------------------------------------- al dar clic en actualizar en la vista editar, se remplazaran los datos de la BD por los contenidos en el formulario, para esto usa la tabla y los datos necesarios
	public function actualizarMaestroModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET noempleado=:noempleado, nombre = :nombre, apellido = :apellido, email = :email, id_carrera=:id_carrera WHERE id = :id");
		$stmt->bindParam(":noempleado", $datosModel["noempleado"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apellido", $datosModel["apellido"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$stmt->bindParam(":id_carrera", $datosModel["id_carrera"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}
	#ACTUALIZAR ALUMNO
	#-------------------------------------variacion del primer metodo ACTUALIZAR
	public function actualizarAlumnoModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET matricula=:matricula, nombre = :nombre, apellido = :apellido, email = :email, id_carrera=:id_carrera, id_grupo=:id_grupo WHERE id = :id");
		$stmt->bindParam(":matricula", $datosModel["matricula"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apellido", $datosModel["apellido"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$stmt->bindParam(":id_carrera", $datosModel["id_carrera"], PDO::PARAM_STR);
		$stmt->bindParam(":id_grupo", $datosModel["id_grupo"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}
	#ACTUALIZAR CARRERA
	#-------------------------------------variacion del primer metodo ACTUALIZAR
	public function actualizarCarreraModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  nombre = :nombre WHERE id = :id");
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}
	#ACTUALIZAR MATERIA
	#-------------------------------------variacion del primer metodo ACTUALIZAR
	public function actualizarMateriaModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_maestro=:id_maestro, nombre = :nombre, horas = :horas, creditos = :creditos WHERE id = :id");
		$stmt->bindParam(":id_maestro", $datosModel["id_maestro"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":horas", $datosModel["horas"], PDO::PARAM_STR);
		$stmt->bindParam(":creditos", $datosModel["creditos"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}
	#ACTUALIZAR GRUPO
	#-------------------------------------variacion del primer metodo ACTUALIZAR
	public function actualizarGrupoModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  cuatrimestre = :cuatrimestre WHERE id = :id");
		$stmt->bindParam(":cuatrimestre", $datosModel["cuatrimestre"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}




	#BORRAR MAESTRO
	#------------------------------------recibe el id y la tabla para ejecutar una sentencia SQL  que borra el registro que conicida con el id del parametro
	public function borrarMaestroModel($datosModel, $tabla){

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
	#BORRAR ALUMNO
	#------------------------------------variacion del primer metodo BORRAR
	public function borrarAlumnoModel($datosModel, $tabla){

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
	#BORRAR CARRERA
	#------------------------------------variacion del primer metodo BORRAR
	public function borrarCarreraModel($datosModel, $tabla){

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
	#BORRAR MATERIA
	#------------------------------------variacion del primer metodo BORRAR
	public function borrarMateriaModel($datosModel, $tabla){

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
	#BORRAR GRUPO
	#------------------------------------variacion del primer metodo BORRAR
	public function borrarGrupoModel($datosModel, $tabla){

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