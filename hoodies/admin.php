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

$reservations = GetAllClientReservation();

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

            <div class="col-md-12">
                <?php $result = validateGet('result');
                if ($result == 'none'){ ?>
                    <div class="alert alert-info">
                        Il n'y a aucune réservation pour le numéro recherché.
                    </div>
                <?php } ?>
                <form method="post" action="search.php">
                    <div class="input-group">
                        <input class="form-control py-2 border-right-0 border" placeholder="Recherche par numéro d'étudiant" id="search" name="numEtudiant">
                        <span class="input-group-append" id="searchBtn">
                            <button type="submit" class="input-group-text" ><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                </form>

            </div>
            <br>
            <div class="col-md-12">
                <h3>Réservations</h3>
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col" class="text-center d-none d-md-table-cell">Petits</th>
                        <th scope="col" class="text-center d-none d-md-table-cell">Moyens</th>
                        <th scope="col" class="text-center d-none d-md-table-cell">Grands</th>
                        <th scope="col" class="text-center d-none d-md-table-cell">Très Grands</th>
                        <th scope="col" class="text-center d-none d-md-table-cell">À déterminer</th>
                        <th scope="col" class="text-center d-none d-md-table-cell">Profit estimé</th>
                    </tr>
                    </thead>
                    <tr>
                        <td class="info d-none d-md-table-cell"><?php echo GetCountReservationBySize('S')?></td>
                        <td class="info d-none d-md-table-cell"><?php echo GetCountReservationBySize('M')?></td>
                        <td class="info d-none d-md-table-cell"><?php echo GetCountReservationBySize('L')?></td>
                        <td class="info d-none d-md-table-cell"><?php echo GetCountReservationBySize('XL')?></td>
                        <td class="info d-none d-md-table-cell"><?php echo GetCountReservationBySize('N')?></td>
                        <td class="info d-none d-md-table-cell" style="color: limegreen"><?php echo (GetTotalCountReservation()*10.00).'$'?></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="container-fluid no-margin-xs">
            <div class="col-md-12">
                <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th class="d-none d-md-table-cell" scope="col">#</th>
                      <th scope="col">Nom</th>
                      <th class="d-none d-md-table-cell" scope="col">Num. Étudiant</th>
                      <th scope="col">Taille</th>
                      <th scope="col">Dépot actuel</th>
                      <th class="d-none d-md-table-cell" scope="col">Paiement restant</th>
                      <th scope="col">Hoodie Recupéré</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($reservations as $reservation){ ?>
                        <tr class="clickable" id="<?php echo $reservation['ReservationID']?>">
                          <th class="d-none d-md-table-cell" scope="row"><?php echo $reservation['NumeroReservation']?></th>
                          <td><?php echo $reservation['Prenom'].' '.$reservation['Nom']?></td>
                          <td class="d-none d-md-table-cell"><?php echo $reservation['NumEtudiant']?></td>
                          <td><?php echo $reservation['Taille']?></td>

                              <?php
                              if($reservation['Depot']==40){
                                echo '<td class="strong green">'.$reservation['Depot'].'$</td>';
                              }else if ($reservation['Depot']< 20){
                                  echo '<td class="strong red">'.$reservation['Depot'].'$</td>';
                              }else {
                                  echo '<td class="strong yellow">'.$reservation['Depot'].'$</td>';
                              }; ?>


                          <td class="d-none d-md-table-cell"><?php echo (40-$reservation['Depot']).' $'?></td>
                          <td><?php if($reservation['HoodieRecupere']){
                              echo 'Oui';
                              } else {
                              echo 'Non';
                              }?></td>
                        </tr>
                    <?php } ?>
                  </tbody>
                </table>
            </div>
        </div>


        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
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
