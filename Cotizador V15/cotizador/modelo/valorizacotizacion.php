<?php 
require_once('conexion2.php');
if(isset($_REQUEST["idcotizacion"])){
$idcotizacion=$_REQUEST["idcotizacion"];
}else{
$idcotizacion="";
}

//lista la asignacion con los campos que faltan por listar.
$sql=$conn->query
("SELECT COTIZACION_idcotizacion,b.estado_cotizacion as estado,b.fecha_negocio as fechanegocio,fecha_asignacion ,a.usuario as ejecutivo,USUARIO_idusuario,EMPRESA_idempresa,nombre_empresa,
	c.usuario as ejecutivoleasing,uf_12_meses,uf_24_meses,uf_36_meses,uf_48_meses,uf_60_meses,uf_72_meses
 from asignacion as b join usuario as a on idusuario=USUARIO_idusuario join cotizacion as c on idcotizacion=COTIZACION_idcotizacion join empresa on idempresa=EMPRESA_idempresa WHERE COTIZACION_idcotizacion='$idcotizacion';")->fetchAll(PDO::FETCH_OBJ);


?>


