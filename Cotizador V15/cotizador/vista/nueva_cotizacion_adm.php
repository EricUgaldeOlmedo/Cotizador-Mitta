<!doctype html>

<?php require_once("../modelo/select/lista_empresa.php"); ?>
<?php require_once("../modelo/select/lista_marca.php"); ?>


<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="vista/w3.css/w3.css">
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
 <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


 <link href="css/SpryValidationRadio1.css" rel="stylesheet" type="text/css">
<link href="SpryAssets/SpryValidationRadio.css" rel="stylesheet" type="text/css">
<link href="css/SpryValidationTextField2.css" rel="stylesheet" type="text/css">


<script src="js/SpryValidationTextField2.js" type="text/javascript"></script>
<script src="js/SpryValidationRadio1.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationRadio.js" type="text/javascript"></script>



<link href="SpryAssets/SpryValidationRadio.css" rel="stylesheet" type="text/css">
<script src="SpryAssets/SpryValidationRadio.js" type="text/javascript"></script>




<style type="text/css">
 .w3-container table {
  font-weight: bold;
}
 .w3-container table {
  font-size: 12px;
}


 </style>

 <script type="text/javascript">
        function confirmar() {
            var confirmar = confirm("¿Confirma ingreso Cotización? ");
            if (confirmar) {
                return true;
            } else {
                return false;
            }
        }
    </script>

<script>
  function habilitar(value)
  {if(value==true)
    {        // habilitamos
      document.getElementById("no").disabled=false;
    }else if(value==false){
      // deshabilitamos
      document.getElementById("no").disabled=true;
    }
  }
</script>
<script>
  function deshabilitar(value)
  {if(value==true) {
      // habilitamos
      document.getElementById("no").disabled=true;
    }
  }
</script>
     
<script>

  function deshabilitar(value)
  {if(value==true)
    {        // habilitamos nuevamente el NO 
      document.getElementById("no").disabled=true;
    }else if(value==false){//si estan habilitados los check interior y exterior y los desabilitamos, se activara el check NO
      // deshabilitamos
      document.getElementById("no").disabled=false;
    }
  }
</script>






<head>
<meta charset="utf-8">
<title>Nueva Cotizacion</title>
</head>
<center>
    <?php
session_start();
if(!isset($_SESSION["usuario"])){
header("location:../index.php");
}
?>
<br><br><br>

<div align="right">
<?php include("session.php") ?>
</div>


<br>
<body>

  <style type="text/css">
    input[type=text]:enabled {
  background: #e6e6e6;
}

    select[type=text]:enabled {
  background: #e6e6e6;
}

    input[type=number]:enabled {
  background: #e6e6e6;
}

  </style>
<form class="w3-container" action="../modelo/nuevacotizacion_adm.php" method="post">
<br>

<div align="left" class="w3-container w3-black" style="width:1000px;height:35px">
Datos
</div>

  <p hidden=""> 
  
  <input hidden class="w3-input" readonly type="date" name="fecha" id="fecha4" value="<?php echo date('Y-m-d'); ?>" >
    <div><td><input readonly  type="hidden" value="en_proceso" name="estado"></td></div>
  
 

                          <!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX-->

  </p>
<table width="1000" border="0">
  <tr>
   
    
    <td width="200">Usuario  <input class="w3-input" readonly type="text" name="usuario" id="usuario" style="width:200px;height:35px" value="<?php echo $_SESSION["usuario"]  ?>"></td>
    <td width="20"></td>
    
    <td width="200">Solicita <input required  class="w3-input" type="text" name="solicita" id="solicita" style="width:200px;height:35px"></td>
    <td width="20"></td>
    

    <td width="200">Empresa  <select required="" type="text" name="empresa" id="empresa" class="w3-input" style="width:200px;height:35px">
            <option></option>
            <?php while($row=$sentencia->fetch()){?>
            <option value="<?php echo $row["idempresa"];?>"> <?php echo $row["nombre_empresa"];?></option>
            <?php } ?>
            </select></td>

            <td width="20"></td>

            <td width="200">Negocio/Proyecto<input class="w3-input" type="text" name="negocio_proyecto" style="width:200px;height:35px" ></td>

             <td width="20"></td>

        <td width="20">Motivo<select class="w3-select" type="text" name="motivo" style="width:130px;height:35px" required="">
    <option value="" disabled selected></option>
    <option value="Aumento">Aumento</option>
    <option value="Renovación">Renovación</option>
    <option value="Reposición">Reposición</option>
  </select></td>
  </tr>
</table>

                          <!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX-->
<br>

<div align="left" class="w3-container w3-black" style="width:1000px;height:35px">
Modelo y plazo
</div>


<br>
 
<table width="1000" border="0">
  <tr>
   
    
    <td width="140">Tipo unidad<select class="w3-select" type="text" name="tipounidad" style="width:140px;height:35px" required="">
    <option value="" disabled selected></option>
    <option value="Automovil">Automovil</option>    
    <option value="Camioneta">Camioneta</option>
    <option value="Furgon">Furgon</option>
    <option value="Camion">Camion</option>     
     <option value="Minibus">Minibus</option>
     <option value="Ambulancia">Ambulancia</option>
  </select></td> 
  <td width="10"></td>
  
      <td width="140">Tipo Cabina<select class="w3-select" type="text" name="tipocabina" style="width:140px;height:35px" required="">
    <option value="" disabled selected></option>
    <option value="simple">simple</option>
    <option value="doble">doble</option>
    <option value="pasajeros">pasajeros</option>    
  </select></td>
   <td width="10"></td> 
  
    

    <td width="140">Tracción<select class="w3-select" type="text" name="traccion" style="width:140px;height:35px" required="">
    <option value="" disabled selected></option>
    <option value="4x2">4x2</option>
    <option value="4x4">4x4</option>   
  </select></td>
   <td width="10"></td>
  
      <td width="140">Transmision<select class="w3-select" type="text" name="trasmision" style="width:140px;height:35px" required="">
    <option value="" disabled selected></option>
    <option value="mecanica">mecanica</option>
    <option value="automatica">automatica</option>   
  </select>
</td>
<td width="10"></td>

<td width="150">Marca <select name="marca" class="w3-select" type="text" style="width:150px;height:35px" required="">
            <option></option>
            <?php while($row=$sentencia1->fetch()){?>
            <option value="<?php echo $row["idmarca"];?>"> <?php echo $row["marca"];?></option>
            <?php } ?>
            </select></td>
<td width="10"></td>
<td width="195">Modelo<input required class="w3-input" type="text" name="modelo" style="width:195px;height:35px" ></td>

  
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
  
  <td  width="140">
  
  Color<input required class="w3-input" type="text" name="color" style="width:140px;height:35px" >
  </td>  
      
  <td  width="10"></td> 
   
   <td  width="140">Tipo Combustible
     <select class="w3-select" type="text" name="combustible" style="width:140px;height:35px" required="">
       <option value="" disabled selected></option>
       <option value="Bencina">Bencina</option>
       <option value="Diesel">Diesel</option>
       <option value="Gas">Gas</option>
         <option value="Electrico">Electrico</option>
     </select></td>   
  <td  width="10"></td> 
   
  <td colspan="3">Lugar de entrega
    <input class="w3-input" type="text" value="" name="lugarentrega" style="width:300px;height:35px" required ></td>
   <td>&nbsp;</td>  
  <td>Cantidad
    <input required class="w3-input" type="number" name="cantidad" style="width:80px;height:35px" min="1" ></td>
    <td>&nbsp;</td>  
  <td>Meses plazo
    <input required class="w3-input" type="number" name="plazo" style="width:80px;height:35px" min="12" ></td>
  
  </tr> 
  
</table>


                          <!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX-->
<br>

<div align="left" class="w3-container w3-black" style="width:1000px;height:35px">
Equipamiento y accesorios (Basico)
</div>


<tr>
<td colspan="11">Equipamiento de fabrica: A/C, ABS, ALZA VIDRIOS ELECTRICOS, ESPEJOS ELECTRICOS,C TAG.</td>

</tr>
<br>
<table width="1000" class="w3-container" border="0">
        <td  width="124">Alarma Robo</td>
        <td width="142"><span id="spryradio5"> 
        SI <input type="radio" class="w3-radio" name="alarmarobo" value="SI" id="alarmarobo_0" style="width:20px;height:20px" >
        NO <input type="radio" class="w3-radio" name="alarmarobo" value="no" id="alarmarobo_1" style="width:20px;height:20px">
<br>
<span class="radioRequiredMsg">Realice una selección.</span></span></td>
        
        
        <td width="36">&nbsp;</td>
        <td width="123">Sensor retroceso</td>
        <td width="107"><span id="spryradio6">
        SI <input type="radio" class="w3-radio" name="sensorretroceso" value="SI" id="sensorretroceso_0" style="width:20px;height:20px">
        NO <input type="radio" class="w3-radio" name="sensorretroceso" value="no" id="sensorretroceso_1" style="width:20px;height:20px">
<br>
<span class="radioRequiredMsg">Realice una selección.</span></span></td>
        
        
        <td width="43">&nbsp;</td>
        <td width="38">Gps</td>
        <td width="207"><span id="spryradio7">
        SI <input type="radio" name="gps"  class="w3-radio" value="SI" id="Gps_0" style="width:20px;height:20px">
NO <input type="radio" name="gps"  value="no" id="Gps_1" class="w3-radio" style="width:20px;height:20px">
<br>
<span class="radioRequiredMsg">Realice una selección.</span></spam></td>
        </tr>
    </table>
      
      
      
                          <!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX-->
<br>





<div align="left" class="w3-container w3-black" style="width:1000px;height:35px" >
Equipamiento Avanzado        
</div>


<tr>
<td colspan="11" >Equipamiento de fabrica: A/C, ABS, ALZA VIDRIOS ELECTRICOS, ESPEJOS ELECTRICOS,TAG</td>

    </tr>
      <br>
  
    <table width="1000" class="w3-container" border="0" border="1">
      
      <tr>
        <td height="10">Barra Antivuelco</td>
        <td><p>
          <label> Int
            <input class="w3-checkbox" type="checkbox" name="barrasantivuelco[]" value="interior" id="interior" onclick="deshabilitar(this.checked);">
          </label>
          <label> Ext
            <input class="w3-checkbox" type="checkbox" name="barrasantivuelco[]" value="exterior" id="exterior" onclick="deshabilitar(this.checked);">
          </label>
          <label> no
            <input  class="w3-radio"  checked type="radio" name="barrasantivuelco[]" value="no" id="no" onclick="habilitar(this.checked);"   >
          </label>
          <br>
        </p></td>


        
       <td width="41">&nbsp;</td>
          <td><strong>Baliza</strong></td>
       <td>
         <label>
           SI <input type="radio" name="baliza" value="SI" id="baliza_0" class="w3-radio" style="width:20px;height:20px">
           </label>
         <label>
           NO <input type="radio" checked="" name="baliza" value="no" id="baliza_1" class="w3-radio" style="width:20px;height:20px">
           </label>
            </td>
         <td >&nbsp;</td>
         <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
         
      <tr>
      
            <td width="146" height="15">&nbsp;</td>
       <td width="269">&nbsp;</td>
        <td width="41">&nbsp;</td>
         <td width="173">&nbsp;</td>
          <td>&nbsp;</td>
               <td width="14">&nbsp;</td>
       <td width="19">&nbsp;</td>
        <td width="36">&nbsp;</td>
       </tr>
      
     <tr>
       <td><strong>Laminas Seguridad</strong></td>
       <td><span id="spryradio13">
         <label>
           SI <input type="radio" name="laminas" value="SI" id="Laminas_0" class="w3-radio" style="width:20px;height:20px">
           </label>
         <label>
           NO <input type="radio" checked="" name="laminas" value="no" id="Laminas_1" class="w3-radio" style="width:20px;height:20px">
           </label>
         <br>
         <span class="radioRequiredMsg">Realice una selección.</span></span></td>
       <td>&nbsp;</td>
        <td><strong>Cuñas</strong></td>
       <td>
         <label>
           SI <input type="radio" name="cunas" value="SI" id="cunas_0" class="w3-radio" style="width:20px;height:20px">
           </label>
         <label>
           NO <input type="radio" checked="" name="cunas" value="no" id="cunas_1" class="w3-radio" style="width:20px;height:20px">
           </label>
            </td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       </tr>
      
        <tr>
            <td width="146" height="15">&nbsp;</td>
       <td width="269">&nbsp;</td>
        <td width="41">&nbsp;</td>
         <td width="173">&nbsp;</td>
          <td>&nbsp;</td>
               <td width="14">&nbsp;</td>
       <td width="19">&nbsp;</td>
        <td>&nbsp;</td>
       </tr>
      
        <tr>
          <td><strong>Tipo Neumatico</strong></td>
          <td><span id="spryradio10">
          
            <label>
             AT <input type="radio" name="neumatico" value="AT" id="Neumatico_1" class="w3-radio" style="width:20px;height:20px">
              </label>
            <label>
             MT <input type="radio" name="neumatico" value="MT" id="Neumatico_2" class="w3-radio" style="width:20px;height:20px">
              </label>

  <label>
             Fabrica <input type="radio" checked="" name="neumatico" value="fabrica" id="Neumatico_0" class="w3-radio" style="width:20px;height:20px">
              </label>

            <br>
            <span class="radioRequiredMsg">Realice una selección.</span></span></td>
          <td width="41">&nbsp;</td>
         <td><strong>Pertiga</strong></td>
       <td>
         <label>
           SI <input type="radio" name="pertiga" value="SI" id="pertiga_0" class="w3-radio" style="width:20px;height:20px">
           </label>
         <label>
           NO <input type="radio" checked="" name="pertiga" value="no" id="pertiga_1" class="w3-radio" style="width:20px;height:20px">
           </label>
            </td>
          <td>&nbsp;</td>
               <td width="14">&nbsp;</td>
       <td width="19">&nbsp;</td>
        <td>&nbsp;</td>
       </tr>
      
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td width="41">&nbsp;</td>
         <td width="173">&nbsp;</td>
          <td>&nbsp;</td>
               <td width="14">&nbsp;</td>
       <td width="19">&nbsp;</td>
        <td>&nbsp;</td>
       </tr>
      
        <tr>
          <td><strong>Porta escala</strong></td>
          <td><span id="spryradio12">
          
            <label>
           Estandar <input type="radio" name="portaescala" value="estandar" id="Portaescala_1" class="w3-radio" style="width:20px;height:20px">
              </label>
            <label>
               Tipo Parron <input type="radio" name="portaescala" value="tipo_parron" id="Portaescala_2" class="w3-radio" style="width:20px;height:20px">
            </label>
          <label>
             NO <input type="radio" checked="" name="portaescala" value="no" id="Portaescala_0" class="w3-radio" style="width:20px;height:20px">
              </label>
            <br>
            <span class="radioRequiredMsg">Realice una selección.</span></span></td>
          <td width="41">&nbsp;</td>
         <td><strong>Cadena nieve</strong></td>
       <td>
         <label>
           SI <input type="radio" name="cadena_nieve" value="SI" id="cadenan_0" class="w3-radio" style="width:20px;height:20px">
           </label>
         <label>
           NO <input type="radio" checked="" name="cadena_nieve" value="no" id="cadenan_1" class="w3-radio" style="width:20px;height:20px">
           </label>
            </td>
          <td>&nbsp;</td>
               <td width="14">&nbsp;</td>
       <td width="19">&nbsp;</td>
        <td>&nbsp;</td>
       </tr>
      
        <tr>
            <td width="146" height="23">&nbsp;</td>
       <td width="269">&nbsp;</td>
        <td width="41">&nbsp;</td>
         <td width="173">&nbsp;</td>
          <td>&nbsp;</td>
               <td width="14">&nbsp;</td>
       <td width="19">&nbsp;</td>
        <td>&nbsp;</td>
       </tr>
      
        <tr>
          <td><strong>Tipo Cupula</strong></td>
          <td><span id="spryradio11">
            <label>
             Sae <input type="radio" name="cupula" value="sae" id="Cupula_0" class="w3-radio" style="width:20px;height:20px">
              </label>
            <label>
             Hueca <input type="radio" name="cupula" value="hueca" id="Cupula_1" class="w3-radio" style="width:20px;height:20px">
              </label>

            <label>
             NO <input type="radio" checked="" name="cupula" value="no" id="Cupula_2" class="w3-radio" style="width:20px;height:20px">
              </label>
            <br>
            <span class="radioRequiredMsg">Realice una selección.</span></span></td>
          <td>&nbsp;</td>
           <td><strong>Bloqueo electronico</strong></td>
       <td>
         <label>
           SI <input type="radio" name="bloqueoelec" value="SI" id="bloqueoelec_0" class="w3-radio" style="width:20px;height:20px">
           </label>
         <label>
           NO <input type="radio" checked="" name="bloqueoelec" value="no" id="bloqueoelec_1" class="w3-radio" style="width:20px;height:20px">
           </label>
            </td>
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
        </tr>
        <tr>
             <td><strong>Parachoque</strong></td>
        <td><span id="spryradio8">
        
          
          <label>
            <input type="radio" name="parachoque" value="tubular" id="Parachoque_1" class="w3-radio" >
            Tubular</label>
            
              <label>
            <input type="radio" checked="" name="parachoque" value="fabrica" id="Parachoque_0" class="w3-radio">
            Fabrica</label>           
            
          <br>
          <span class="radioRequiredMsg">Realice una selección.</span></span></td>
          
          <td>&nbsp;</td>
          
          <td><strong>Caja de Herramientas</strong></td>
       <td>
         <label>
           SI <input type="radio" name="cajaher" value="SI" id="cajah_0" class="w3-radio" style="width:20px;height:20px">
           </label>
         <label>
           NO <input type="radio" checked="" name="cajaher" value="no" id="cajah_1" class="w3-radio" style="width:20px;height:20px">
           </label>
       </td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
       
        </tr>
        <tr>
          <td height="10">&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
              <td><strong>Malla luneta</strong></td>
       <td>
         <label>
           SI <input type="radio" name="malla_luneta" value="SI" id="mallal_0" class="w3-radio" style="width:20px;height:20px">
           </label>
         <label>
           NO <input type="radio" checked="" name="malla_luneta" value="no" id="mallal_1" class="w3-radio" style="width:20px;height:20px">
           </label>
       </td>
          <td>&nbsp;</td>
        
          <td><strong>Cinta Reflectante</strong></td>
       <td>
         <label>
           SI <input type="radio" name="cinta_reflec" value="SI" id="cintar_0" class="w3-radio" style="width:20px;height:20px">
           </label>
         <label>
           NO <input type="radio" checked="" name="cinta_reflec" value="no" id="cintar_1" class="w3-radio" style="width:20px;height:20px">
           </label>
       </td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="10">&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
           <td><strong>Foco Faenero</strong></td>
       <td>
         <label>
           SI <input type="radio" name="foco_faenero" value="SI" id="focof_0" class="w3-radio" style="width:20px;height:20px">
           </label>
         <label>
           NO <input type="radio" checked="" name="foco_faenero" value="no" id="focof_1" class="w3-radio" style="width:20px;height:20px">
           </label>
       </td>
          <td>&nbsp;</td>
        
           <td><strong>Coco de arrastre</strong></td>
       <td>
         <label>
           SI <input type="radio" name="coco_arrastre" value="SI" id="cocoa_0" class="w3-radio" style="width:20px;height:20px">
           </label>
         <label>
           NO <input type="radio" checked="" name="coco_arrastre" value="no" id="cocoa_1" class="w3-radio" style="width:20px;height:20px">
           </label>
       </td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="10">&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
         <td><strong>2° rueda de respuesto</strong></td>
       <td>
         <label>
           SI <input type="radio" name="2rueda" value="SI" id="2rueda_0" class="w3-radio" style="width:20px;height:20px">
           </label>
         <label>
           NO <input type="radio" checked="" name="2rueda" value="no" id="2rueda_1" class="w3-radio" style="width:20px;height:20px">
           </label>
       </td>
          <td>&nbsp;</td>
        
          <td><strong>Extintor</strong></td>
       <td>
         <label>
           SI <input type="radio" name="extintor" value="SI" id="extintor_0" class="w3-radio" style="width:20px;height:20px">
           </label>
         <label>
           NO <input type="radio" checked="" name="extintor" value="no" id="extintor_1" class="w3-radio" style="width:20px;height:20px">
           </label>
       </td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="10">&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
         <td><strong>Cubre pickup</strong></td>
       <td>
         <label>
           SI <input type="radio" name="cubre_pickup" value="SI" id="cubrep_0" class="w3-radio" style="width:20px;height:20px">
           </label>
         <label>
           NO <input type="radio" checked="" name="cubre_pickup" value="no" id="cubrep_1" class="w3-radio" style="width:20px;height:20px">
           </label>
       </td>
          <td>&nbsp;</td>
          
         <td><strong>Seguro de tuerca</strong></td>
       <td>
         <label>
           SI <input type="radio" name="seguro_tuerca" value="SI" id="segurot_0" class="w3-radio" style="width:20px;height:20px">
           </label>
         <label>
           NO <input type="radio" checked="" name="seguro_tuerca" value="no" id="segurot_1" class="w3-radio" style="width:20px;height:20px">
           </label>
            </td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="10">&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
           <td><strong>Estrobo</strong></td>
       <td>
         <label>
           SI <input type="radio" name="estrobo" value="SI" id="estrobo_0" class="w3-radio" style="width:20px;height:20px">
           </label>
         <label>
           NO <input type="radio" checked="" name="estrobo" value="no" id="estrobo_1" class="w3-radio" style="width:20px;height:20px">
           </label>
            </td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="10">&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><strong>Kit invierno minero</strong></td>
       <td>
         <label>
           SI <input type="radio" name="kit_invierno" value="SI" id="kitinv_0" class="w3-radio" style="width:20px;height:20px">
           </label>
         <label>
           NO <input type="radio" checked="" name="kit_invierno" value="no" id="kitinv_1" class="w3-radio" style="width:20px;height:20px">
           </label>
            </td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="10">&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
         <td><strong>Neblineros</strong></td>
       <td>
         <label>
           SI <input type="radio" name="neblinero" value="SI" id="neblinero_0" class="w3-radio" style="width:20px;height:20px">
           </label>
         <label>
           NO <input type="radio" checked="" name="neblinero" value="no" id="neblinero_1" class="w3-radio" style="width:20px;height:20px">
           </label>
            </td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="10">&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
           <td><strong>Soporte neumaticos</strong></td>
       <td>
         <label>
           SI <input type="radio" name="soporte_neumatico" value="SI" id="soporteneu_0" class="w3-radio" style="width:20px;height:20px">
           </label>
         <label>
           NO <input type="radio" checked="" name="soporte_neumatico" value="no" id="soporteneu_1" class="w3-radio" style="width:20px;height:20px">
           </label>
            </td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="10">&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
         <td><strong>Tiro de arrastre</strong></td>
       <td>
         <label>
           SI <input type="radio" name="tiro_arrastre" value="SI" id="tiroarras_0" class="w3-radio" style="width:20px;height:20px">
           </label>
         <label>
           NO <input type="radio" checked="" name="tiro_arrastre" value="no" id="tiroarras_1" class="w3-radio" style="width:20px;height:20px">
           </label>
            </td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="10">&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      
    </table>



<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX-->
<br>

<div align="left" class="w3-container w3-black" style="width:1000px;height:35px">
OBSERVACIONES
</div>
<br>

<table border="0"  class="w3-container">
<tr>
<td width="834" height="84"  ><textarea name="observaciones" id="observaciones" style="width:700px; height:100px" placeholder="Ingrese observaciones o mas detalles de su cotizacion"></textarea>
</td>
<td width="118"  ><input type="submit" name="COTIZAR" id="COTIZAR" value="COTIZAR" onClick="return confirmar();" style="width:100px; height:50px"></td>

</tr>

</table>

</form>


<script type="text/javascript">
var spryradio1 = new Spry.Widget.ValidationRadio("spryradio1");
var spryradio2 = new Spry.Widget.ValidationRadio("spryradio2");
var spryradio3 = new Spry.Widget.ValidationRadio("spryradio3");
var spryradio4 = new Spry.Widget.ValidationRadio("spryradio4");
var spryradio5 = new Spry.Widget.ValidationRadio("spryradio5");
var spryradio14 = new Spry.Widget.ValidationRadio("spryradio14");
var spryradio7 = new Spry.Widget.ValidationRadio("spryradio7");
var spryradio9 = new Spry.Widget.ValidationRadio("spryradio9");
var spryradio10 = new Spry.Widget.ValidationRadio("spryradio10");
var spryradio13 = new Spry.Widget.ValidationRadio("spryradio13");
var spryradio12 = new Spry.Widget.ValidationRadio("spryradio12");
var spryradio11 = new Spry.Widget.ValidationRadio("spryradio11");
var spryradio6 = new Spry.Widget.ValidationRadio("spryradio6");
var spryradio8 = new Spry.Widget.ValidationRadio("spryradio8");

</script>



</body>

</center>
</html>
  