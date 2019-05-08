<?php
    #Incluir la clase
    include "Clase_5_persona.php";

    #instanciar la clase

    $persona = new Persona();

    #Asignar valores a las propiedades
    $persona->setEdad(30);
    $persona->setAltura(177);
    $persona->setPeso(80);


    #impreciones de los resultados
    echo "<br> Edad: ".$persona->edad;
    echo "<br> Altura: ".$persona->altura;
    echo "<br> Peso: ".$persona->peso;
    echo "<br> IMC: ".$persona->imc();

?> 
