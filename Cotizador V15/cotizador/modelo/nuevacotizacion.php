<?php
include_once("conexion2.php");
$estado=$_POST["estado"];
$fecha=$_POST["fecha"];
$usuario=$_POST["usuario"];
$solicita=ucwords($_POST["solicita"]);
$empresa=$_POST["empresa"];
$negocio_proyecto=ucwords($_POST["negocio_proyecto"]);
$motivo=$_POST["motivo"];
$tipounidad=$_POST["tipounidad"];
$tipocabina=$_POST["tipocabina"];
$traccion=$_POST["traccion"];
$trasmision=$_POST["trasmision"];
$marca=$_POST["marca"];
$modelo=$_POST["modelo"];
$cantidad=$_POST["cantidad"];
$plazo=$_POST["plazo"];
$color=strtoupper($_POST["color"]);
$combustible=$_POST["combustible"];
$lugarentrega=$_POST["lugarentrega"];
$alarmarobo=$_POST["alarmarobo"];
$sensorretroceso=$_POST["sensorretroceso"];
$gps=$_POST["gps"];
$parachoque=$_POST["parachoque"];
//$barrasantivuelco=$_POST["barrasantivuelco"];
$barrasantivuelco=$_POST["barrasantivuelco"];
foreach($barrasantivuelco as $tipo){
    $valor = $tipo;
    $tipo_aux[] = $valor;}
$valores=implode('/',$tipo_aux);
$barras_valores="(".$valores.")";

$neumatico=$_POST["neumatico"];
$cupula=$_POST["cupula"];
$portaescala=$_POST["portaescala"];
$laminas=$_POST["laminas"];
$observaciones=strtoupper($_POST["observaciones"]);



 $sql1 = "INSERT INTO cotizacion(estado_cotizacion,fecha,usuario,solicita,EMPRESA_idempresa,negocio_proyecto,motivo,tipo_unidad,tipo_cabina,traccion,trasmision,MARCA_idmarca,modelo,cantidad,plazo,color,tipo_combustible,lugar_entrega,alarma_robo,sensor_retroceso,gps,parachoque,barras_antivuelco,neumaticos,cupula,portaescala,laminas_seguridad,observaciones) VALUES
 ('".$estado."',
  '".$fecha."',
  '".$usuario."',
  '".$solicita."',
  '".$empresa."',
  '".$negocio_proyecto."',
  '".$motivo."',
  '".$tipounidad."',
  '".$tipocabina."',
  '".$traccion."',
  '".$trasmision."',
  '".$marca."',
  '".$modelo."',
  '".$cantidad."',
  '".$plazo."',
  '".$color."',
  '".$combustible."',
  '".$lugarentrega."',
  '".$alarmarobo."',
  '".$sensorretroceso."',
  '".$gps."',
  '".$parachoque."',
  '".$barras_valores."',
  '".$neumatico."',
  '".$cupula."',
  '".$portaescala."',
  '".$laminas."',
  '".$observaciones."'

)";
   $conn->query($sql1);

header("Location:../vista/ZHyvIA");


//header("Location:../vista/inicio.php?action=lista_cotizacion");






?>
