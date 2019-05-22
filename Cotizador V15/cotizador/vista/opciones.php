 <?php
session_start();
if(!isset($_SESSION["usuario"])){
header("location:../index.php");
//si no encuentra usuario, devuelve al index

}
?> 

<?php echo "usuario:".$_SESSION["usuario"]."<br>";?>
