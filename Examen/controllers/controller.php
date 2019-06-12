<?php

class MvcController{

	#Funcion de llamar template
	#---------------------------------------------------
	public function pagina(){	
		
		include "views/template.php"; //llama a la template de la carpeta views
	
	}


	#REGISTRO DE ALUMNO
	#----------------------------------------------
	public function registroAlumnoController(){

		if(isset($_POST["nombreRegistro"])){

			$datosController = array( "matricula"=>$_POST["matriculaRegistro"], 
									  "nombre"=>$_POST["nombreRegistro"],
									  "apellido"=>$_POST["apellidoRegistro"],
									  "anio_de_ingreso"=>$_POST["anio_de_ingresoRegistro"],
									  "carrera"=>$_POST["carreraRegistro"],
									  "id_grupo"=>$_POST["id_grupoRegistro"]);

			$respuesta = Datos::registroAlumnoModel($datosController, "alumnos");


		}

	}

	#VISTA DE ALUMNOS
	#----------------------------
	public function vistaAlumnoController(){
		$respuesta = Datos::vistaAlumnoModel("alumnos");

		#Es un ciclo por cad item, por ejemplo,	<td>'.$item["matricula"].'</td>
		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["matricula"].'</td>
				<td>'.$item["nombre"].'</td>
				<td>'.$item["apellidos"].'</td>
				<td>'.$item["anio_de_ingreso"].'</td>
				<td>'.$item["carrera"].'</td>
				<td>'.$item["id_grupo"].'</td>
				<td><button>Editar</button></a></td>
				<td><a href="idBorrar='.$item["id"].'"><button>Borrar</button></a></td>
			</tr>';

		}

	}
	#BORRAR ALUMNOS
	#------------------------
	public function borrarAlumnoController(){
		if(isset($_GET["idBorrar"])){//si esta el id por metodo post, nombra como idBorrar
			$datosController = $_GET["idBorrar"];//datosController es id para borrar
			$respuesta = Datos::borrarAlumnoModel($datosController, "alumnos");//respuesta es el return del metodo borrar que solo ocupa el id para una sentencia sql
			}}}?>
