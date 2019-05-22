<?php

class enlacesPaginas{


public function enlacesPaginasModel($enlacesModel){



	

	if($enlacesModel=="nuevo_usuario_adm"||
		$enlacesModel=="modificar_cotizacion_adm"||
		$enlacesModel=="cierresesion_adm"||
		$enlacesModel=="nueva_cotizacion_adm"||
		$enlacesModel=="nueva_empresa_adm"||
		$enlacesModel=="lista_cotizacion_adm"||
		$enlacesModel=="asigna_cotizacion_adm"||
		$enlacesModel=="modificar_cotizacion_adm"||
		$enlacesModel=="cambio_clave_adm"

)


	{        

$module = "../vista/".$enlacesModel.".php";


	}//este else if envia a la pagina de inicio, si no tiene pagina asociadada
	else if ($enlacesModel == "inicio_adm" ){

$module = "opciones.php";

	}

return $module;


     }


}



?>