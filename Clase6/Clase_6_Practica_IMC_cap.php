<?php
 require "Clase_6_Practica_IMC_index.php";

$o =new controlDB();
$edad=$_POST["txtEdad"];
$peso=$_POST["txtPeso"];
$altura=$_POST["txtAltura"];
$imc=$peso/($altura*$altura);


$sql="insert into `persona`(`edad`, `peso`, `altura`, `imc`, `PK`) values ('$edad','$peso','$altura','$imc', NULL)";
echo $sql;

$o->actualizar($sql);
?>