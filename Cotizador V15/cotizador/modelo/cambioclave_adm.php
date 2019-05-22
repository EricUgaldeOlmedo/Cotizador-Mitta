<?php

include("conexion2.php");


$pass_actual=md5($_POST["pass_actual"]);

//esta parte consulta a la base si exite el password, si no exite, da el mensaje de error
$sql0="SELECT password FROM usuario WHERE password =?";
$sentencia=$conn->prepare($sql0);
$sentencia->execute(array($pass_actual));
$resultado=$sentencia->fetch();

if($resultado==0){

  echo "Password ingresado no es valido";

  die();
  
}else{


$usuario=$_POST["usuario"];
$pass_nuevo=md5($_POST["pass_nuevo"]);



$sql1="UPDATE USUARIO SET usuario=:usuario, password=:pass_nuevo WHERE usuario=:usuario ";

$resultado=$conn->prepare($sql1);
$resultado->execute(array(":usuario"=>$usuario,":pass_nuevo"=>$pass_nuevo));

}

 //echo "Password cambiado con exito!!!!";


 echo '<script>
          alert("Password cambiado con exito!!!!");
          </script>'; 

header("Location:../vista/d9b28f0cfd20985f1c2c59715451c0cb");
//header("Location:../vista/inicio_adm.php?action=cambio_clave_adm");
?>