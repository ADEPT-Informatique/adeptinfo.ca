<?php session_start();
/**
 * index.php
 * Created by Olivier Brassard on 21-12-17.
 * Copyright © 2017 Olivier Brassard. All rights reserved.
 */

if (!isset($_SESSION['AdminID'])){
    header('Location: connexion.php');
    die();
}

require_once "moduleFunctions.php";

$Actions = GetHistory();


?>


<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Historique des modifications - ADEPT</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
        <link rel="stylesheet" href="style.css" />
    </head>
    <body>

        <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-primary">
            <a class="navbar-brand" href="#">Historique des modifications</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">

                </ul>
                <ul class="navbar-nav my-2 my-lg-0 ">
                    <li class="nav-item ">
                        <a class="nav-link" href="historique.php">Historique</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="index.php">Retour au module de réservation</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="logout.php">Déconnexion</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container">

            <div class="col-md-12">
                <a class="btn btn-primary" href="admin.php"><i class="fa fa-chevron-left"></i> Retour à la liste</a>
            </div>
            <br>
            <div class="col-md-12">
                <h3>Historique des modifications</h3>
                <hr>
                <?php foreach ($Actions as $action ){

                    if ($action['Type'] == 'delete'){ ?>
                        <div class="row">
                            <div class="col-sm-1 icon-delete text-center"><i class="far fa-trash-alt"></i></div>
                            <div class="col-sm-11 align-self-center"><strong><?php echo $action['Admin']?></strong> a supprimé la réservation de <strong><?php echo $action['Nom']?></strong> le <?php echo $action['Date']?></div>
                        </div>
                    <?php } else if ($action['Type'] == 'update'){ ?>
                        <div class="row">
                            <div class="col-sm-1 icon-update text-center"><i class="far fa-money-bill-alt"></i></div>
                            <div class="col-sm-11 align-self-center"><strong><?php echo $action['Admin']?></strong> a mis à jour le montant du dépot de <strong><?php echo $action['Nom']?></strong> à <strong><?php echo $action['Depot']?>$</strong> le <?php echo $action['Date']?></div>
                        </div>

                    <?php } else if ($action['Type'] == 'recup'){ ?>
                        <div class="row">
                            <div class="col-sm-1 icon-recupered text-center"><i class="far fa-check-circle"></i></div>
                            <div class="col-sm-11 align-self-center"><strong><?php echo $action['Admin']?></strong> a indiqué la commande de <strong><?php echo $action['Nom']?></strong> comme récupérée le <?php echo $action['Date']?></div>
                        </div>
                    <?php }
                        echo '<hr>';
                    } ?>


            </div>

        </div>


        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        <script src="script.js"></script>
        <script>
            $( document ).ready(function() {
                $('.alert').delay(3500).slideUp('slow');
            });
        </script>
    </body>
</html>