<?php include("../modelo/asignacioncotizacion_adm.php"); ?>
  <?php include("../modelo/select/lista_empresa.php"); ?>
  <?php include("../modelo/select/lista_ejecutivo_negocio.php"); ?>

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

<div align="right">
<?php echo "usuario:".$_SESSION["usuario"]."<br>"; ?>

  <center>
   


          <h3>COTIZACIONES PARA ENVIAR A NEGOCIO</h3>

        <!--   <form action="" method="POST">
 En el form, no es necesario en action enviar a una pagina ya que ?php include("../modelo/modelo_ver_hist_asig.php"); ?> esta haciendo la referencia 
 usuario <input type="text" name="usuario" style="width:90px;height:30px" value="<?php echo $_SESSION["usuario"] ?>" >
 <input type="submit" name="" value="BUSCAR" class="button" > 


</form>-->


<center>

<table border="0" class="w3-container">
<br>
<tr class="centro">
  <td width="69" bgcolor="#666666"  style="color:white; width:70px;height:15px">VER PDF</td>
<td width="69" bgcolor="#666666"  style="color:white; width:70px;height:15px">N° Cot</td>
<td width="69" bgcolor="#666666" style="color:white; width:70px;height:15px">ESTADO</td>
<td width="169" bgcolor="#666666"  style="color:white; width:170px;height:15px">SOLICITA</td>
<td width="169" bgcolor="#666666" style="color:white; width:170px;height:15px">FECHA NEGOCIO</td>
<td width="169" bgcolor="#666666"  style="color:white; width:170px;height:15px">EMPRESA</td>
<td colspan="4" bgcolor="#666666"  style="color:white; width:90px;height:15px">ASIGNA EJECUTIVO </td>
</tr>


<!--=este foreach esta contado a modelo_borrar.php y actualizar a vista_actualizar.php=====-->
   <?php foreach($sql as $n):?> 
    <!-- Esta parte es la lista que se va haciendo cuando se ingresa un nuevo registro -->
    <tr>
<form  action="../modelo/pdf.php" method="POST" >
        <td width="22"><div align="center" >
            <button id="" style="font-size: 30px"><i class="far fa-file-pdf"></i></button> <input type="text" hidden name="idcotizacion" value="<?php echo $n->NCotizacion?>" style="width:1px;height:1px">   
             
        </div>
      </form>



      <td height="46" class="centro"><?php echo $n->NCotizacion ?> </td>
      <td class="centro"><?php echo $n->estado?> </td>  
       <td><div align="center" class="centro"><?php echo $n->solicita ?> </div></td>
      <td><div align="center" class="centro"><?php echo $n->fecha_negocio ?> </div></td>
        <td><div align="center" class="centro"><?php echo $n->nombre_empresa ?> </div></td>
      


<!-- CREAR PDF -->


      <!-- MODIFICAR -->

<!-- Lista los datos para modificar, no necesita llamar al action, ya que usa los datos del foreach -->

  
     

      <!-- ENVIO Y CONFIRMACION POR CORREO.
           ESTO HACE UN UPDATE A LA COTIZACION DONDE SE CAMBIA EL ESTADO DE LA COTIZACION DESDE estado 2(en_creacion) a estado 3(area_negocio) -->

<form  action="../modelo/enviarasignacotizacion_adm.php"  method="POST" id="formulario">
        <td width="200"><div align="center">

          <select required="" type="text" name="USUARIO_idusuario" id="empresa" class="w3-input" style="width:200px;height:40px">
            <option></option>
            <?php while($row=$sentencia->fetch()){?>
            <option value="<?php echo $row["idusuario"];?>"> <?php echo $row["nombre_coordinador"];?></option>
            <?php } ?>
          </select>
          <input type="text" hidden name="idcotizacion" value="<?php echo $n->NCotizacion?>"
  style="width:1px;height:1px">
  <input type="text" hidden name="estado_cotizacion" value="asignada" style="width:1px;height:1px">  

<input type="text" hidden name="fecha_asignacion" value="<?php echo date('Y-m-d'); ?>" style="width:1px;height:1px">

 <td width="43"><input type="text" hidden name="usuario" value="<?php echo $_SESSION["usuario"]  ?>" style="width:1px;height:1px">
         
      <button  onclick="return confirmEnvio();"  style="font-size: 30px" ><i class="far fa-thumbs-up"  ></i></button>   
      </div>

      </form>
    
    
      <?php endforeach;?>  
      
    </tr> 

</table>

</center>

</tr>
</table>
</center>


</body>
</html>


