<?php

class MvcControllers{


	#Llama  a la plantilla
	#----------------------------------

public function plantillas(){

include "plantilla.php";

}
	#Interaccion del usuario
	#----------------------------------

public function enlacesPaginasController(){

if(isset($_GET["action"])) {#iNDICA, SI ACTION TRAE CONTENIDO EJECUTE $enlacesController=$_GET["action"];

$enlacesController = $_GET["action"];

} 

else {#SI NO EJECUTE $enlacesController="inicio.php"

$enlacesController="inicio";

}

$respuesta=enlacesPaginas::enlacesPaginasModel($enlacesController);

include $respuesta;

}



}

?>