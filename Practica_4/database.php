<?php

class Database{
    private $con;
    private $dbhost="localhost";
    private $dbuser="root";
    private $dbpass="";
    private $dbname="tuto_poo";

    function __construct(){
        $this->connect_db();
    }

    public function connect_db(){
        $this->con=mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
        if(mysqli_connect_error()){
            die("conexion a la base de datos fallo".mysqli_connect_error().mysqli_connect_errno());

        }
    }
    public function sanitize($var){
        $return = mysqli_real_escape_string($this->con, $var);
        return $return;
    }

    public function create($nombres, $apellidos, $telefono, $direccion, $correo_electronico){
        $sql="INSERT INTO `clientes`(nombres, apellidos, telefono, direccion, correo_electronico) VALUES ('$nombres','$apellidos','$telefono','$direccion', '$correo_electronico')";
        $res= mysqli_query($this->con, $sql);
        
        if($res){
            return true;
        }else{
            return false;
        }
    }
    public function read(){
        $sql="SELECT * FROM clientes";
        $res=mysqli_query($this->con, $sql);
        return $res;
    }

    public function single_record($id){
        $sql="SELECT * FROM clientes where id='$id'";
        $res=mysqli_query($this->con, $sql);
        $return=mysqli_fetch_object($res);
        return $return;
    }

    //modificacion de la funcion single_record para consultar si el usuaria existe
    public function plogin($nick,$pass){
        $sql="SELECT * FROM iniciar where nick='$nick' and pass='$pass'";
        $res=mysqli_query($this->con, $sql);
        $return=mysqli_fetch_object($res);
        /*if ($return->==$) {
            header('Location: mipagina.php');
        }*/
        return $return;
    }


    public function update($nombres, $apellidos, $telefono, $direccion, $correo_electronico,$id){
        $sql="UPDATE clientes SET nombres= '$nombres', apellidos='$apellidos', telefono='$telefono', direccion='$direccion', correo_electronico='$correo_electronico' WHERE id=$id";
        $res= mysqli_query($this->con, $sql);
        
        if($res){
            return true;
        }else{
            return false;
        }
    
    }

    public function delete($id){
        $sql="DELETE FROM clientes WHERE id=$id";
        $res= mysqli_query($this->con, $sql);
        if($res){
            return true;
        }else{
            return false;
        }
    
    }


}


//index tambla registros
//create.php
//delete.php
//update.php

//MVC
//20-27
//GET BUSTRAPT.COM ICONOS CLAS fa-fa plus

?>
