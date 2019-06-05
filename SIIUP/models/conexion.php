<?php

class Conexion{

	public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=escuela","daniel","Cervantes04");
		return $link;

	}

}

?>