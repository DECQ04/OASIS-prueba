<?php
require_once "conexion.php";//maraca error si no esta esto porque lo necesitará

class Datos extends Conexion{
	
	#REGISTRO DE ALUMNOS
	#------------------
	public function registroAlumnoModel($datosModel, $tabla){//asigna a cada parametro ingresado con los necesarios para la sentencia, las propiedades del objeto en la bd
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (matricula, nombre, apellido, carrera,anio_de_ingreso, id_grupo) VALUES (:matricula,:nombre,:apellido ,:email ,:carrera)");	
		$stmt->bindParam(":matricula", $datosModel["matricula"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":apellido", $datosModel["apellido"], PDO::PARAM_STR);
		$stmt->bindParam(":carrera", $datosModel["carrera"], PDO::PARAM_STR);
		$stmt->bindParam(":anio_de_ingreso", $datosModel["anio_de_ingreso"], PDO::PARAM_STR);
		$stmt->bindParam(":id_grupo", $datosModel["id_grupo"], PDO::PARAM_STR);

		$stmt->close();

	}
	#VISTA ALUMNOS
	#-----------------
	public function vistaAlumnoModel($tabla){//trae lo que encuentre en la tabla de la bd asignada con los parametros 
		$stmt = Conexion::conectar()->prepare("SELECT id, matricula, nombre, apellidos,  anio_de_ingreso,carrera, id_grupo FROM $tabla");	
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();

	}
	#BORRAR Alumno
	#----
	public function borrarAlumnoModel($datosModel, $tabla){//recibe el id del parametro $datosModel y la tabla de $tabla para borrar el registro
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");//sentencia de sql a ejecutar
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);
		$stmt->close();

	}
}

?>