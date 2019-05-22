

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


$sql=$conn->query("
SELECT a.COTIZACION_idcotizacion AS NCotizacion,a.estado_cotizacion AS estado,c.usuario AS solicita,a.fecha_negocio,e.nombre_empresa from 
ASIGNACION as a join COTIZACION as c ON COTIZACION_idcotizacion=idcotizacion
join EMPRESA as e ON idempresa=EMPRESA_idempresa
 WHERE a.estado_cotizacion='en_asignacion'  order by a.COTIZACION_idcotizacion desc ;
")->fetchAll(PDO::FETCH_OBJ);






?>