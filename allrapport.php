<?php
include_once 'header.php'
?>

<table class="table table-dark" id="table">
  <thead>
    <tr>

      <th scope="col">
        <form method="post" action="controllers/AllRapports.php">
          <input type="hidden" name="type" value="search">
          <input type="date" name="find" placeholder="date" />
          <input type="submit" value="entrer" />
        </form>
      </th>
    </tr>
  </thead>
</table>

<table class="table table-dark" id="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">date</th>
      <th scope="col">motif</th>
      <th scope="col">bilan</th>
      <th scope="col">idVisiteur</th>
      <th scope="col">idMedecin</th>


    </tr>
  </thead>
  <tbody>


    <?php
    foreach ($_SESSION['reportsList'] as $edit) {


    ?>
      <tr>
        <td>
          <form method="post" action="update.php">
            <input type="hidden" name="type" value="get">
            <button type="submit" name="submit" type="button" value="<?php echo utf8_encode($edit->id) ?>" class="btn btn-primary" href="update.php"><?php echo utf8_encode($edit->id); ?> </button>
          </form>
        </td>
        <td><?php echo utf8_encode($edit->date); ?></td>
        <td> <?php echo utf8_encode($edit->motif); ?></td>
        <td> <?php echo utf8_encode($edit->bilan); ?></td>
        <td> <?php echo utf8_encode($edit->idVisiteur); ?></td>
        <td> <?php echo utf8_encode($edit->idMedecin); ?></td>
      </tr>

    <?php
    }
    ?>
  </tbody>
</table>

<?php
include_once 'footer.php'
?>