<?php

require_once "models/enlaces.php";
require_once "models/crud.php";
require_once "controllers/controller.php";

$mvc = new MvcController();//INSTANCIA DE MvcController para usar la funcion pagina()
$mvc -> pagina();// muestra el template de views , que a su ves instancia un objeto tipo MvcController para usar una fuincion llamada enlacesPaginasController() que muestra la pagina que se requiera con una funcion en model para seleccionar lo que vera el usuario

?>