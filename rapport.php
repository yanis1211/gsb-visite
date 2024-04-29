<?php
include_once 'header.php';
include_once './helpers/session_helper.php';

?>


<?php flash('register') ?>



<div class="form">
    <div class="form-holder">
        <div class="form-content">
            <div class="form-items">
                <h3>Créer Rapports</h3>
                <p>Remplissez les champs munissez vous au préalable de votre identifiant</p>
                <form method="post" action="./controllers/Rapports.php">
                    <input type="hidden" name="type" value="register">
                    <input type="date" name="date" placeholder="selectionner la date">
                    <input type="text" name="motif" placeholder="motif...">
                    <input type="text" name="bilan" placeholder="bilan...">
                    <input type="text" name="idVisiteur" placeholder="Veuillez entrer votre identifiant (Votre identifiant est <?php if (isset($_SESSION['usersId'])) {
                                                                                                                                    echo explode(" ", $_SESSION['usersId'])[0];
                                                                                                                                } ?>  )">
                    <input type="text" name="idMedecin" placeholder="Veuillez entrer l'identifiant du medecin ">





                    <div class="form-button mt-3">
                        <button type="submit" name="submit" class="btn btn-primary">enregistrer le rapport</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php
include_once 'footer.php'
?>