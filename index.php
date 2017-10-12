<?php @session_start();
if (isset($_SESSION['nick'])) {
  header('location:inicio');
} ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Proyecto</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie-edge">
        <link rel="stylesheet" type="text/css" href="css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.8/sweetalert2.css">
    </head>
    <body class="grey lighten-2">
        <main>
          <div class="row">
            <div class="input-field center">
              <img src="img/logofinal.svg" alt="Logo MVFDevs" width="200" class="circle">
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col s12">
                <!-- z-depth para sombras !-->
                <div class="card z-depth-5">
                  <div class="card-content">
                    <span class="card-tittle"><center>Inicio de sesión</center></span>
                    <form  action="login/index.php" method="post" autocomplete="off">
                      <div class="input-field">
                        <i class="material-icons prefix">perm_identity</i>
                        <input type="text" name="usuario" id="usuario" required pattern="[A-Za-z]{8,15}" autofocus>
                        <label for="usuario">Usuario</label>
                      </div>
                      <div class="input-field">
                        <i class="material-icons prefix">vpn_key</i>
                        <input type="password" name="contra" id="contra" required pattern="[A-Za-z0-9]{8,15}">
                        <label for="contra">Contraseña</label>
                      </div>
                      <div class="input-field center">
                        <button type="submit" class="btn waves-effect waves-light">Acceder</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </main>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="crossorigin="anonymous"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>
      </body>
      </html>
