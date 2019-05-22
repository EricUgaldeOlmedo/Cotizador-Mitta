<?php

class enlacesPaginas{


public function enlacesPaginasModel($enlacesModel){



	

	if($enlacesModel=="nuevo_usuario"||
		$enlacesModel=="modificar_cotizacion"||
		$enlacesModel=="cierresesion"||
		$enlacesModel=="nueva_cotizacion"||
		$enlacesModel=="nueva_empresa"||
		$enlacesModel=="lista_cotizacion"||
		$enlacesModel=="cotizacion_valorizada"||
		$enlacesModel=="nueva_cotizacion"||
		$enlacesModel=="cambio_clave"||
		$enlacesModel=="plantilla"||
		$enlacesModel=="session"


)


	{        

$module = "../vista/".$enlacesModel.".php";


	}//este else if envia a la pagina de inicio, si no tiene pagina asociadada
	else if ($enlacesModel == "inicio" ){

$module = "opciones.php";

	}

return $module;


     }


}



?>