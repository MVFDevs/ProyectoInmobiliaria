<?php
include '../conexion/conexion.php';
if ($_SERVER['REQUEST_METHOD']=='POST') {
$nick = $con-> real_escape_string(htmlentities($_POST['nick']));
$pass1 = $con-> real_escape_string(htmlentities($_POST['pass1']));
$pass1 = sha1($pass1);
$nivel = $con-> real_escape_string(htmlentities($_POST['nivel']));
$nombre = $con-> real_escape_string(htmlentities($_POST['nombre']));
$correo = $con-> real_escape_string(htmlentities($_POST['correo']));
}else {
  header('location:../extend/alerta.php?msj=Utiliza el formulario&c=us&p=in&t=error');
}
 ?>
