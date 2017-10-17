<?php include '../extend/header.php';
if (isset($_GET['ope'])) {
  $operacion = $con->real_escape_string(htmlentities($_GET['ope']));
  $sel = $con->prepare("SELECT propiedad,consecutivo,nombre_cliente,calle_num,fraccionamiento,estado,municipio,precio,forma_pago,asesor,tipo_inmueble,operacion,mapa FROM inventario WHERE estatus = 'ACTIVO'  AND operacion = ?");
  $sel->bind_param('s',$operacion);
}else {
  $sel = $con->prepare("SELECT propiedad,consecutivo,nombre_cliente,calle_num,fraccionamiento,estado,municipio,precio,forma_pago,asesor,tipo_inmueble,operacion,mapa FROM inventario WHERE estatus = 'ACTIVO'");

}

?>
<br>
<div class="row">
  <div class="col s12">
    <nav class="brown lighten-3" >
      <div class="nav-wrapper">
        <div class="input-field">
          <input type="search"   id="buscar" autocomplete="off"  >
          <label for="buscar"><i class="material-icons" >search</i></label>
          <i class="material-icons" >close</i>
        </div>
      </div>
    </nav>
  </div>
</div>
<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content">
        <form action="excel.php" method="post" target="_blank" id="exportar">
        <span class="card-title">Propiedades
        <button class="btn-floating green botonExcel"><i class="material-icons">grid_on</i></button>
        <input type="hidden" name="datos" id="datos">
        </span>
        </form>
        <table class="excel" border="1">
          <thead>
            <tr class="cabecera">
              <th class="borrar">Vista</th>
              <th>Num</th>
              <th>Cliente</th>
              <th>Propiedad</th>
              <th>Precio</th>
              <th>Credito</th>
              <th>Asesor</th>
              <th>Tipo</th>
              <th>Operacion</th>
              <th colspan="3" class="borrar">Opciones</th>
            </tr>
          </thead>
          <?php
          $sel->execute();
          $res = $sel->get_result();
          while ($f =$res->fetch_assoc()) {?>
            <tr>
              <td class="borrar"><button data-target="modal1" onclick="enviar(this.value)" value="<?php echo $f['propiedad']?>" class="btn modal-trigger btn-floating"><i class="material-icons">visibility</i></button></td>
              <td><?php echo $f['consecutivo'] ?></td>
              <td><?php echo $f['nombre_cliente'] ?></td>
              <td><?php echo $f['calle_num'].' '.$f['fraccionamiento'].' '.$f['estado'].' ,'.$f['municipio'] ?></td>
              <td><?php echo "$".number_format($f['precio'],0) ?></td>
              <td><?php echo $f['forma_pago'] ?></td>
              <td><?php echo $f['asesor'] ?></td>
              <td><?php echo $f['tipo_inmueble'] ?></td>
              <td><?php echo $f['operacion'] ?></td>
              <td class="borrar"><a href="imagenes.php?id=<?php echo $f['propiedad']?>" class="btn-floating pink"><i class="material-icons">image</i></a></td>
              <td class="borrar"><a href="mapa.php?mapa=<?php echo $f['mapa']?>" class="btn-floating orange" target="_blank"><i class="material-icons">room</i></a></td>
              <td class="borrar"><a href="pdf.php?id=<?php echo $f['propiedad']?>" class="btn-floating green"><i class="material-icons">picture_as_pdf</i></a></td>
              <td class="borrar"><a href="editar_propiedad.php?id=<?php echo $f['propiedad']?>" class="btn-floating blue"><i class="material-icons">loop</i></a></td>
              <td class="borrar"><a href="#" class="btn-floating red" onclick="swal({title: 'Estás seguro de cancelar la propiedad?',
              type: 'warning',showCancelButton: true,confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',confirmButtonText: 'Sí, cancelar'}).then(function () {
              location.href='cancelar_propiedad.php?id=<?php echo $f['propiedad'] ?>&accion=CANCELADO';})"><i class="material-icons">delete</i></a></td>
            </tr>
          <?php }
          $sel->close();
          $con->close();
           ?>
        </table>
      </div>
    </div>
  </div>
</div>
<div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Información</h4>
      <div class="res_modal"></div>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cerrar</a>
    </div>
  </div>
<?php include '../extend/scripts.php'; ?>
<script>
  $('.modal').modal();
  function enviar(valor) {
    $.get('modal.php',{
      id:valor,
      beforeSend: function () {
        $('.res_modal').html("Espere un momento por favor...");
      }
    }, function (respuesta) {
      $('.res_modal').html(respuesta);
    });
  }

</script>
<script>
  $('.botonExcel').click(
    function () {
      $('.borrar').remove();
      $('#datos').val($("<div>").append($('.excel').eq(0).clone()).html());
      $('#exportar').submit();
      setInterval(function() {
        location.reload();
      },3000);
    }
  );
</script>

</body>
</html>