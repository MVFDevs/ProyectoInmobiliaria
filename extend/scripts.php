</main>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="crossorigin="anonymous"></script>
<script type="text/javascript" src="../js/materialize.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.8/sweetalert2.js"></script>
<script>
$('.datepicker').pickadate({
  format: 'yyyy-m-d',
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15, // Creates a dropdown of 15 years to control year,
    today: 'Hoy',
    clear: 'Limpiar',
    close: 'Ok',
    closeOnSelect: false // Close upon selecting a date,
  });
  $('#buscar').keyup(function(event){
    var contenido = new RegExp($(this).val(),'i');
    $('tr').hide();
    //filtro del texto que está en el input del buscador
    $('tr').filter(function () {
      return contenido.test($(this).text());
    }).show();
    $('.cabecera').attr('style','');
  });

  $('.button-collpase').sideNav();
  $('select').material_select();
  function may(obj,id) {
    obj = obj.toUpperCase();
    document.getElementById(id).value = obj;
  }
</script>
