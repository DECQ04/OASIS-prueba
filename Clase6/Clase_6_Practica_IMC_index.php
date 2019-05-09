<?php
class controlDB{

    function __construct()
    {
        try {
           //Declarando variables
        $host="localhost";
        $db_name="imc";
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
    var $edad="";
    var $peso="";
    var $altura="";
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
        


       
        ?>
        
        <form action="Clase_6_Practica_IMC_cap.php" method="POST">
       <table>
        <tr>
        <td>EDAD</td>
        <td><input type="text" name="txtEdad"/></td>
        </tr>
        <tr>
        <td>PESO</td>
        <td><input type="text" name="txtPeso"/></td>
        </tr><tr>
        <td>Altura</td>
        <td><input type="text" name="txtAltura"/></td>
        </tr><tr>
        <td colspan="2" align="center"><input type="submit" values="INSERTAR"/></td>
        
        </tr>
        </table>
        
      
  
    
    
    
    
    
    
    </body>
</html>