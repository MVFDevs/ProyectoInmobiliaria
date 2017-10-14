<?php
include '../conexion/conexion.php';

if ($_SERVER['REQUEST_METHOD']=='POST') {
$id = htmlentities($_POST['id']);
$foto = htmlentities($_POST['ANTERIOR']);
$ruta = $_FILES['foto']['tmp_name'];
$imagen = $_FILES['foto']['name'];
$ancho = 500;
$alto = 400;
$info = pathinfo($imagen);
$tamano  = getimagesize($ruta);
$width = $tamano[0];
$heigth = $tamano[1];
$con->close();
  }else {
    header('location:../extend/alerta.php?msj=Utiliza el formulario&c=prop&p=img&t=error&id='.$id'');
  }
 ?>
