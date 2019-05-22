<?php


include_once("../modelo/conexion2.php");

// $sql2="SELECT * from empresa";

// $sentencia=$conn->prepare($sql2);
// $sentencia->execute(array());
// $resultado=$sentencia->fetch();


$sql2="SELECT * from empresa";

$sentencia=$conn->prepare($sql2);
$sentencia->execute();
$resultado=$sentencia->fetch();


?>	