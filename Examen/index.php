<?php
require_once "controllers/controller.php";

require_once "models/crud.php";

$mvc = new MvcController();#crea un objeto de Mvc Y luego accede a la funcion pagina 
$mvc -> pagina();

?>