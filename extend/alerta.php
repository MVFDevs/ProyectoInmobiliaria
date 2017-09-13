<?php include '../conexion/conexion.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
<title>Proyecto</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.8/sweetalert2.css">
</head>
<body>

  <?php
  $mensaje = htmlentities($_GET['msj']);
  $c = htmlentities($_GET['c']);
  $p = htmlentities($_GET['p']);
  $t = htmlentities($_GET['t']);
  if ($t = 'error') {
    $titulo = "Ooopss...";
  }else{
    $titulo = "Lo haz hecho bien!";
  }
  switch ($c) {
    case 'us':
      $carpeta = '../usuarios/'
      break;
  }
  switch ($p) {
    case 'in':
      $carpeta = 'index.php';
      break;
  }
  $dir = $carpeta.$pagina;
   ?>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.8/sweetalert2.js"></script>
<script>
swal({
title: '<?php echo $titulo ?>',
text: "<?php echo $mensaje ?>",
type: '<?php echo $t ?>',
confirmButtonColor: '#3085d6',
confirmButtonText: 'Ok'
}).then(function () {
location.href='<?php echo $dir ?>';
});

</script>
</body>
</html>
