<?php 

class Paginas{
	
	public function enlacesPaginasModel($enlaces){


		if($enlaces == "Carreras"||$enlaces == "ingresar" || $enlaces == "usuarios" || $enlaces == "registroMaestro" || $enlaces == "editar" || $enlaces == "editarC"|| $enlaces == "editarA"|| $enlaces == "editarG"|| $enlaces == "editarMA"|| $enlaces == "Alumnos"){

			$module =  "views/modules/".$enlaces.".php";
		
		}

		else if($enlaces == "index"){

			$module =  "views/modules/registro.php";
		
		}

		else if($enlaces == "ok"){

			$module =  "views/modules/registro.php";
		
		}

		else if($enlaces == "fallo"){

			$module =  "views/modules/ingresar.php";
		
		}

		else if($enlaces == "cambio"){

			$module =  "views/modules/usuarios.php";
		
		}

		else{

			$module =  "views/modules/registro.php";

		}
		
		return $module;

	}

}

?>