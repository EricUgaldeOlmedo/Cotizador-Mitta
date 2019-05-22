<?php

include("conexion2.php");
$COTIZACION_idcotizacion=$_POST["COTIZACION_idcotizacion"];
$estado_cotizacion=$_POST["estado_cotizacion"];
$uf_12_meses=$_POST["uf_12_meses"];
$uf_24_meses=$_POST["uf_24_meses"];
$uf_36_meses=$_POST["uf_36_meses"];
$uf_48_meses=$_POST["uf_48_meses"];
$uf_60_meses=$_POST["uf_60_meses"];
$uf_72_meses=$_POST["uf_72_meses"];
$observaciones=$_POST["observaciones"];
$fecha_valorizacion=$_POST["fecha_valorizacion"];
$folio=$_POST["folio"];



$sql2="UPDATE asignacion SET
 COTIZACION_idcotizacion=:idcotizacion,
 estado_cotizacion=:estado_cotizacion,
 uf_12_meses=:uf_12_meses,
 uf_24_meses=:uf_24_meses,
 uf_36_meses=:uf_36_meses,
 uf_48_meses=:uf_48_meses,
 uf_60_meses=:uf_60_meses,
 uf_72_meses=:uf_72_meses,
 observaciones=:observaciones,
 fecha_valorizacion=:fecha_valorizacion,
 folio=:folio
  WHERE COTIZACION_idcotizacion=:idcotizacion ";

$resultado=$conn->prepare($sql2);
$resultado->execute(array(
":idcotizacion"=>$COTIZACION_idcotizacion,
":estado_cotizacion"=>$estado_cotizacion,
":uf_12_meses"=>$uf_12_meses,
":uf_24_meses"=>$uf_24_meses,
":uf_36_meses"=>$uf_36_meses,
":uf_48_meses"=>$uf_48_meses,
":uf_60_meses"=>$uf_60_meses,
":uf_72_meses"=>$uf_72_meses,
":observaciones"=>$observaciones,
":fecha_valorizacion"=>$fecha_valorizacion,
":folio"=>$folio));


header("Location:../vista/5f825ebe6ff999871fbaf69e0ea1076c");