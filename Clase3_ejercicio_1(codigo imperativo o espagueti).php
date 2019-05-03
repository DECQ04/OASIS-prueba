<?php
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

?>