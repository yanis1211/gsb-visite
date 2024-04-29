<?php
include_once 'header.php';
include_once './helpers/session_helper.php';
?>



<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet">
<section class="co">
  <div id="login" class="container">
    <div class="row-fluid">
      <div class="span12">
        <div class="login well well-small">
          <div class="center">
            <img src="images/logo.png" alt="logo">
          </div>

          <form method="post" action="./controllers/Users.php">
            <input type="hidden" name="type" value="login">
            <input type="text" name="login" placeholder="Username/Email...">
            <input type="password" name="usersPwd" placeholder="Mot de passe">
            <button class="btn btn-primary btn-large btn-block" type="submit" name="submit">Connexion</button>
            <?php flash('login') ?>
          </form>


        </div><!--/.login-->
      </div><!--/.span12-->
    </div><!--/.row-fluid-->
  </div><!--/.container-->
</section>

<?php
include_once 'footer.php'
?>