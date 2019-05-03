<?php

	//Funciones sin parametros
	function saludo(){
	     echo "Hola<br>";
	
	}

	saludo();


	//Funciones con par�metros
	function despedida($adios){
	
	echo"$adios<br>";
	
	}

	despedida("adios salida");


	//funcion con retorno
	function retorno ($retornar){
		return $retornar;
	}

	echo retorno("Esto es un retorno");
 //aaaa
?>