<?php
/* Iniciamos PHP */

include_once("conexion2.php");

$administrador=$_POST["administrador"];

$nombre=ucwords( $_POST["nombre"]);//ingresa con mayuscula la primera letra de la palabra
$perfil=$_POST["perfil"];
$email=strtolower($_POST["email"]);//ingresa mail en minuscula
$usuario=strtolower($_POST["usuario"]);//ingresa usuario en minuscula
//$password=$_POST["password"]);
$password=md5($_POST["password"]);



$sql="SELECT * FROM usuario WHERE usuario =?";
$sentencia=$conn->prepare($sql);
$sentencia->execute(array($usuario));
$resultado=$sentencia->fetch();

if($resultado){

//header("Location:../index.php?action=vista_icontratista");
	echo "   Usuario $usuario  existe!!!";

	die();
	
}else{



$sql2 = "INSERT INTO usuario(
administrador,
nombre_coordinador,
perfil,
email,
usuario,
password
) 
VALUES
(
'".$administrador."',
'".$nombre."',
'".$perfil."',
'".$email."',
'".$usuario."',
'".$password."')";

  $conn->query($sql2);


header("Location:../vista/ffd57a055580b9ed747549578edd0244");

//header("Location:../vista/inicio.php?action=nuevo_usuario");



}



?>



