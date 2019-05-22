<?php

/*conexion.php*/
// $servername = "localhost"; /* Servidor */
// $username = 'ifigueroa';  Usuario de la BD root
// $password = 'cm1234cm/'; /* Password o Clave cm2668  */
// $bd ="logistica"; /* BD */

$servername = "localhost"; /* Servidor */
$username = 'root'; /* Usuario de la BD root*/
$password = 'cm2668'; /* Password o Clave cm2668  */
$bd ="cotizador"; /* BD */




try {
    $conn = new PDO("mysql:host=$servername;dbname=$bd", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo " $username:     "; 
    }
catch(PDOException $e)
    {
    echo "Fallo de conexion!!! !: " . $e->getMessage();
    }

?>