<?php

class Conexion{

	public function conectar(){

		//$link = new PDO("mysql:host=localhost;dbname=id9672334_hotel","id9672334_root","contrasena");
		$link = new PDO("mysql:host=localhost;dbname=hotel","root","");
		return $link;

	}

}

?>