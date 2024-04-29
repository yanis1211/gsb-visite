<?php 
    include_once 'header.php'
?>

<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">nom</th>
      <th scope="col">prenom</th>
      <th scope="col">adresse</th>
      <th scope="col">tel</th>
      <th scope="col">specialitecomplementaire</th>
      <th scope="col">departement</th>
    </tr>
  </thead>
  <tbody>


  <?php
    foreach($_SESSION['infoM'] as $edit){

    
?>
<tr>
        <td><?php echo utf8_encode($edit->id); ?></td>
      <td><?php echo utf8_encode($edit->nom); ?></td>
      <td> <?php echo utf8_encode($edit->prenom); ?></td>
      <td> <?php echo utf8_encode($edit->adresse); ?></td>
      <td> <?php echo utf8_encode($edit->tel); ?></td>
      <td> <?php echo utf8_encode($edit->specialitecomplementaire); ?></td>
</tr>

<?php
    }
?>
  </tbody>
  <?php
    if (isset($_SESSION['infoM']) && is_array($_SESSION['infoM'])) {
        foreach ($_SESSION['infoM'] as $edit) {
            // ...
        }
    } else {
        echo 'Aucun médecin trouvé.';
    }
  ?>

  </tbody>
</table>
</table>

<?php 
    include_once 'footer.php'
?>
