<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="vista/w3.css/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

 <script type="text/javascript">
        function confirmar() {
            var confirmar = confirm("¿Confirma Cambio de Clave? ");
            if (confirmar) {
                return true;
            } else {
                return false;
            }
        }
    </script>
<title>Documento sin título</title>

</style>
</head>



<body>
   <?php
session_start();
if(!isset($_SESSION["usuario"])){
header("location:../index.php");
}
?>

<div align="right">
<?php echo "usuario:".$_SESSION["usuario"]."<br>"; ?>
</div>
<center>
<form action="../modelo/cambioclave_adm.php" method="POST">
<br><br><br><br><br><br>



  <table width="339" border="0">
    <tr>
      <td width="162">&nbsp;</td>
      <td width="161">&nbsp;</td>
    </tr>
    <tr>
      
        <input hidden type="text" name="usuario" value="<?php echo $_SESSION["usuario"]?>" id="usuario"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Ingrese password actual</td>
      <td><label for="pass_actual"></label>
        <input type="password" name="pass_actual" class="w3-input" id="pass_actual"></td>
    </tr>
    <tr>
     <br>
    </tr>
    <tr>
      <td>Ingrese nuevo password</td>
      <td><label for="pass_nuevo"></label>
        <input type="password" name="pass_nuevo" class="w3-input" id="pass_nuevo"><button onclick="return confirmar();" style="font-size :20px;"><i class="fas fa-exchange-alt"></i></button></td>

    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
     
    </tr>
      
    <tr>
   
    </tr>
     
  </table>


</form>
</center>
</body>


</html>
