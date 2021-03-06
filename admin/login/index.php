<?php
  include '../conexion/conexion.php';
  if ($_SERVER['REQUEST_METHOD']== 'POST') {
    $user = $con->real_escape_string(htmlentities($_POST['usuario']));
    $pass = $con->real_escape_string(htmlentities($_POST['contra']));
    $candado = ' ';
    //revisa si existe algún caracter elegido  y devuelve un entero con la posición de este
    $str_u = strpos($user,$candado);
    $str_p = strpos($pass,$candado);
    if (is_int($str_u)) {
      $user = '';
    }else{
      $usuario = $user;
    }
    if (is_int($str_p)) {
      $pass = '';
    }else{
      $pass2 = sha1($pass);
    }
    if ($user == null && $pass == null) {
      header('location:../extend/alerta.php?msj=El formato no es correcto&c=salir&p=salir&t=error');
    }else{
      $sel= $con->query("SELECT nick,nombre,nivel,correo,foto,pass FROM usuario WHERE nick='$usuario' AND pass = '$pass2' AND bloqueo = 1");
      // mysqli_num_rows devuelve el número de lineas (en entero) de una consulta para la base de datos
      $row = mysqli_num_rows($sel);
      if ($row == 1) {
        //fetch_assoc recorre la linea que devuelve la consulta a la base de datos y le asigna el valor a una variable determinada
        if ($var = $sel->fetch_assoc()) {
          $nick = $var['nick'];
          $contra = $var['pass'];
          $nivel = $var['nivel'];
          $correo = $var['correo'];
          $foto = $var['foto'];
          $nombre = $var['nombre'];
        }

        if ($nick == $usuario && $contra == $pass2 && $nivel == 'ADMINISTRADOR') {
          $_SESSION['nick'] = $nick ;
          $_SESSION['nombre'] = $nombre ;
          $_SESSION['nivel'] = $nivel ;
          $_SESSION['correo'] = $correo ;
          $_SESSION['foto'] = $foto ;
          header('location:../extend/alerta.php?msj=Bienvenido&c=home&p=home&t=success');
        }elseif ($nick == $usuario && $contra == $pass2 && $nivel == 'ASESOR') {
          $_SESSION['nick'] = $nick ;
          $_SESSION['nombre'] = $nombre ;
          $_SESSION['nivel'] = $nivel ;
          $_SESSION['correo'] = $correo ;
          $_SESSION['foto'] = $foto ;
          header('location:../extend/alerta.php?msj=Bienvenido&c=home&p=home&t=success');
        }else{
          header('location:../extend/alerta.php?msj=No tienes permiso para entrar&c=salir&p=salir&t=error');
        }
      }else{
        header('location:../extend/alerta.php?msj=Nombre de usuario o contraseña incorrecta&c=salir&p=salir&t=error');
      }
    }
  }else{
    header('location:../extend/alerta.php?msj=Utilice el formulario&c=salir&p=salir&t=error');
  }
?>
