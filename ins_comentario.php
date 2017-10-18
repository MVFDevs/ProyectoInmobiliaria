<?php
include 'admin/conexion/conexion_web.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$nombre = htmlentities($_POST['nombre']);
$telefono = htmlentities($_POST['telefono']);
$correo = htmlentities($_POST['correo']);
$mensaje = htmlentities($_POST['mensaje']);
$id_propiedad = htmlentities($_POST['id_propiedad']);
$id = '';
$estatus = "NUEVO";
$ins = $con->prepare("INSERT INTO comentario VALUES(?,?,?,?,?,?,?) ");
$ins->bind_param("issssss",$id, $id_propiedad, $nombre, $telefono, $correo, $mensaje,$estatus);
if ($ins->execute()) {
echo "<h5 style='color:green;'>Su mensaje ha sido enviado</h5>";
}else{
  echo "<h5 style='color:red;'>Su mensaje no ha sido enviado</h5>";
}
  $ins->close();
  $con->close();
  }else {
    echo "<h5 style='color:red;'>Utilice el formulario</h5>";
  }
 ?>
