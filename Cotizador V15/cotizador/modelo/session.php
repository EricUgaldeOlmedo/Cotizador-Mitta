

<?php 
require_once('conexion2.php');


	$usuario=$_SESSION["usuario"];

$sqln=$conn->query("
	SELECT nombre_coordinador,perfil
 FROM USUARIO where usuario='$usuario'")->fetchAll(PDO::FETCH_OBJ);



