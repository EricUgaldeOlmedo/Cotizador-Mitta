<?php
/* Iniciamos PHP */

include_once("conexion2.php");

$administrador=$_POST["administrador"];
$nombre_emp=ucwords($_POST["nombre_emp"]);
$rut=$_POST["rut"];
$dv=$_POST["dv"];
$rubro_emp=ucwords($_POST["rubro_emp"]);
$direccion=ucwords($_POST["direccion"]);
$comuna=ucwords($_POST["comuna"]);




$sql="SELECT * FROM empresa WHERE rut_empresa =?";
$sentencia=$conn->prepare($sql);
$sentencia->execute(array($rut));
$resultado=$sentencia->fetch();

if($resultado){

//header("Location:../index.php?action=vista_icontratista");
	echo "   Rut de empresa $rut -$dv  ya fue ingresado por $administrador!!!";

	die();
	
}else{

include_once("validarut.php");

if($dv==$digito){


$sql2 = "INSERT INTO empresa(
administrador,
nombre_empresa,
rut_empresa,
dv,
rubro_empresa,
direccion,
comuna

) 
VALUES
(
'".$administrador."',
'".$nombre_emp."',
'".$rut."',
'".$dv."',
'".$rubro_emp."',
'".$direccion."',
'".$comuna."')";
  $conn->query($sql2);


//header("Location:../vista/inicio.php?action=nueva_empresa");

  echo "Datos ingresados correctamente!!!.";


}else{
echo " EL RUT DE LA EMPRESA, NO ES VALIDO!!!!";
}

}



?>



