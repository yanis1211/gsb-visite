<?php
include_once 'header.php'
?>

<section class="Choix">
    <div class="Notre equipe">
        <form method="post" action="./controllers/SearchMedecins.php">
            <input type="hidden" name="type" value="get">
            <button id="Medecin" type="submit" name="submit">Nos Médecins</button>
        </form>
    </div>

    <div class="Rapportss">
        <form method="post" action="./controllers/Doctors.php">
            <input type="hidden" name="type" value="get">
            <button id="Rapports" type="submit" name="submit">Afficher les medecins</button>
        </form>
        <form method="post" action="./controllers/AllRapports.php">
            <input type="hidden" name="type" value="get">
            <button id="edit" type="submit" name="submit">Modifier un Rapport</button>
        </form>


    </div>

</section>


<?php
include_once 'footer.php'
?>