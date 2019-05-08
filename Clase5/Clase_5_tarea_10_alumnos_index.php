<?php
#Incluir la clase
include "Clase_5_tarea_10_alumnos_promedio.php";
# Crea alumnos de la clase Alumno
//$alumno1= new Alumno();
$arrayAlumnos =array();
for ($i=0; $i < 10; $i++) { 
    $alumnoI = new Alumno();
    array_push(($arrayAlumnos),$alumnoI);
}
# Pone el nombre
//$alumno1->setNombre("Daniel");
$arrayAlumnos[0]->setNombre("Luis");
$arrayAlumnos[1]->setNombre("Miguel");
$arrayAlumnos[2]->setNombre("Leonardo");
$arrayAlumnos[3]->setNombre("Jorge");
$arrayAlumnos[4]->setNombre("Valeria");
$arrayAlumnos[5]->setNombre("Daniel");
$arrayAlumnos[6]->setNombre("Israel");
$arrayAlumnos[7]->setNombre("Carlos");
$arrayAlumnos[8]->setNombre("Israel");
$arrayAlumnos[9]->setNombre("Fernando");
//array_push(($alumno->array),20);
# Agrega una calificacion a una nueva unidad
//$alumno1->setUnit(70);
//$alumno1->setUnit(40);
//$alumno1->setUnit(30);
$arrayAlumnos[0]->setUnit(50);$arrayAlumnos[0]->setUnit(80);$arrayAlumnos[0]->setUnit(90);
$arrayAlumnos[1]->setUnit(40);$arrayAlumnos[1]->setUnit(60);$arrayAlumnos[1]->setUnit(90);
$arrayAlumnos[2]->setUnit(60);$arrayAlumnos[2]->setUnit(60);$arrayAlumnos[2]->setUnit(90);
$arrayAlumnos[3]->setUnit(70);$arrayAlumnos[3]->setUnit(60);$arrayAlumnos[3]->setUnit(90);
$arrayAlumnos[4]->setUnit(80);$arrayAlumnos[4]->setUnit(60);$arrayAlumnos[4]->setUnit(80);
$arrayAlumnos[5]->setUnit(90);$arrayAlumnos[5]->setUnit(60);$arrayAlumnos[5]->setUnit(90);
$arrayAlumnos[6]->setUnit(10);$arrayAlumnos[6]->setUnit(60);$arrayAlumnos[6]->setUnit(70);
$arrayAlumnos[7]->setUnit(30);$arrayAlumnos[7]->setUnit(60);$arrayAlumnos[7]->setUnit(80);
$arrayAlumnos[8]->setUnit(60);$arrayAlumnos[8]->setUnit(60);$arrayAlumnos[8]->setUnit(60);
$arrayAlumnos[9]->setUnit(70);$arrayAlumnos[9]->setUnit(60);$arrayAlumnos[9]->setUnit(30);
//print_r($a->array[0]);
//var_dump($a->array[1]);
//$ii=count($alumno->array);
//print_r($a->array[$ii-1]);
#IMPRIME LAS UNIDADES, EL PROMEDIO Y EL NOMBRE
//$alumno1->promediar(count($alumno1->array));
$arrayPromedios = array();
for ($i=0; $i < 10; $i++) { 
    echo "</br>Posición[".$i."]";
    $arrayAlumnos[$i]->promediar(count($arrayAlumnos[$i]->array));
    array_push($arrayPromedios,$arrayAlumnos[$i]->array[count($arrayAlumnos[$i]->array)-1]);
    
}
arsort($arrayPromedios,0);
echo "<pre>";
print_r($arrayPromedios);
echo "</pre>";
?>