<?php
include '../extend/header.php';
include '../extend/permiso.php';

 ?>
 <div class="row">
   <div class="col s12">
     <div class="card">
       <div class="card-content">
         <span class="card-title">Alta  de usuarios</span>
         <!-- FORMULARIO PARA EL INGRESO DE USUARIOS CON FOTO EN EL PANEL ADMINISTRATIVO -->
         <form class="form" action="ins_usuarios.php" method="post" enctype="multipart/form-data">
           <!-- Input obligatorio con autofocus que traspasa por una función a mayusculas para el nick del usuario  -->
           <div class="input-field">
             <input type="text" name="nick" required autofocus title="DEBE DE CONTENER ENTRE 8 Y 15 CARACTERES, SOLO LETRAS" pattern="[A-Za-z]{8,15}" id="nick" onblur="may(this.value, this.id)">
             <label for="nick">Nick:</label>
           </div>
           <!-- Div donde se generará un label para dar verificación sobre la disponibilidad del nick a través de ajax -->
           <div class="validacion">
           </div>
           <!-- Input para la contraseña del usuario -->
           <div class="input-field">
             <input type="password" name="pass1"  title="CONTRASEÑA CON NUMEROS, LETRAS MAYUSCULAS Y MINUSCULAS ENTRE 8 Y 15 CARACTERES " pattern="[A-Za-z0-9]{8,15}" id="pass1" required>
             <label for="pass1">Contraseña</label>
           </div>
           <!-- Input para la verificación de la contraseña de usuario -->
           <div class="input-field">
             <input type="password"  title="Contraseña con números, letras mayusculas y minusculas entre 8 y 15 caracteres" pattern="[A-Za-z0-9]{8,15}" id="pass2" required>
             <label for="pass2">Verificar contraseña</label>
           </div>
           <!-- Combobox con opciones para determinar el nivel de usuario a registrar -->
           <select  name="nivel" required>
             <option disabled selected value="">Elige nivel de usuario</option>
             <option value="ADMINISTRADOR">Administrador</option>
             <option value="ASESOR">Asesor</option>
           </select>
           <!--Input nombre de usuario -->
           <div class="input-field">
             <input type="text" name="nombre"  title="Nombre del usuario" id="nombre" required onblur="may(this.value, this.id)" pattern="[A-Z/s ]+">
             <label for="nombre">Nombre completo del usuario</label>
           </div>
           <!--Input correo electrónico -->
           <div class="input-field">
             <input type="email" name="correo"  title="Correo Electronico" id="correo" >
             <label for="correo">Correo Electrónico</label>
           </div>
           <!-- Subir foto de cada usuario  -->
           <div class="file-field input-field">
             <div class="btn">
               <span>Foto:</span>
               <input type="file" name="foto">
             </div>
             <div class="file-path-wrapper">
               <input class="file-path validate" type="text">
             </div>
           </div>
           <button type="submit" class="btn black" id="btn_guardar">Guardar <i class=material-icons>send</i></button>
         </form>
       </div>
     </div>
   </div>
 </div>
 <!-- buscador para la tabla de usuarios -->
 <div class="row">
   <div class="col s12">
     <nav class="indigo">
       <div class="nav-wrapper">
         <div class="input-field">
           <input type="search" id="buscar" autocomplete="off">
           <label for="buscar">
            <i class="material-icons">search</i>
           </label>
           <i class="material-icons light-blue-text text-darken-1">close</i>
         </div>
       </div>
     </nav>
   </div>
 </div>
 <!-- busqueda de numero de filas en la BD -->
 <?php $sel= $con->query("SELECT * FROM usuario");
$row = mysqli_num_rows($sel);
  ?>
  <!--Tabla de datos de los usuarios en la BD-->
 <div class="row">
   <div class="col s12">
     <div class="card">
       <div class="card-content">
         <span class="card-tittle">Usuarios(<?php echo $row ?>)</span>
         <table>
           <thead>
             <tr class="cabecera">
             <th>Nick</th>
             <th>Nombre</th>
             <th>Correo</th>
             <th>Nivel</th>
             <th></th>
             <th>Foto</th>
             <th>Bloqueo</th>
             <th>Eliminar</th>
             </tr>
           </thead>
           <?php while($f = $sel->fetch_assoc()){ ?>
             <tr>
               <td><?php echo $f['nick'] ?></td>
               <td><?php echo $f['nombre'] ?></td>
               <td><?php echo $f['correo'] ?></td>
               <td>
                 <form action="up_nivel.php" method="post">
                   <input type="hidden" name="id" value="<?php echo $f['id'] ?>">
                   <select  name="nivel" required>
                     <option value="<?php echo $f['nivel'] ?>"><?php echo $f['nivel'] ?></option>
                     <option value="ADMINISTRADOR">Administrador</option>
                     <option value="ASESOR">Asesor</option>
                   </select>
               </td>
               <td>
                 <button type="submit" class="btn-floating"><i class="material-icons">repeat</i></button>
                 </form>
               </td>
               <td><img src="<?php echo $f['foto'] ?>" width="50" class="circle"></td>
               <td><a href="bloqueo_manual.php?us=<?php echo $f['id'] ?>&bl=<?php echo $f['bloqueo'] ?>"></a>
                 <?php  if($f['bloqueo']==1): ?>
                 <a href="bloqueo_manual.php?us=<?php echo $f['id'] ?>&bl=<?php echo $f['bloqueo'] ?>"><i class="material-icons green-text">lock_open</i></a>
               <?php else: ?>
                  <a href="bloqueo_manual.php?us=<?php echo $f['id'] ?>&bl=<?php echo $f['bloqueo'] ?>"><i class="material-icons red-text">lock_outline</i></a>
               <?php  endif; ?>
               </td>
               <td>
                 <a href="#" class="btn-floating red" onclick="swal({title: 'Estás seguro de eliminar el cliente?',
                 text: 'Al eliminarlo no podras recuperarlo',type: 'warning',showCancelButton: true,confirmButtonColor: '#3085d6',
                 cancelButtonColor: '#d33',confirmButtonText: 'Sí, eliminarlo'}).then(function () {
                 location.href='eliminar_usuario.php?id=<?php echo $f['id'] ?>';})"><i class="material-icons">clear</i></a>
               </td>

             </tr>
           <?php } ?>
         </table>
       </div>
     </div>
   </div>
 </div>
 <?php
 include '../extend/scripts.php'
  ?>
  <!-- Ajax para el envío del nick para la verificación de disponibilidad de este -->
  <script src="../js/validacion.js">

  </script>
</body>
</html>
