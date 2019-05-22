<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

<?php



$servername = "localhost"; /* Servidor */
$username = 'root'; /* Usuario de la BD root*/
$password = 'cm2668'; /* Password o Clave cm2668  */
$bd ="cotizador"; /* BD */




try {
    $conn = new PDO("mysql:host=$servername;dbname=$bd", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


if(

    $sql="SELECT usuario,password,perfil FROM usuario where usuario=:usuario AND password=:password AND perfil='usuario'"){
    $resultado=$conn->prepare($sql);
    $usuario=htmlentities(addslashes($_POST["usuario"]));
    $password=htmlentities(addslashes(md5($_POST["password"])));
    $resultado->bindValue(":usuario",$usuario);
    $resultado->bindValue(":password",$password);  
    $resultado->execute();
    $valida=$resultado->rowCount();
    if($valida!=0 ){
    session_start();
    $_SESSION["usuario"]=$_POST["usuario"];
    $resultado->execute(); 
    header("location:../vista/6mwZHDL");
    //  header("location:../vista/inicio.php");


    }else if( $sql1="SELECT usuario,nombre_coordinador,password,perfil FROM usuario where usuario=:usuario AND password=:password AND perfil='administrador'"){
    $resultado=$conn->prepare($sql1);
    $usuario=htmlentities(addslashes($_POST["usuario"]));
    $password=htmlentities(addslashes(md5($_POST["password"])));
    $resultado->bindValue(":usuario",$usuario);
    $resultado->bindValue(":password",$password);  
    $resultado->execute();
    $valida=$resultado->rowCount();
    if($valida!=0 ){
    session_start();
    $_SESSION["usuario"]=$_POST["usuario"];
    
    $resultado->execute(); 
    //header("location:../vista/inicio.php?action=nueva_cotizacion");
      header("location:../vista/6qMWAR");
       //header("location:../vista/inicio_adm.php");


    }else if( $sql2="SELECT usuario,nombre_coordinador,password,perfil FROM usuario where usuario=:usuario AND password=:password AND perfil='ejecutivo_negocio'"){
    $resultado=$conn->prepare($sql2);
    $usuario=htmlentities(addslashes($_POST["usuario"]));
    $password=htmlentities(addslashes(md5($_POST["password"])));
    $resultado->bindValue(":usuario",$usuario);
    $resultado->bindValue(":password",$password);  
    $resultado->execute();
    $valida=$resultado->rowCount();
    if($valida!=0 ){
    session_start();
    $_SESSION["usuario"]=$_POST["usuario"];
    
    $resultado->execute(); 
    //header("location:../vista/inicio.php?action=nueva_cotizacion");
      header("location:http://superpatanegra.com/texto/index.php");
       //header("location:../vista/inicio_adm.php");

}else{

    session_start();
    $_SESSION["fallo_login"]='Fallo inicio de sesion';
    header("location:../index.php");
    exit();
    echo "Usuario o contraseña invalido";
    }

}

}


}

//----------------------------------------------------------

    }catch(PDOException $e){
    echo "Fallo de conexion!!! !: " . $e->getMessage();
    }



?>




</body>
</html>