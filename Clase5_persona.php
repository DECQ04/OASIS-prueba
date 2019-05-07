<?php


// DEFINIR LA CLASE PERSONA
class Persona{

    public $edad;
    public $altura;
    public $peso;


//definir Método obtención de datos
//getters
    public function getEdad(){
     return $this->edad;   
    }
    
    public function getAltura(){
        return $this->altura;   
       }
    
    public function getPeso(){
        return $this->peso;   
       }
       // Definir métodos asignación de datos
       //setters
    public function setEdad($valor){
        $this->edad=$valor;
    }
    public function setPeso($valor){
        $this->peso=$valor;
    }
    public function setAltura($valor){
        $this->altura=$valor;
    }

    //Método de calculo accediendo a las propiedades
    public function imc(){

        return $this->peso/($this->altura*$this->altura);
    }
    // accediendo a los metodos get
    public function imc2(){

        return $this->getPeso()/($this->getAtura()*$this->getAaltura());
    }
}
?>