<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Login System</title>
    <link rel="stylesheet" href="./style/style.css" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>

<body>
    <nav class="Navigation">
        <ul>
            <a href="indexe.php"> <img src="images/logo.png" alt="logo site" class="logo">
            </a>
            <button class="BoutonAccueil" id="accueil">
                <a href="accueil.php">
                    <li>Accueil</li>
                </a>
            </button>
            <h1 id="index-text">Bienvenue, <?php if (isset($_SESSION['usersId'])) {
                                                echo explode(" ", $_SESSION['usersName'])[0];
                                            } else {
                                                echo 'Guest';
                                            }
                                            ?>
            </h1>
            <?php if (!isset($_SESSION['usersId'])) : ?>
                <button class="BoutonCo" id="connexion">
                    <a href="login.php">
                        <li> Connexion </li>
                    </a>
                </button>
            <?php else : ?>
                <button class="BoutonDeco" id="deconnexion">
                    <a href="./controllers/Users.php?q=logout">
                        <li>Deconnexion</li>
                    </a>
                </button>
            <?php endif; ?>
        </ul>
    </nav>