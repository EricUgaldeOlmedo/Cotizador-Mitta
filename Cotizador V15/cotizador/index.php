<!DOCTYPE html>


<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="vista/w3.css/w3.css">
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">


<style type="text/css">
body {
  background-image: url(vista/img/grupo_mitta.png);
  background-repeat: no-repeat;
  background-position: center;
  font-weight: bold;

}
</style>




<head>
  <title>index</title>
</head>

<br><br><br><br><br><br><br><br><br><br><br>
<center>


<body>


<form class="w3-container"  method="post" action="modelo/conexion.php">
 <?php
SESSION_START();
if(isset($_SESSION['fallo_login'])){
echo"<div style='color:red'> Usuario o contraseña invalidos!</div>";
}?>

<table >


<tr>
<td>
 
<i class="fas fa-user" style="font-size :30px;"></i></td>
<td>
  <input required placeholder="usuario" class="w3-input" type="text" name="usuario" style="width:250px;height:35px"></td></p>
  
</tr>

<tr>
  
<td height="30"></td>

</tr>
<tr>
  <td>

<i class="fas fa-key" style="font-size :30px;"></i></td>
<td>
  <input required placeholder="contraseña" class="w3-input" type="password" name="password" style="width:250px;height:35px"></td>
  <td>
   <button style="font-size :20px;"><i class="fas fa-lock-open"></i></i></button>
  </td>

</tr>
 </table>
 

</form>


</body>

</center>

</html>