<?php

include("conexion2.php");

$fecha_negocio=$_POST["fecha_negocio"];
$idcotizacion=$_POST["idcotizacion"];
$estado=$_POST["estado"];



$sql2="UPDATE COTIZACION SET
 idcotizacion=:idcotizacion,
 estado_cotizacion=:estado,
 fecha_negocio=:fecha_negocio 
  WHERE idcotizacion=:idcotizacion ";

$resultado=$conn->prepare($sql2);
$resultado->execute(array(
":idcotizacion"=>$idcotizacion,
":estado"=>$estado,
":fecha_negocio"=>$fecha_negocio
));


//#TRIGGE QUE AL MOMENTO DE ENVIAR LA COTIZACION INSERTA DATOS EN LA TABLA ASIGNACION
//CREATE TRIGGER `tg_envio_cotizacion` AFTER UPDATE ON `cotizacion` 
//FOR EACH ROW insert into asignacion 
//(COTIZACION_idcotizacion,estado_cotizacion,fecha_negocio,fecha_asignacion,USUARIO_idusuario,usuario)
//values 
//(new.idcotizacion,new.estado_cotizacion,new.fecha,null,null,null);
//



//ESTA ES LA PARTE DONDE SE ENVIA LA NOTIFICACION POR CORREO. 


$idcotizacion=$_POST["idcotizacion"];
$usuario=$_POST["usuario"];
$empresa=$_POST["empresa"];

//ver pasar el correo y la clave del usuario



$body="Favor gestionar la cotización N° ".$idcotizacion.", "."de nuestro cliente ".$empresa."."."<br> atentamente "." <br>".$usuario;



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require ('PHPMailer/Exception.php');
require ('PHPMailer/PHPmailer.php');
require ('PHPMailer/SMTP.php');

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->CharSet = 'UTF-8';
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                               // Set mailer to use SMTP
   // $mail->Host = 'mail.autorentas.cl';  // Specify main and backup SMTP servers
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    //$mail->Username = 'ifigueroa@hertz.cl';                 // SMTP username
   $mail->Username = 'cotizacionmitta';                 // SMTP username
   // $mail->Password = 'hertz123';                           // SMTP password
  $mail->Password = 'mitta1234';   
    $mail->SMTPSecure = 'TLS';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    //  $mail->setFrom('cotizacionmitta@gmail.com', $idcotizacion,' cliente ',$empresa);
    $mail->setFrom('cotizacionmitta@gmail.com');
    //$mail->setFrom('Solicitud', $idcotizacion,' cliente ',$empresa);
    $mail->addAddress('ifigueroa@mitta.cl', 'Ivan');     // Add a recipient

    $mail->addAddress('ifigueroatoro@gmail.com');               // Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Content
    $mail->isHTML(true);   // Set email format to HTML
    $mail->Subject = "Solicitud de cotizacion N° ".$idcotizacion;
    $mail->Body    = $body;
      // $mail->addAttachment('images/phpmailer_mini.png');
    //$mail->addAttachment('adjunto-temp.pdf' );
     $mail->addAttachment("../pdfenviado/".'cotizacion'.' N° '.$idcotizacion.'.pdf');

    
 

    $mail->send();

    echo '<script>
    alert("El mensaje fue enviado correctamente".<?php  ?>);
    windows.history.go(-1);
    </script>';
header("Location:index.php");


} catch (Exception $e) {
    echo 'HAY UN ERROR EN LA CONFIGURACION DEL MAIL: ', $mail->ErrorInfo;
}

header("Location:../vista/inicio_adm.php?action=lista_cotizacion_adm");


 ?>