<?php
class controlDB{

    function __construct()
    {
        try {
           //Declarando variables
        $host="localhost";
        $db_name="escuela";
        $user="root";
        $pass="";
        #conexion
        $this->con=mysqli_connect($host,$user,$pass) or die ("Error en la conexion a la BD");
   
        mysqli_select_db($this->con,$db_name) or die ("NO se ha encontrado la bd");
 
        } catch (Exception $th) {
            throw $th;
        }
       
   
    }
    function consultar($sql)
    {
        try {
            $res=mysqli_query($this->con,$sql);
        $data=NULL;

        while ($fila=mysqli_fetch_assoc($res)) {
            $data[]=$fila;
           
        }
         return $data;
        } catch (Exception $th) {
            throw $th;
        }
        
    }
    function actualizar($sql)
    {
        mysqli_query($this->con,$sql);

        if(mysqli_affected_rows($this->con)<=0){
            echo "No se pudo";
        }else{
            echo ":)";
        }

    }    
     
}?>
<?php
class persona
{
    var $nombre="";
    var $carrera="";
    var $telefono="";
}?>
<?php
class alumno extends persona  {
  
    var $matricula="";
    var $email="";
}?>
<?php
class maestro extends persona  {
  
    var $noEmpleado="";
}?>


 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
    <body>
        <?php
        $obj= new controlDB();
        //$datos=$obj->consultar("select * from alumnos");
        //$datoM=$obj->consultar("select * from alumnos");
        //print_r($datos);
        //$obj->conect();
       
       /*<table border="1"; aligt="center">
        <tr>
            <td>MATRICULA</td>
            <td>NOMBRE</td>
            <td>CARRERA</td>
            <td>E-MAIL</td>
            <td>TELÉFONO</td>
            <td>PK</td>
        </tr>
         <?php foreach ($datos as $fila) ?><?php?>{ 
        <tr>
        <td><?php echo $fila["Matricula"]?></td>
        <td><?php echo $fila["Nombre"]?></td>
        <td><?php echo $fila["Carrera"]?></td>
        <td><?php echo $fila["e-mail"]?></td>
        <td><?php echo $fila["telefono"]?></td>
        <td><?php echo $fila["PK"]?></td>
        </tr>
        
        } 
        </table>*/


       
        ?>
        
        <form action="cap.php" method="POST">
       <table>
        <tr>
        <td>MATRICULA</td>
        <td><input type="text" name="txtMatricula"/></td>
        </tr>
        <tr>
        <td>NOMBRE</td>
        <td><input type="text" name="txtNombre"/></td>
        </tr><tr>
        <td>CARRERA</td>
        <td><input type="text" name="txtCarrera"/></td>
        </tr><tr>
        <td>E-MAIL</td>
        <td><input type="text" name="txtE-mail"/></td>
        </tr><tr>
        <td>TELEFONO</td>
        <td><input type="text" name="txtTelefono"/></td>
        </tr>
        <tr>
        <td colspan="2" align="center"><input type="submit" values="INSERTAR"/></td>
        
        </tr>
        </table>
        
        <form action="capM.php" method="POST">
       <table>
        <tr>
        <td>No. EMPLEADO</td>
        <td><input type="text" name="txtNoEmpleado"/></td>
        </tr>
        <tr>
        <td>NOMBRE</td>
        <td><input type="text" name="txtNombre"/></td>
        </tr><tr>
        <td>CARRERA</td>
        <td><input type="text" name="txtCarrera"/></td>
        </tr><tr>
        <td>TELEFONO</td>
        <td><input type="text" name="txtTelefono"/></td>
        </tr>
        <tr>
        <td colspan="2" align="center"><input type="submit" values="INSERTAR"/></td>
        
        </tr>
        </table>
   <?php
   //$alu->nombre=$_POST["txtNombre"];
    //echo $alu->nombre."</br>";
   ?>
    
    
    
    
    
    
    </body>
</html>