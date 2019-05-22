<?php include("../modelo/session.php"); ?>

<!doctype html>
<html>
<head>
	<title></title>
</head>


<?php
function getRealIP() {
        if (!empty($_SERVER['HTTP_CLIENT_IP']))
            return $_SERVER['HTTP_CLIENT_IP'];           
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
            return $_SERVER['HTTP_X_FORWARDED_FOR'];       
           return $_SERVER['REMOTE_ADDR'];
}

?>



<body>

   <?php foreach($sqln as $n):?> 
      <td height="46" class="centro">|Tipo usuario: <strong><?php echo $n->perfil ?> 
  </strong></td>
  <td height="46" class="centro">| Nombre: <strong><?php echo $n->nombre_coordinador ?> | IP: 
  </strong></td>
   <td height="46" class="centro"><strong><?php echo "{$_SERVER['REMOTE_ADDR']}";?></strong></td>
   <strong> |


 <?php endforeach;?>  



   </strong>
</body>
</html>