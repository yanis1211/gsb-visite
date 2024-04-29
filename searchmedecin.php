<?php
include_once 'header.php'
?>
<table class="table table-dark" id="table">
  <thead>
    <tr>
      <th scope="col">
        <form method="post" action="controllers/SearchMedecins.php">
          <input type="hidden" name="type" value="search">
          <input type="text" name="doc" placeholder="nom" />
          <input type="submit" value="entrer" />
        </form>
      </th>
    </tr>
  </thead>
  <tbody>



    <table class="table table-dark" id="table">
      <thead>
        <tr>
          <th scope="col">Nom</th>
        </tr>
      </thead>
      <tbody>


        <?php
        foreach ($_SESSION['searchMedecinList'] as $doctor) {
        ?>
          <tr>
            <td scope="row">
              <form method="post" action="infoM.php">
                <input type="hidden" name="type" value="get">
                <button type="submit" name="submit" type="button" class="btn btn-primary" href="infoM.php">
                  <?php echo utf8_encode($doctor->nom); ?> </button>
              </form>
            </td>
          </tr>

        <?php
        }
        ?>
      </tbody>
    </table>

    <?php
    include_once 'footer.php'
    ?>