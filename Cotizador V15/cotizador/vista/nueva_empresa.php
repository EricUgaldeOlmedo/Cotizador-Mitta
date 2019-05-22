<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="vista/w3.css/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">


  <script type="text/javascript">
        function confirmar() {
            var confirmar = confirm("¿Confirma ingreso nueva empresa? ");
            if (confirmar) {
                return true;
            } else {
                return false;
            }
        }
    </script>


<head>
  <title>Nuevo Usuario</title>

</head>

<br><br><br>
<center>
<body>

    <?php
session_start();
if(!isset($_SESSION["usuario"])){
header("location:../index.php");
}
?>

<?php include("session.php") ?>

<br><br><br><br><br>

<div class="w3-container w3-black" style="width:350px;height:50px">
  <h3>Ingreso nueva empresa</h3>
</div>
<br>

<form class="w3-container" action="../modelo/nuevaempresa.php" method="post">

  <p hidden=""> 
  <input hidden readonly class="w3-input" type="text" name="administrador" style="width:250px;height:35px" value="<?php $n->nombre_coordinador ?>">
  </p>
  
  
  <p> 
  <input required="" placeholder="Nombre empresa" class="w3-input" type="text" name="nombre_emp" style="width:350px;height:35px">   
  </p>
  
<table>
<tr>
  <p> 
 <td> <input required="" placeholder="Rut" class="w3-input" type="number" name="rut" min="1000000" max="99999999" style="width:300px;height:35px"></td>
  
  <td> <input required="" placeholder="Dv" class="w3-input" type="text" name="dv" maxlength="1" 
   style="width:50px;height:35px"></td>

</p>

</tr> 

 </table>
  <p> 
  <input required="" placeholder="Rubro" class="w3-input" type="text" name="rubro_emp" style="width:350px;height:35px">   
  </p>
 
   <p> 
  <input required="" placeholder="Dirección" class="w3-input" type="text" name="direccion" style="width:350px;height:35px">   
  </p>
  
     <p> 
  <input required="" placeholder="Comuna" class="w3-input" type="text" name="comuna" style="width:350px;height:35px">   
  </p>
  
  
 
 <button onclick="return confirmar();" style="font-size :50px;"><i class="fas fa-check-circle"></i></button>

</form>


</body>

</center>

</html>