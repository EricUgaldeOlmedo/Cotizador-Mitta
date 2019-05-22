

<?php 
session_start();
if(!isset($_SESSION["usuario"])){
header("location:../index.php");
}
?>


<?php 
require_once('conexion2.php');

if(isset($_REQUEST["usuario"])){

$usuario=$_REQUEST["usuario"];

}else{

	$usuario=$_SESSION["usuario"];
}



if(isset($_REQUEST["idcotizacion"])){
$idcotizacion=$_REQUEST["idcotizacion"];
}else{
$idcotizacion="";
}


$sql=$conn->query
("SELECT COTIZACION_idcotizacion,b.estado_cotizacion as estado,b.fecha_negocio as fechanegocio,fecha_asignacion ,a.usuario as ejecutivo,USUARIO_idusuario,EMPRESA_idempresa,nombre_empresa,
	c.usuario as ejecutivoleasing
 from asignacion as b
 join usuario as a on idusuario=USUARIO_idusuario
  join cotizacion as c on idcotizacion=COTIZACION_idcotizacion
 join empresa on idempresa=EMPRESA_idempresa
 WHERE a.usuario='$usuario'AND b.estado_cotizacion='asignada';
 
")->fetchAll(PDO::FETCH_OBJ);


?>


