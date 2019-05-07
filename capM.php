<?php
 require "controlDB.php";

 $o =new controlDB();
 $noEmpleado=$_POST["txtNoEmpleado"];
 $nombre=$_POST["txtNombre"];
 $carrera=$_POST["txtCarrera"];
 $telefono=$_POST["txtTelefono"];
 
 $sql="insert into `maestros` (`no. empleado`, `nombre`, `carrera`, `telefono`, `PK`) VALUES ('$noEmpleado', '$nombre', '$carrera', '$telefono', NULL)";
 //echo $sql;
 
 $o->actualizar($sql);

?>