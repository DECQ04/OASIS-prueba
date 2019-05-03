<?php
	//variable numeriaca
	$numero = 5;	
echo "Esto es un numero:".$numero"<br>";
	var_dump($numero);
        echo"<br><br>;
	
	//palabra
	$palabra ="ITI";
	echo "Esto es una palabra:".$palabra"<br>";
	echo"<br><br>;
   	 
	//booleana
	$booleana =true;
	echo "Esto es una varaible booleana:".$booleana"<br>";
	echo"<br><br>;
	

	//Arreglos unidimensionales
	$arregloColores= array("rojo","amarillo");
	echo "Esto es una variable de array: $arregloColores[1]<br>";
	var_dump($arregloColores);
	echo"<br><br>";

	//Arreglo con propiedades
	$arregloVerduras= array("verdura1"=>"lechuga","verdura2"=>"cebolla");
	echo "esto es una array con propiedades: $arrayVerduras[verdura1]<br>";
	var_dump($arregloVerduras);
	echo"<br><br>";

	//variables de tipo objeto
	$frutas= (object)["fruta"=>"pera","fruta2"=>"manzana"];
	echo "Esto es una variable de tipo objeto: $frutas->fruta1<br>";
	var_dump($frutas);
        echo"<br><br>"; 


?>