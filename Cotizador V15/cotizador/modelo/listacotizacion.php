

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
SELECT
idcotizacion,
fecha,
estado_cotizacion,
usuario,
solicita,
nombre_empresa,
negocio_proyecto,
motivo,
tipo_unidad,
marca,
observaciones
FROM cotizacion join empresa
on idempresa=EMPRESA_idempresa join
 marca on idmarca=MARCA_idmarca
 WHERE usuario= '$usuario' AND estado_cotizacion='en_proceso' order by idcotizacion desc
")->fetchAll(PDO::FETCH_OBJ);

// NOTA: ESTADO_idestado='2' es el estado inicial del cotizacion su nombre es  "en_creacion"


// $sql=$conn->query("
// SELECT
// idcotizacion,
// fecha,
// usuario,
// solicita,
// nombre_empresa,
// negocio_proyecto,
// motivo,
// tipo,
// marca,
// observaciones
// FROM cotizacion join empresa
// on idempresa=EMPRESA_idempresa join
//  marca on idmarca=MARCA_idmarca
//  WHERE usuario LIKE '%$usuario%' order by idcotizacion desc
// ")->fetchAll(PDO::FETCH_OBJ);


?>