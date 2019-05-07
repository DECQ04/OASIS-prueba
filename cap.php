<?php
 require "controlDB.php";

$o =new controlDB();
$nombre=$_POST["txtNombre"];
$matricula=$_POST["txtMatricula"];
$carrera=$_POST["txtCarrera"];
$email=$_POST["txtE-mail"];
$telefono=$_POST["txtTelefono"];

$sql="insert into `alumnos`(`Matricula`, `Nombre`, `Carrera`, `e-mail`, `telefono`,`PK`) values ('$matricula','$nombre','$carrera','$email','$telefono',NULL)";
//echo $sql;

$o->actualizar($sql);
?>