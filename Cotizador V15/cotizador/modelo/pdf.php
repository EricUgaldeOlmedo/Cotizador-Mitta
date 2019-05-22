<?php

require('../modelo/fpdf/fpdf.php');
require('../modelo/plantilla.php');
require_once('conexion2.php');

$idcotizacion=$_POST["idcotizacion"];

  // ESTA ES LA PARTE DONDE SE LLAMA LOS DATOS Y MUESTRA EL RESULTADO EN COLUMNAS
  
  $sql=$conn->query("
SELECT
idcotizacion,
fecha,
usuario,
solicita,
nombre_empresa,
negocio_proyecto,
motivo,
tipo_unidad,
tipo_cabina,
traccion,
trasmision,
marca,
modelo,
cantidad,
plazo,
color,
alarma_robo,
sensor_retroceso,
gps,
parachoque,
barras_antivuelco,
neumaticos,
cupula,
portaescala,
laminas_seguridad,
observaciones
FROM cotizacion join empresa
on idempresa=EMPRESA_idempresa join
 marca on idmarca=MARCA_idmarca
 WHERE idcotizacion='$idcotizacion' " )->fetchAll(PDO::FETCH_OBJ);
  

  $pdf = new PDF();
  $pdf->AliasNbPages();
  $pdf->AddPage();
  
  $pdf->SetFont('Arial','',8);
  
   foreach ($sql as $n) {



  $pdf->SetFillColor(232,232,232);
  $pdf->SetFont('Arial','B',8);
    $pdf->Cell(70,6,'',0,1,'C');//SALTO
    $pdf->Cell(70,6,'',0,1,'C');//SALTO
  $pdf->Cell(10,4,utf8_decode('N° cot'),1,0,'C',1);
    $pdf->Cell(15,4,'Fecha',1,0,'C',1);
    $pdf->Cell(20,4,'Coordinador',1,0,'C',1);
    $pdf->Cell(25,4,utf8_decode('solicíta'),1,0,'C',1);
    $pdf->Cell(50,4,'Empresa',1,0,'C',1);
 $pdf->Cell(30,4,'Para el negocio',1,0,'C',1);
 $pdf->Cell(30,4,'Motivo',1,1,'C',1); 

  $pdf->Cell(10,4,utf8_decode($n->{"idcotizacion"}),1,0,'C');
  $pdf->Cell(15,4,$n->{"fecha"},1,0,'C'); 
  $pdf->Cell(20,4,$n->{"usuario"},1,0,'C');
    $pdf->Cell(25,4,utf8_decode($n->{"solicita"}),1,0,'C');
    $pdf->Cell(50,4,$n->{"nombre_empresa"},1,0,'C');  
     $pdf->Cell(30,4,$n->{"negocio_proyecto"},1,0,'C');   
$pdf->Cell(30,4,utf8_decode($n->{"motivo"}),1,1,'C');
  $pdf->Cell(70,3,'',0,1,'C');//SALTO

  
    
        
    

$pdf->Cell(70,3,'',0,1,'C');//SALTO

     $pdf->Cell(30,6,'Cantidad',1,0,'C',1);
     $pdf->Cell(50,6,'Plazo en meses',1,1,'C',1);

    $pdf->Cell(30,6,$n->{"cantidad"},1,0,'C');         
    $pdf->Cell(50,6,$n->{"plazo"},1,1,'C');




$pdf->Cell(70,6,'',0,1,'C');//SALTO
$pdf->Cell(70,6,'TIPO DE VEHICULO',0,1,'C');//SALTO


    $pdf->Cell(50,6,'Tipo de Vehiculo',1,0,1,1);
    $pdf->Cell(70,6,$n->{"tipo_unidad"},1,1);

       $pdf->Cell(50,6,'Tipo cabina',1,0,1,1);
    $pdf->Cell(70,6,$n->{"tipo_cabina"},1,1);
         
             $pdf->Cell(50,6,'Traccion',1,0,1,1);
    $pdf->Cell(70,6,$n->{"traccion"},1,1);

  $pdf->Cell(50,6,'Trasmision',1,0,1,1);
    $pdf->Cell(70,6,$n->{"trasmision"},1,1);

        $pdf->Cell(50,6,'Marca',1,0,1,1);
    $pdf->Cell(70,6,$n->{"marca"},1,1);

        $pdf->Cell(50,6,'Modelo',1,0,1,1);
    $pdf->Cell(70,6,$n->{"modelo"},1,1);

   $pdf->Cell(70,6,'',0,1,'C');//SALTO
$pdf->Cell(70,6,'ACCESORIOS',0,1,'C');//SALTO


      $pdf->Cell(50,6,'Color',1,0,1,1);
    $pdf->Cell(70,6,$n->{"color"},1,1);

     $pdf->Cell(50,6,'alarma robo',1,0,1,1);
    $pdf->Cell(70,6,$n->{"alarma_robo"},1,1);

     $pdf->Cell(50,6,'Sensor de retroceso',1,0,1,1);
    $pdf->Cell(70,6,$n->{"sensor_retroceso"},1,1);

  $pdf->Cell(50,6,'GPS',1,0,1,1);
    $pdf->Cell(70,6,$n->{"gps"},1,1);

  $pdf->Cell(50,6,'Parachoque',1,0,1,1);
    $pdf->Cell(70,6,$n->{"parachoque"},1,1);

    $pdf->Cell(50,6,'Barras antivuelco',1,0,1,1);
    $pdf->Cell(70,6,$n->{"barras_antivuelco"},1,1);

 $pdf->Cell(50,6,'Tipo de neumaticos',1,0,1,1);
    $pdf->Cell(70,6,$n->{"neumaticos"},1,1);


     $pdf->Cell(50,6,'Tipo de Cupula',1,0,1,1);
    $pdf->Cell(70,6,$n->{"cupula"},1,1);


     $pdf->Cell(50,6,'Tipo de portaescala',1,0,1,1);
    $pdf->Cell(70,6,$n->{"portaescala"},1,1);

$pdf->Cell(50,6,'Laminas de seguridad',1,0,1,1);
    $pdf->Cell(70,6,$n->{"laminas_seguridad"},1,1);

   $pdf->Cell(70,6,'',0,1,'C');//SALTO

        $pdf->Cell(50,6,'Observaciones',1,1,1,1);
    $pdf->MultiCell(190,6,$n->{"observaciones"},1,1);

}
//$pdf->Output('adjunto-temp.pdf',"F");

  $pdf->Output("../pdfenviado/".'cotizacion'.' N° '.$idcotizacion.'.pdf',"F");
    $pdf->Output("D");
?>




