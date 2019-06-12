<?php

class Conexion{

	public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=examen","daniel","Cervantes04");
		return $link;

	}

}

?>