<?php

class Conexion{//clase para hacer la conexion a la bd, se ereda para usarse cuando se requiera

	public function conectar(){

		//$link = new PDO("mysql:host=localhost;dbname=id9672334_hotel","id9672334_root","contrasena");
		$link = new PDO("mysql:host=localhost;dbname=hotel","daniel","Cervantes04");
		return $link;//regresa el string

	}

}

?>
