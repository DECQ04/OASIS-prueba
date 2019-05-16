<?php
	require_once('database_credentials.php');
	function getPDO(){#Instancia PDO para la BD
        $host = DB_HOST; 
		$dbname = DB_DATABASE;
		#ACTIVA utf8
		$dbOtp = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"); 
		#Hace una instancia
        $pdoObj = new PDO("mysql:host={$host};dbname={$dbname};port=3306", DB_USER, DB_PASSWORD, $dbOtp);
		return $pdoObj;
    }
	#Regresa la cantidad de registros de user
	function contadorUsers(){
		
		global $datab;
		$datab = getPDO();
		$stmt = $datab->prepare("SELECT * FROM user");
		$stmt -> execute();
		$r = $stmt->rowCount();
		return $r;
	}
	#Regresa la cantidad de registros de user_type
	function contadorTypes(){
		global $datab;
		$datab = getPDO();
		$stmt = $datab->prepare("SELECT * FROM user_type");
		$stmt -> execute();
		$r = $stmt->rowCount();
		return $r;
	}

	#Regresa cantidad de registros de status.
	function contadorStatus(){
		global $datab;
		$datab = getPDO();
		$stmt = $datab->prepare("SELECT * FROM estatus");
		$stmt -> execute();
		$r = $stmt->rowCount();
		return $r;
		
	}

	#Regresa cantidade registros de user_log.
	function contadorAccess(){
		global $datab;
		$datab = getPDO();
		$stmt = $datab->prepare("SELECT * FROM User_log");
		$stmt -> execute();
		$r = $stmt->rowCount();
		return $r;
		
	}

	#Obtiene la cantidad de usuarios activos.
	function contadorActives(){
		global $datab;
		$datab = getPDO();
		$stmt = $datab->prepare("SELECT * FROM user WHERE estatus_id = 1");
		$stmt -> execute();
		$r = $stmt->rowCount();
		return $r;
	}

	#Regresa cantidad usuarios inactivos.
	function contadorInactives(){
		global $datab;
		$datab = getPDO();
		$stmt = $datab->prepare("SELECT * FROM user WHERE estatus_id = 2");
		$stmt -> execute();
		$r = $stmt->rowCount();
		return $r;
	}

	#Regresa tabla de la base de datos
	function allF($tabla){
		global $datab;
		$datab = getPDO();
		$stmt = $datab->prepare("SELECT * FROM ".$tabla);
		$stmt->execute();
		
		return $stmt;
	}
?>