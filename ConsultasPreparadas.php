<?php
$id = 1;
$sel = $con->prepare("SELECT * FROM mitabla WHERE id= ?");
$sel -> bind_param('i',$id);
$sel -> execute();
$res = $sel->get_result();
 ?>
<table>
  <th>id estado</th>
  <th>nombre estado</th>
  <?php
    while ($f =$res->fetch_assoc()) {
   ?>
  <tr>
    <td><?php echo $f['id'] ?></td>
    <td><?php echo $f['estado'] ?></td>
  </tr>
  <?php   }
  $sel->close();
  $con->close();
   ?>
</table>


<?php
$id = 1;
$sel = $con->prepare("SELECT * FROM mitabla WHERE id= ?");
$sel -> bind_param('i',$id);
$sel -> execute();
$sel->bind_result($id,$estado);
 ?>
<table>
  <th>id estado</th>
  <th>nombre estado</th>
  <?php
    while ($sel->fetch()) {
   ?>
  <tr>
    <td><?php echo $id ?></td>
    <td><?php echo $estado ?></td>
  </tr>
  <?php   }
  $sel->close();
  $con->close();
   ?>
</table>
