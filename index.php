<?php
include 'admin/conexion/conexion_web.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Sitio web</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="admin/css/materialize.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
<nav class="red">

</nav>
<div class="slider">
  <ul class="slides">
    <?php
    $sel = $con->prepare("SELECT * FROM slider");
    $sel -> execute();
    $res = $sel->get_result();
    while ($f = $res->fetch_assoc()) {?>
    <li>
      <img src="admin/inicio/<?php echo $f['ruta']?>"> <!-- random image -->
      <div class="caption center-align">
        <h3>Empresa</h3>
        <h5 class="light grey-text text-lighten-3">Slogan de la empresa</h5>
      </div>
    </li>
  <?php }
  $sel->close();
  ?>
  </ul>
</div>


<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="crossorigin="anonymous"></script>
<script type="text/javascript" src="admin/js/materialize.min.js"></script>
<script>
  $('.slider').slider();
</script>
</body>
</html>
