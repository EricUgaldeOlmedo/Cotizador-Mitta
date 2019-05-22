<?php include("../modelo/listacotizacion_eje_n.php"); ?><!--Lista las cotizacion asociadas al usuario -->
 

<!--    GENERAR UN MODELO LISTARUSUARIO.PHP DESDE HAY PASAR POR PARAMETRO EL USUARIO. LUEGO REALIZAR UN LISTADO EN ESTA PAGINA CON UN FOREACH Y DESDE ES LISTADO ENTREGAR EL PARAMETRO DEL NOMBRE DEL COORDINADOR A UN INPUT. -->

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="vista/w3.css/w3.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


  <title>Cotizaciones pendientes</title>

<link href="css/boton.css" rel="stylesheet" type="text/css">
<style type="text/css">
.negrilla {
  font-weight: bold;
}
.centro {
  text-align: center;
}
.centro {
  text-align: center;
}
</style>


<!-- Script que envia mensaje de confirmacion envio de cotizacion-->
<script type="text/javascript">
        function confirmEnvio() {
            var confirmar = confirm("¿Confirma envio de Cotizacion a Negocio ? ");
            if (confirmar) {
                return true;
            } else {
                return false;
            }
        }
    </script>


<!-- Script que oculta formulario para editar la cotizacion-->
<script type="text/javascript">
$(document).ready(function(){
  $("#show").click(function(){
    $("#element").show(1000);
  });
  $("#hide").click(function(){
    $("#element").hide(1000);
  });
});
</script>

</head>
<body>

   <?php
session_start();
if(!isset($_SESSION["usuario"])){
header("location:../index.php");
}
?>

<br>
<div align="right">
<?php require("session.php") ?>
</div>
  <center>
   
        <!--   <form action="" method="POST">
 En el form, no es necesario en action enviar a una pagina ya que ?php include("../modelo/modelo_ver_hist_asig.php"); ?> esta haciendo la referencia 
 usuario <input type="text" name="usuario" style="width:90px;height:30px" value="<?php echo $_SESSION["usuario"] ?>" >
 <input type="submit" name="" value="BUSCAR" class="button" > 


</form>-->


<center>

<table border="0" class="w3-container">
  
 <h3>COTIZACIONES PENDIENTES POR VALORIZAR</h3>
<!--=este foreach esta contado a modelo_borrar.php y actualizar a vista_actualizar.php=====-->

    <!-- Esta parte es la lista que se va haciendo cuando se ingresa un nuevo registro -->


<tr class="centro">
<td bgcolor="#666666" class="primera_fila" style="width:70px;height:15px">N° Cot</td>
<td bgcolor="#666666" class="negrilla" style="width:250px;height:15px">EMPRESA</td>
<td bgcolor="#666666" class="negrilla" style="width:170px;height:15px">SOLICITA</td>
<td bgcolor="#666666" class="primera_fila"style="width:170px;height:15px">FECHA NEGOCIO</td>
<td bgcolor="#666666" class="primera_fila"style="width:170px;height:15px">FECHA ASIGNACION</td>
<td bgcolor="#666666" class="primera_fila"style="width:70px;height:15px">EJEC. NEGOCIO</td>
<td bgcolor="#666666" class="primera_fila"style="width:70px;height:15px">    </td>
<td bgcolor="#666666" class="primera_fila"style="width:70px;height:15px">    </td>
<td colspan="4" bgcolor="#666666" class="negrilla" style="width:70px;height:15px"></td>


</tr>

   <?php foreach($sql as $n):?>  <br>

   <ul> <tr>
      <td height="46" class="centro"><?php echo $n->COTIZACION_idcotizacion ?> </td>
      <td height="46" class="centro"><?php echo $n->nombre_empresa?> </td>
      <td height="46" class="centro"><?php echo $n->ejecutivoleasing?> </td>
            <td><div align="center" class="centro"><?php echo $n->fechanegocio?> </div></td>
      <td><div align="center" class="centro"><?php echo $n->fecha_asignacion ?> </div></td>
      <td><div align="center" class="centro"><?php echo $n->ejecutivo ?> </div></td>
    
      
<!-- CREAR PDF -->
<form  action="../modelo/pdf.php" method="POST" >
        <td><div align="center" >
          <input type="text" hidden name="idcotizacion" value="<?php echo $n->COTIZACION_idcotizacion?>" style="width:1px;height:1px">   
          <button id="" style="font-size: 30px"><i class="far fa-file-pdf"></i></button>      
        </div>
      </form>

      <!-- MODIFICAR -->

<!-- Lista los datos para modificar, no necesita llamar al action, ya que usa los datos del foreach -->

<form  action="" method="POST" >
        <td><div align="center">
          <input type="text" hidden  name="idcotizacion" value="<?php echo $n->COTIZACION_idcotizacion?>" style="width:1px;height:1px">     
          <button  id="show" style="font-size: 30px"><i class="far fa-edit"></i></button>        
        </div>

</form>    
     
<form  action="../modelo/enviarcotizacion.php"  method="POST" id="formulario">
        <td><div align="center">

   <input type="text" hidden name="fecha_negocio" value="<?php echo date('Y-m-d'); ?>" style="width:1px;height:1px">

          <input type="text" hidden name="idcotizacion" value="<?php echo $n->idcotizacion?>" style="width:1px;height:1px">

          <input type="text" hidden name="estado" value="en_asignacion" style="width:1px;height:1px">   

           <input type="text" hidden name="usuario" value="<?php echo $_SESSION["usuario"]?>" style="width:1px;height:1px">

            <input type="text"  hidden name="empresa" value="<?php echo $n->nombre_empresa?>" style="width:1px;height:1px"> 

         
      <button  onclick="return confirmEnvio();"  style="font-size: 30px" ><i class="far fa-thumbs-up"  ></i></button>   
        </div>

      </form>

    
    
      <?php endforeach;?>  
      <div class="loader"></div>
    </tr> 

</table>


</center>
 <div id="element" style="display: block;">
 <?php include("valoriza_cotizacion.php"); ?>
</div>

</tr>
</table>

</center>


</body>
</html>

