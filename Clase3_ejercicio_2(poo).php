<?php

    #Clase 
    //Una clase es un modelo


    class Automovil{
        //PROPIEDADES: Son las caracteristicas que puede tener un objeto
        public $marca;
        public $modelo;
        //METODOS: Es el algoritmo asociado a un objeto que indica la capacidadde lo que éste puede  hacer. La unica diferencia entre métodos y función es que llamamos al método a FUNCIONES de una clase (en POO),mientras que llamamos funciones a los algoritmos de la programacion estructurada.

        public function mostrar(){
            echo "<p>Hola, soyun $this->marca, modelo $this->modelo</p>";
        }


    }

    //OBJETO: Es una entidad provista por métodos o mensajes a los cuales responde propiedades con valores concretos.
    $a = new Automovil();
    $a -> marca = "Chevrolet";
    $a -> modelo = "Chevy";
    $a->mostrar();

     $a0 = new Automovil();
     $a0 -> marca = "Ford";
     $a0 -> modelo = "Lobo";
     $a0->mostrar();

      $a1 = new Automovil();
      $a1 -> marca = "Honda";
      $a1 -> modelo = "CRV";
      $a1->mostrar();

      
      //Principios de la POO que se cumplen en este ejemplo:

      //1. ABSTRACION: Nuevos tipos de datos (el que quieras lo creas)
      //2. ENCAPSULAMIENTO: Organiza el código en grupos lógicos
      //3. OCULTAMIENTO: 















/*
    //Còdigo imperativo
    $automovil1 =(object)["marca"=>"Chevrolet","modelo"=>"Chevy"];
    $automovil2=(object)["marca"=>"Ford","modelo"=>"Lovo"];
    $automovil3 =(object)["marca"=>"Hona","modelo"=>"CRV"];
    


    //funcion con parametro para imprimir determinado automovil
    function mostrar($automovil){

        echo "<p> Hola soy un $automovil->marca, modelo $automovil->modelo</p>";
    }
  
    mostrar($automovil1);
    mostrar($automovil2);
    mostrar($automovil3);

?>*/