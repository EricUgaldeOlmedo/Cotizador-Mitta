
<?php include("../modelo/valorizacotizacion.php"); ?>

<!DOCTYPE html>
<html>
<head>
  <title>Valoriza cotizacion</title>
</head>
<body>
  <?php foreach($sql as $n):?> 
<form action="../modelo/enviarcotizacion_valorizada.php" method="POST"><!-- envia valores para ser ingresados a la tabla asignacion -->
   
 
</tr>
    
<table>
  

ncot<input readonly type="text" name="COTIZACION_idcotizacion" value="<?php echo $n->COTIZACION_idcotizacion ?>">
<!-- estado--><input hidden="" type="text" name="estado_cotizacion" value="cotizada">
12<input type="text" name="uf_12_meses" value="" placeholder="-">
24<input type="text" name="uf_24_meses" value="" placeholder="-">
36<input type="text" name="uf_36_meses" value="" placeholder="-">
48<input type="text" name="uf_48_meses" value="" placeholder="-">
60<input type="text" name="uf_60_meses" value="" placeholder="-">
72<input type="text" name="uf_72_meses" value="" placeholder="-">
Observaciones<input type="texarea" name="observaciones" value="" placeholder="observaciones">
fecha<input readonly type="date" name="fecha_valorizacion" value="<?php echo date('Y-m-d'); ?>">
Folio<input type="number" name="folio" value="" placeholder="N° Folio">


 <button style="font-size: 30px "><i class="far fa-edit"></i></button> 

<!-- https://www.w3schools.com/bootstrap/bootstrap_ref_css_buttons.asp
https://www.w3schools.com/howto/howto_css_dropup.asp -->

</table>





  <td><?php endforeach;?></td>


</body>
</html>