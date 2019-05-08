<?php

class Alumno
{       # Propiedades de la clase
         var $array= array();
         var $nombre="NULL";
     # Hace todo, casi, saca el promedio de las unidades que tenga el alumno y agrega 60 si es menor a 60
     function promediar($ii){
        
        $suma=0;
        $unidad=1;
        echo "</br>".$this->nombre;
        for ($i=0; $i < $ii; $i++) 
        {  
                 $suma = $suma+$this->array[$i];
                echo "</br>"."Unidad: ".$unidad." :".$this->array[$i];
                $unidad+=1;
               
                
        }
        $promedio = $suma/($ii);
        if($promedio<60){
            $promedio=60;
        }
        //$this->array[$ii-1]=$promedio;
        array_push(($this->array),$promedio); 
        echo "</br>Promedio: ";
        print_r($promedio)."</br>";
        

     }
     # Pone nombre al alumno
     public function setNombre($valor){
        $this->nombre=$valor;
    }
    # Pone la calificaión en el array de se usa para guardar las unidades (inicia vacio)
    public function setUnit($seven){
        array_push(($this->array),$seven);
    }
}
?>