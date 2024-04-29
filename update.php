<?php 
    include_once 'header.php';
    include_once './helpers/session_helper.php';

?>

 <!-- <h1 class="header">modifier votre rapport</h1> -->

<?php flash('updateReport') ?>

<!-- <form method="post" action="./controllers/AllRapports.php">
    <input type="hidden" name="type" value="updateReport">
    <input type="hidden" name="id" value="<?php echo $_POST['submit']?>">
    <input type="date" name="date" 
    placeholder="selectionner la date">
    <input type="text" name="motif" 
    placeholder="motif...">
    <input type="text" name="bilan" 
    placeholder="bilan...">
 
    <button type="submit" name="submit">modifier le rapport</button>
</form> -->

<div class="form">
    <div class="form-holder">
        <div class="form-content">
            <div class="form-items">
                <h3>Modifier Un Rapport</h3>
                <p>Remplissez les champs munissez vous au préalable de votre identifiant</p>
                <form method="post" action="./controllers/AllRapports.php">
                    <input type="hidden" name="type" value="updateReport">
                    <input type="hidden" name="id" value="<?php echo $_POST['submit'] ?>">
                    <input type="date" name="date" placeholder="selectionner la date">
                    <input type="text" name="motif" placeholder="motif...">
                    <input type="text" name="bilan" placeholder="bilan...">
                    <div class="form-button mt-3">
                        <button type="submit" name="submit" class="btn btn-primary">modifier le rapport</button>

                    </div>

                </form>






            </div>
        </div>
    </div>
</div>

<?php 
    include_once 'footer.php'
?>


