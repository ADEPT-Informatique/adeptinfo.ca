<?php session_start();
/**
 * detail.php
 * Created by Olivier Brassard on 21-12-17.
 * Copyright © 2017 Olivier Brassard. All rights reserved.
 */

if (!isset($_SESSION['AdminID'])){
    header('Location: connexion.php');
    die();
}
require_once "moduleFunctions.php";

$reservationId = validateGet('id');
$reservation = GetOneClientReservation($reservationId);

$sizes = array('S'=>'Petit','M'=>'Moyen','L'=>'Grand', 'XL'=>'Très grand', 'N' => 'À déterminer')
?>


<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Gestion des réservations</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="style.css" />


        <!-- Favicons -->
        <link href="../img/favicon.png" rel="icon">
        <link href="../img/apple-touch-icon.png" rel="apple-touch-icon">

        <script   src="https://code.jquery.com/jquery-3.3.1.min.js"   integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="   crossorigin="anonymous"></script>
    
    
    </head>
    <body>

        <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-primary">
            <a class="navbar-brand" href="#">Gestion des réservations</a>
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
            <div class="row">
                <div class="col-md-12">
                    <a class="btn btn-primary" href="admin.php"><i class="fa fa-chevron-left"></i> Retour à la liste</a>
                    <button class="btn btn-danger pull-right delete" id="<?php echo $reservationId; ?>" ><i class="fa fa-trash"></i> Supprimer cette réservation</button>
                </div>
                <div class="col-md-12">
                    <h3>Détails de la réservation</h3>
                    <hr>
                </div>
                <div class="col-md-12">
                    <?php if (validateGet('update')=='fail') { ?>
                        <div class="alert alert-danger">Une erreur est survenue lors de l'enregistrement des modifications.</div>
                    <?php } else if (validateGet('update')=='fail-invalidrecup') { ?>
                        <div class="alert alert-danger"><strong>Impossible de marquer une commande comme récupérée si le montant total n'a pas été payé.</strong><br>Les modifications n'ont pas été enregistrées.</div>
                    <?php } else if (validateGet('update')=='success') { ?>
                        <div class="alert alert-success">Vos modifications ont été enregistrées</div>
                    <?php } ?>
                    <script>
                        $( document ).ready(function() {
                            $('.alert.alert-danger').delay(6000).slideUp('slow');
                            $('.alert.alert-success').delay(3700).slideUp('slow');
                        });
                    </script>
                </div>
                <div class="col-md-4">
                    <div><span class="strong">Membre : </span><?php echo $reservation['Prenom'].' '.$reservation['Nom']?></div>
                    <div><span class="strong">Email : </span><?php echo $reservation['Email']?></div>
                    <div><span class="strong">Numéro d'étudiant : </span><?php echo $reservation['NumEtudiant']?></div>
                    <div><span class="strong">Numéro de réservation:  </span><?php echo $reservation['NumeroReservation']?></div>
                    <br>
                    <div><span class="strong">Paiement restant:  </span></div>
                    <div class="super">
                        <?php echo (40-$reservation['Depot'])?> $
                    </div>
                    <br>
                </div>
                <div class="col-md-8">
                    <form action="editReservation.php" method="post" role="form">
                        <input type="hidden" name="id" value="<?php echo $reservationId; ?>">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label class="label strong" for="depot">Montant du dépot courrant</label>
                                <input type="number" name="depot" class="form-control" value="<?php echo $reservation['Depot'] ?>" placeholder="Montant du dépot" id="depot" required  min="0" max="40"/>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="label strong" for="size">Taille du hoodie</label>
                                <select class="custom-select" name="size" id="size">

                                    <?php foreach ($sizes as $size => $text){

                                        if ($size == $reservation['Taille']){
                                            echo '<option selected value="'.$size.'">'.$text.'</option>';
                                        } else {
                                            echo '<option value="'.$size.'">'.$text.'</option>';
                                        }

                                    } ?>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="custom-control custom-checkbox">
                                            <?php if($reservation['HoodieRecupere']) {
                                                echo '<input type="checkbox" name="isrecupered"  class="custom-control-input" id="isrecupered" value="yes" checked>';
                                            } else {
                                                echo '<input type="checkbox" name="isrecupered"  class="custom-control-input" id="isrecupered" value="yes">';
                                            } ?>
                                            <label class="custom-control-label" for="isrecupered">Le hoodie à été récupéré</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <input type="submit" class="btn btn-success btn-block" value="Enregistrer les modifications">
                            </div>
                    </form>
                </div>
            </div>
        </div>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        <script src="script.js"></script>
    </body>
</html>
