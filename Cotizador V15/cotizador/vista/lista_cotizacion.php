<?php include("../modelo/listacotizacion.php"); ?>
  <?php include("../modelo/select/lista_empresa.php"); ?>
  <?php include("../modelo/select/lista_marca.php"); ?>

 

<!--    GENERAR UN MODELO LISTARUSUARIO.PHP DESDE HAY PASAR POR PARAMETRO EL USUARIO. LUEGO REALIZAR UN LISTADO EN ESTA PAGINA CON UN FOREACH Y DESDE ES LISTADO ENTREGAR EL PARAMETRO DEL NOMBRE DEL COORDINADOR A UN INPUT. -->

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="vista/w3.css/w3.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" type="text/css" href="vista/css/loader.css">
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

<!-- Script que envia mensaje de confirmacion de borrado-->
<script type="text/javascript">
        function confirmDelete() {
            var confirmar = confirm("¿Realmente desea eliminar Cotizacion ? ");
            if (confirmar) {
                return true;
            } else {
                return false;
            }
        }
    </script>


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




<!-- Script el cual hace click en el boton ver pdf automaticamente. Esto hace que lo cree. -->
<script type="text/javascript">
 $(document).ready(function(){ $('#asignar').trigger('click'); }); 

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
  
 <h3>COTIZACIONES PARA ENVIAR A NEGOCIO</h3>
<!--=este foreach esta contado a modelo_borrar.php y actualizar a vista_actualizar.php=====-->

    <!-- Esta parte es la lista que se va haciendo cuando se ingresa un nuevo registro -->

<br>
<tr class="centro">
<td bgcolor="#666666" class="primera_fila" style="width:70px;height:15px">N° Cot</td>
<td bgcolor="#666666" class="primera_fila"style="width:70px;height:15px">FECHA</td>
<td bgcolor="#666666" class="negrilla" style="width:170px;height:15px">SOLICITANTE</td>
<td bgcolor="#666666" class="negrilla" style="width:170px;height:15px">EMPRESA</td>
<td bgcolor="#666666" class="negrilla" style="width:170px;height:15px">NEGOCIO</td>
<td bgcolor="#666666" class="negrilla" style="width:100px;height:15px">TIPO</td>
<td bgcolor="#666666" class="negrilla" style="width:90px;height:15px">MARCA</td>
<td colspan="4" bgcolor="#666666" class="negrilla" style="width:90px;height:15px">OPCIONES</td>

</tr>

   <?php foreach($sql as $n):?>  <br>
    <tr>
      <td height="46" class="centro"><?php echo $n->idcotizacion ?> </td>
      <td class="centro"><?php echo $n->fecha?> </td>  
      <td><div align="center" class="centro"><?php echo $n->solicita ?> </div></td>
       <td><div align="center" class="centro"><?php echo $n->nombre_empresa ?> </div></td>
      <td><div align="center" class="centro"><?php echo $n->negocio_proyecto ?> </div></td>
      <td><div align="center" class="centro"><?php echo $n->tipo_unidad ?> </div></td>
      <td><div align="center" class="centro"><?php echo $n->marca ?> </div></td>
      


<!-- CREAR PDF -->
<form  action="../modelo/pdf.php" method="POST" >
        <td><div align="center" >
          <input type="text" hidden name="idcotizacion" value="<?php echo $n->idcotizacion?>" style="width:1px;height:1px">   
          <button id="asignar" style="font-size: 30px"><i class="far fa-file-pdf"></i></button>      
        </div>
      </form>

      <!-- MODIFICAR -->

<!-- Lista los datos para modificar, no necesita llamar al action, ya que usa los datos del foreach -->

<form  action="" method="POST" >
        <td><div align="center">
          <input type="text" hidden name="idcotizacion" value="<?php echo $n->idcotizacion?>" style="width:1px;height:1px">     
          <button  id="show" style="font-size: 30px"><i class="far fa-edit"></i></button>       
        </div>

</form>    
     

      <!-- ENVIO Y CONFIRMACION POR CORREO.
           ESTO HACE UN UPDATE A LA COTIZACION DONDE SE CAMBIA EL ESTADO DE LA COTIZACION DESDE estado 2(en_creacion) a estado 3(area_negocio) -->

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
        <!-- ELIMINA COTIZACION -->
<form  action="../modelo/eliminarcotizacion.php" method="GET" >
        <td><div align="center">
          <input type="text" hidden name="idcotizacion" value="<?php echo $n->idcotizacion?>" style="width:1px;height:1px">      
          <button onclick="return confirmDelete();" style="font-size: 30px"><i class="far fa-trash-alt"></i></button>
        </div>
      </form>
    
    
      <?php endforeach;?>  
     

<div class="loader"></div>
      
    </tr> 

</table>

<div>
<?php include("lista_cotizacion_asignada.php");?>
</div>
</center>
<div id="element" style="display: block;">
 <?php include("modificar_cotizacion.php"); ?>
</div>

</tr>
</table>

</center>


</body>
</html>

