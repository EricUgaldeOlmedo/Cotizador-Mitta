<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="vista/w3.css/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">


<script src="js/SpryValidationPassword.js" type="text/javascript"></script>
<script src="js/SpryValidationConfirm.js" type="text/javascript"></script>
<link href="css/SpryValidationPassword.css" rel="stylesheet" type="text/css">
<link href="css/SpryValidationConfirm.css" rel="stylesheet" type="text/css">

  <script type="text/javascript">
        function confirmar() {
            var confirmar = confirm("¿Confirma ingreso? ");
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

      <?php
session_start();
if(!isset($_SESSION["usuario"])){
header("location:../index.php");
}
?>

<?php include("session.php") ?>

<br><br><br><br><br>
<body>

<div class="w3-container w3-black" style="width:350px;height:50px">
  <h3>Ingreso nuevo usuario</h3>
</div>
<br>

<form class="w3-container" action="../modelo/nuevousuario_adm.php" method="post">

  <p hidden=""> 
  <input hidden readonly class="w3-input" type="text" name="administrador" style="width:250px;height:35px" value="<?php echo $_SESSION["usuario"];?>">
  </p>
  
  <p> 
  <input required="" placeholder="Nombre" class="w3-input" type="text" name="nombre" style="width:350px;height:35px">   
  </p>
  
  <p> 
 <select class="w3-select" name="perfil" style="width:350px;height:40px" >
    <option  value="" disabled ></option>
    <option required  value="ejecutivo_leasing">ejecutivo Leasing</option>
    <option required  value="administrador">administrador</option>
      <option required  value="ejecutivo_negocio">Ejecutivo Negocio</option>
    
  </select>  
  </p>
 
  <p> 
  <input required="" placeholder="@" class="w3-input" type="email" name="email" style="width:350px;height:35px">   
  </p>
 
  <p> 
  <input required="" placeholder="Usuario" class="w3-input" type="text" name="usuario" style="width:350px;height:35px">   
  </p>
 
   <p> 
   <span id="sprypassword1">
  <input required="" placeholder="Password" class="w3-input" type="password" name="password" id="password" style="width:350px;height:35px">   
  </p></span>
  
     <p> 
      <span id="spryconfirm1">
  <input required="" placeholder="confirmar password" class="w3-input" type="password" name="rePassword" id="rePassword" style="width:350px;height:35px"> <span class="confirmInvalidMsg">Password no coincide.</span></span>
  </p>
  
  
 
 <button onclick="return confirmar();" style="font-size :50px;"><i class="fas fa-check-circle"></i></button>

</form>
<script type="text/javascript">

var sprypassword1 = new Spry.Widget.ValidationPassword("sprypassword1");
var spryconfirm1 = new Spry.Widget.ValidationConfirm("spryconfirm1", "password");

</script>

</body>

</center>

</html>