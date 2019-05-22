<?php include("../modelo/listamoficar.php"); ?>

<!DOCTYPE html>


<html>

<head>
  <meta charset="utf-8">
  <title>Modificar Cotizacion</title>
</head>

 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
 <link rel="stylesheet" href="vista/w3.css/w3.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">



<style type="text/css">
 .w3-container table {
  font-weight: bold;
}
 .w3-container table {
  font-size: 12px;
}


 </style>

<body>




<form action="../modelo/modificarcotizacion_adm.php" method="POST">
<!-- =======lista para modificar. COMIENZO================ -->
<center>
   <?php foreach($sql3 as $n):?> 

        <div id="close">  <button id="hide" style="font-size: 30px"><i class="fas fa-arrow-alt-circle-up"></i></button>  
    
  <button style="font-size: 30px "><i class="far fa-edit"></i></button> 
</tr>


<div align="left" class="w3-container w3-black" style="width:1000px;height:35px">
Modifica Cotizaci&oacute;n
</div>
      
         <table border="0" style="width:1100px>
           <tr>
             <td colspan="2">
               <td width="166" height="36">N&deg;Cotizacion <input readonly type="text" class="w3-input" value="<?php echo $n->idcotizacion ?>" name="idcotizacion" style="width:166px;height:25px"> 
                 <td width="1" height="22"></td>
             <td width="170" height="32"></td>
             <td width="1">&nbsp;</td>
             <td width="166">&nbsp;</td>
             <td width="1">&nbsp;</td>
             <td width="166">&nbsp;</td>
             <td width="1">&nbsp;</td>
             <td width="166">&nbsp;</td>
             <td width="1">&nbsp;</td>
             <td width="166">&nbsp;</td>
             
          </tr>
           <tr>
             <td>Solicitante
               <input type="text" value="<?php echo $n->solicita ?>" class="w3-input" name="solicita" style="width:166px;height:40px">
             </td>
             <td>&nbsp;</td>
             <td>Empresa<select required  name="empresa"  id="empresa" class="w3-input" value="" style="width:166px;height:40px">
               <option ><?php echo $n->EMPRESA_idempresa?></option>
               <!--muestra lo que tiene el listado -->
               <?php while($row=$sentencia->fetch()){?>
               <option value="<?php echo $row["idempresa"];?>"> <?php echo $row["nombre_empresa"];?></option>
               <?php } ?>
             </select></td>
             <td>&nbsp;</td>
             <td>Negocio/Proyecto<input type="text" value="<?php echo $n->negocio_proyecto ?>" name="negocio_proyecto" class="w3-input" style="width:166px;height:40px"></td>
             <td>&nbsp;</td>
             <td>Motivo<select name="motivo" class="w3-input" style="width:166px;height:40px">
               <option><?php echo $n->motivo ?></option>
               <option>aumento</option>
               <option>reposici&oacute;n</option>
               <option>renovaci&oacute;n</option>
               <
             </select></td>
             <td>&nbsp;</td>
             <td>Tipo unidad<select name="tipo_unidad" class="w3-input" style="width:130px;height:40px">
               <option><?php echo $n->tipo_unidad ?></option>
               <option>automovil</option>
               <option>camioneta</option>
               <option>furgon</option>
               <option>camion</option>
               <option>minibus</option>
               <option>ambulancia</option>
             </select></td>
             <td>&nbsp;</td>
             <td>Tipo Cabina<select name="tipo_cabina" class="w3-input" style="width:166px;height:40px">
               <option><?php echo $n->tipo_cabina ?></option>
               <option>simple</option>
               <option>doble</option>
               <option>pasajeros</option>
             </select></td>
           </tr>
           <tr>
             <td>Tracci&oacute;n<select name="traccion" class="w3-input" style="width:130px;height:40px">
               <option><?php echo $n->traccion ?></option>
               <option>4x2</option>
               <option>4x4</option>
             </select></td>
             <td>&nbsp;</td>
             <td>Trasmision<select name="trasmision" class="w3-input" style="width:166px;height:40px">
               <option><?php echo $n->trasmision ?></option>
               <option>mecanica</option>
               <option>automatica</option>
             </select></td>
             <td>&nbsp;</td>
             <td>Marca<select required name="marca" id="marca" class="w3-select" value="" style="width:166px;height:40px">
               <option><?php echo $n->MARCA_idmarca; ?></option>
               <?php while($row=$sentencia1->fetch()){?>
               <option value="<?php echo $row["idmarca"];?>"> <?php echo $row["marca"];?></option>
               <?php } ?>
             </select></td>
             <td>&nbsp;</td>
             <td>Modelo<input type="text" value="<?php echo $n->modelo ?>" name=" modelo" class="w3-input" style="width:130px;height:40px"></td>
             <td>&nbsp;</td>
             <td>Cantidad<input type="text" value="<?php echo $n->cantidad ?>" name="cantidad" class="w3-input" style="width:170px;height:40px"></td>
             <td>&nbsp;</td>
             <td>Plazo<input type="text" value="<?php echo $n->plazo ?>" name="plazo" class="w3-input" style="width:166px;height:40px"></td>
           </tr>
           <tr>
             <td>Color<input type="text" value="<?php echo $n->color ?>" name="color" class="w3-input" style="width:166px;height:25px"></td>
             <td>&nbsp;</td>
             <td>Alarma Robo<select name="alarma_robo" class="w3-input" style="width:166px;height:40px" >
               <option><?php echo $n->alarma_robo ?></option>
               <option>si</option>
               <option>no</option>
             </select></td>
             <td>&nbsp;</td>
             <td>Sensor Retroceso<select name="sensor_retroceso" class="w3-input" style="width:166px;height:40px">
               <option><?php echo $n->sensor_retroceso ?></option>
               <option>si</option>
               <option>no</option>
             </select></td>
             <td>&nbsp;</td>
             <td>GPS<select name="gps" class="w3-input" style="width:166px;height:40px" >
               <option><?php echo $n->gps ?></option>
               <option>si</option>
               <option>no</option>
             </select></td>
             <td>&nbsp;</td>
             <td>Tipo Parachoque<select name="parachoque" class="w3-input" style="width:130px;height:40px">
               <option><?php echo $n->parachoque ?></option>
               <option>tubular</option>
               <option>fabrica</option>
             </select></td>
             <td>&nbsp;</td>
             <td>Barras Antivuelco<select name="barras_antivuelco" class="w3-input" style="width:166px;height:40px" >
               <option><?php echo $n->barras_antivuelco ?></option>
               <option>interior/exterior</option>
               <option>interior</option>
               <option>exterior</option>
               <option>no</option>
             </select></td>
           </tr>
           <tr>
             <td>Tipo Neumatico<select name="neumaticos" class="w3-input" style="width:166px;height:40px" >
               <option><?php echo $n->neumaticos ?></option>
               <option>fabrica</option>
               <option>AT</option>
               <option>MT</option>
             </select></td>
             <td>&nbsp;</td>
             <td>Tipo Cupula<select name="cupula" class="w3-input" style="width:166px;height:40px">
               <option><?php echo $n->cupula ?></option>
               <option>Sae</option>
               <option>Hueca</option>
               <option>no</option>
             </select></td>
             <td>&nbsp;</td>
             <td>Tipo Porta escala<select name="portaescala" class="w3-input" style="width:166px;height:40px" >
               <option><?php echo $n->portaescala ?></option>
               <option>no</option>
               <option>Estandar</option>
               <option>Tipo Parron</option>
             </select></td>
             <td>&nbsp;</td>
             <td>Laminas Seguridad<select name="laminas_seguridad" class="w3-input" style="width:166px;height:40px">
               <option><?php echo $n->laminas_seguridad ?></option>
               <option>si</option>
               <option>no</option>
             </select></td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
           </tr>
           <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
           </tr>
           <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
           </tr>
           <tr>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
             <td>&nbsp;</td>
           </tr>
           <tr>
             <td colspan="11"><input type="text" class="w3-input" value="<?php echo $n->observaciones ?>"  name="observaciones" ></td>
           </tr>
  </table>
         <br>
           
           
           
           <td><?php endforeach;?></td>
           
           
           <!-- =======lista para modificar. TERMINO================ -->
  </form>
</body>
</html>