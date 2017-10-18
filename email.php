<?php
include 'admin/conexion/conexion_web.php';
if ($_SERVER['REQUEST_METHOD']=='POST') {
foreach ($_POST as $campo => $valor) {
  $variable = "$".$campo."='".htmlentities($valor)."';";
  eval($variable);
}
$header = "MIME-vERSION 1.0 \r\n ";
$header .="Content-Type: text/html; charset=iso-8859-1 \r\n";
$header .="From: {$nombre} < {$correo}> \r\n";

$mail = mail("mar.aggro@gmail.com",$asunto,$mensaje,$header);
if ($mail) {
  echo "<h5 style='color:green;'>Su mensaje ha sido enviado</h5>";
  }else{
    echo "<h5 style='color:red;'>Su mensaje no ha sido enviado</h5>";
  }

$con->close();
  }else {
    echo "<h5 style='color:red;'>Utilice el formulario</h5>";
  }
 ?>
