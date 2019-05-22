
  <?php include("../modelo/listacotizacion_asignada.php");?>


<!--    GENERAR UN MODELO LISTARUSUARIO.PHP DESDE HAY PASAR POR PARAMETRO EL USUARIO. LUEGO REALIZAR UN LISTADO EN ESTA PAGINA CON UN FOREACH Y DESDE ES LISTADO ENTREGAR EL PARAMETRO DEL NOMBRE DEL COORDINADOR A UN INPUT. -->

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="vista/w3.css/w3.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


 

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


</head>
<body>



<center>
<table border="0" class="w3-container">
  <br>
  <h3>ESTATUS COTIZACION </h3>

<tr class="centro">
<td bgcolor="#666666" class="primera_fila" style="width:70px;height:15px">N° Cot</td>
<td bgcolor="#666666" class="primera_fila"style="width:70px;height:15px">SOLICITA</td>
<td bgcolor="#666666" class="negrilla" style="width:170px;height:15px">FECHA ASIGNACION</td>
<td bgcolor="#666666" class="negrilla" style="width:170px;height:15px">EMPRESA</td>
<td bgcolor="#666666" class="negrilla" style="width:170px;height:15px">EJECUTIVO ASIGNADO</td>
</tr>


   <?php foreach($sql as $n):?> 
    <br>

   
    <tr>
      <td height="46" class="centro"><?php echo $n->idcotizacion ?> </td>
      <td class="centro"><?php echo $n->solicita?> </td> 
         <td><div align="center" class="centro"><?php echo $n->fecha_asignacion ?> </div></td>
       <td><div align="center" class="centro"><?php echo $n->nombre_empresa ?> </div></td>
      <td><div align="center" class="centro"><?php echo $n->nombre_coordinador ?> </div></td>
  
      
<!-- CREAR PDF -->
<form  action="../modelo/pdf.php" method="POST" >
        <td><div align="center" >
          <input type="text" hidden name="idcotizacion" value="<?php echo $n->idcotizacion?>" style="width:1px;height:1px">   
          <button  style="font-size: 30px"><i class="far fa-file-pdf"></i></button>      
        </div>
      </form>

     
    
    
      <?php endforeach;?>  
      
    </tr> 

</table>



</table>
</center>


</body>
</html>

