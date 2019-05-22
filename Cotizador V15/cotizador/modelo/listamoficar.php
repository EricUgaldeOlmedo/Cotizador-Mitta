<?php
require_once('conexion2.php');


if(isset($_REQUEST["idcotizacion"])){
$idcotizacion=$_REQUEST["idcotizacion"];
}else{
$idcotizacion="";
}


	// ESTA ES LA PARTE DONDE SE LLAMA LOS DATOS Y MUESTRA EL RESULTADO EN COLUMNAS EN MODIFICAR.PHP
	
	$sql3=$conn->query("
SELECT
idcotizacion,
fecha,
usuario,
solicita,
EMPRESA_idempresa,
nombre_empresa,
negocio_proyecto,
motivo,
tipo_unidad,
tipo_cabina,
traccion,
trasmision,
MARCA_idmarca,
marca,
modelo,
cantidad,
plazo,
color,
alarma_robo,
sensor_retroceso,
gps,
parachoque,
barras_antivuelco,
neumaticos,
cupula,
portaescala,
laminas_seguridad,
observaciones
FROM cotizacion join empresa
on idempresa=EMPRESA_idempresa join
 marca on idmarca=MARCA_idmarca
 WHERE idcotizacion='$idcotizacion'")->fetchAll(PDO::FETCH_OBJ);

//header("Location:../vista/inicio.php?action=modificar_cotizacion");
	
?>