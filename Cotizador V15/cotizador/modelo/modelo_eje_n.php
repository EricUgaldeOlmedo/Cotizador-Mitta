<?php

class enlacesPaginas{


public function enlacesPaginasModel($enlacesModel){



	

	if(	

		$enlacesModel=="lista_cotizacion_eje_n"||
        $enlacesModel=="nueva_empresa_eje_n"||
        $enlacesModel=="cambio_clave_eje_n"||
        $enlacesModel=="valoriza_cotizacion"||
		$enlacesModel=="cierresesion"	

)


	{        

$module = "../vista/".$enlacesModel.".php";


	}//este else if envia a la pagina de inicio, si no tiene pagina asociadada
	else if ($enlacesModel == "inicio_eje_n" ){

$module = "opciones.php";

	}

return $module;


     }


}



?>