<?php 
    include_once 'header.php'
?>


    

<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Prenom</th>
      <th scope="col">Nom</th>
    </tr>
  </thead>
  <tbody>


  <?php
foreach($_SESSION['doctorsList'] as $doctor){

    
?>
<tr>
      <td scope="row"><?php echo utf8_encode($doctor->id); ?></td>
      <td><?php echo utf8_encode($doctor->prenom); ?></td>
      <td> 
      <form method="post" action="rapport.php">
    <input type="hidden" name="type" value="get">
    <button type="submit" name="submit" type="button" class="btn btn-primary" href="rapport.php">
      <?php echo utf8_encode($doctor->nom); ?> </button>  </form></td>  
</tr>

<?php
}
?>
  </tbody>
</table>

<?php 
    include_once 'footer.php'
?>

