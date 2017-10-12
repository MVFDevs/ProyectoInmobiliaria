<?php
include '../conexion/conexion.php';
$id = $con->real_escape_string(htmlentities($_GET['us']));
$bloqueo = $con->real_escape_string(htmlentities($_GET['bl']));
if ($bloqueo == 1 ) {
  $up= $con->query("UPDATE usuario SET bloqueo=0 WHERE id='$id'");
  if ($up) {
    header('location:../extend/alerta.php?msj=El usuario a sido bloqueado&c=us&p=in&t=success');
  }else{
    header('location:../extend/alerta.php?msj=El usuario no ha sido bloqueado&c=us&p=in&t=error');
  }
}else{
  $up= $con->query("UPDATE usuario SET bloqueo=1 WHERE id='$id'");
  if ($up) {
    header('location:../extend/alerta.php?msj=El usuario a sido desbloqueado&c=us&p=in&t=success');
  }else{
    header('location:../extend/alerta.php?msj=El usuario no ha sido desbloqueado&c=us&p=in&t=error');
  }
}
 ?>
