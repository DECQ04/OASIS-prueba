<?php 

class Paginas{
	
	public function enlacesPaginasModel($enlaces){//recive un string de otras acciones del url y redirecciona 

		##Tiene editarR =reservaciones, editarC=clientes , editarH =habitaciones , registroC =clientes y  registroH =habitaciones
		if($enlaces == "ingresar" || $enlaces == "usuarios" || $enlaces == "editarR"|| $enlaces == "editar"|| $enlaces == "editarH" || $enlaces == "editarC"|| $enlaces == "salir"|| $enlaces== "reservar"|| $enlaces=="registroC"|| $enlaces=="registroH"){

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
		else if($enlaces == "okR"){//=reservar

			$module =  "views/modules/reservar.php";
		
		}
		else if($enlaces == "okCR"){//=registro clienters

			$module =  "views/modules/registroC.php";
		
		}
		else if($enlaces == "okHR"){//=registro habitaciones

			$module =  "views/modules/registroH.php";
		
		}
			
		else{

			$module =  "views/modules/registro.php";

		}
	
		return $module;

	}

}

?>