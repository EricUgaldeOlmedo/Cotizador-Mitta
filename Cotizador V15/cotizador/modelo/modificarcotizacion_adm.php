<?php

include("conexion2.php");

$idcotizacion=$_POST["idcotizacion"];
$solicita=ucwords($_POST["solicita"]);
$empresa=$_POST["empresa"];
$negocio_proyecto=ucwords($_POST["negocio_proyecto"]);
$motivo=$_POST["motivo"];
$tipo_unidad=$_POST["tipo_unidad"];
$tipo_cabina=$_POST["tipo_cabina"];
$traccion=$_POST["traccion"];
$trasmision=$_POST["trasmision"];
$marca=$_POST["marca"];
$modelo=$_POST["modelo"];
$cantidad=$_POST["cantidad"];
$plazo=$_POST["plazo"];
$color=strtoupper($_POST["color"]);
$alarma_robo=$_POST["alarma_robo"];
$sensor_retroceso=$_POST["sensor_retroceso"];
$gps=$_POST["gps"];
$parachoque=$_POST["parachoque"];
$barras_antivuelco=$_POST["barras_antivuelco"];
$neumaticos=$_POST["neumaticos"];
$cupula=$_POST["cupula"];
$portaescala=$_POST["portaescala"];
$laminas_seguridad=$_POST["laminas_seguridad"];
$observaciones=strtoupper($_POST["observaciones"]);



$sql="UPDATE COTIZACION SET
 idcotizacion=:idcotizacion,
 solicita=:solicita,
 EMPRESA_idempresa=:empresa,
 negocio_proyecto=:negocio_proyecto,
 motivo=:motivo,
 tipo_unidad=:tipo_unidad,
 tipo_cabina=:tipo_cabina,
 traccion=:traccion,
 trasmision=:trasmision,
 MARCA_idmarca=:marca,
 modelo=:modelo,
 cantidad=:cantidad,
 plazo=:plazo,
 color=:color,
 alarma_robo=:alarma_robo,
 sensor_retroceso=:sensor_retroceso,
 gps=:gps,
 parachoque=:parachoque,
 barras_antivuelco=:barras_antivuelco,
 neumaticos=:neumaticos,
 cupula=:cupula,
 portaescala=:portaescala,
 laminas_seguridad=:laminas_seguridad,
 observaciones=:observaciones

  WHERE idcotizacion=:idcotizacion ";

$resultado=$conn->prepare($sql);
$resultado->execute(array(
":idcotizacion"=>$idcotizacion,
":solicita"=>$solicita,
":empresa"=>$empresa,
":negocio_proyecto"=>$negocio_proyecto,
":motivo"=>$motivo,
":tipo_unidad"=>$tipo_unidad,
":tipo_cabina"=>$tipo_cabina,
":traccion"=>$traccion,
":trasmision"=>$trasmision,
":marca"=>$marca,
":modelo"=>$modelo,
":cantidad"=>$cantidad,
":plazo"=>$plazo,
":color"=>$color,
":alarma_robo"=>$alarma_robo,
":sensor_retroceso"=>$sensor_retroceso,
":gps"=>$gps,
":parachoque"=>$parachoque,
":barras_antivuelco"=>$barras_antivuelco,
":neumaticos"=>$neumaticos,
":cupula"=>$cupula,
":portaescala"=>$portaescala,
":laminas_seguridad"=>$laminas_seguridad,
":observaciones"=>$observaciones

));


header("Location:../vista/inicio_adm.php?action=lista_cotizacion_adm");
//header("Location:../vista/aHZggg");

aHZggg
 ?>
