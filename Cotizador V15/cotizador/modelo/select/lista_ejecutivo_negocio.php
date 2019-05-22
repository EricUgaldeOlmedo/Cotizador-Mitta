

<?php


include_once("../modelo/conexion2.php");

$sql2="SELECT * from usuario where perfil='ejecutivo_negocio' ORDER BY nombre_coordinador asc";

$sentencia=$conn->prepare($sql2);
$sentencia->execute();
$resultado=$sentencia->fetch();


?>