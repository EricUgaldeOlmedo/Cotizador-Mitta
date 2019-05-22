

<?php 
require_once('conexion2.php');

if(isset($_REQUEST["usuario"])){

$usuario=$_REQUEST["usuario"];

}else{

	$usuario=$_SESSION["usuario"];
}


$sql=$conn->query("
SELECT a.idcotizacion,a.usuario as solicita ,a.fecha as fecha_asignacion,nombre_empresa,nombre_coordinador
 from
 cotizacion as a join asignacion on idcotizacion=COTIZACION_idcotizacion
 join usuario on idusuario=USUARIO_idusuario
 join empresa on idempresa=EMPRESA_idempresa
 WHERE a.usuario= '$usuario'")->fetchAll(PDO::FETCH_OBJ);







?>