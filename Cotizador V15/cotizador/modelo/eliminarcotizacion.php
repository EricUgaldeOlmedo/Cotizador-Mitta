<?php

require_once('conexion2.php');

$idcotizacion=$_GET["idcotizacion"];


$conn->query("DELETE from cotizacion where idcotizacion='$idcotizacion'");

//header("Location:../vista/inicio.php?action=lista_cotizacion");
header("Location:../vista/ZHyvIA");

//echo "Cotizacion Numero $idcotizacion, fue eliminada!!";


?>

