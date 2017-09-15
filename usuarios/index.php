<?php
include '../extend/header.php';


 ?>
 <div class="row">
   <div class="col s12">
     <div class="card">
       <div class="card-content">
         <span class="card-tittle">Alta  de usuarios</span>
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
             <input type="password"  title="CONTRASEÑA CON NUMEROS, LETRAS MAYUSCULAS Y MINUSCULAS ENTRE 8 Y 15 CARACTERES " pattern="[A-Za-z0-9]{8,15}" id="pass2" required>
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
 <?php
 include '../extend/scripts.php'
  ?>
  <!-- Ajax para el envío del nick para la verificación de disponibilidad de este -->
  <script src="../js/validacion.js">

  </script>
</body>
</html>
