<?php
/**
 * search.php
 * Created by Olivier Brassard on 01-03-18.
 * Copyright © 2018 Olivier Brassard. All rights reserved.
 */
session_start();

if (!isset($_SESSION['AdminID'])){
    header('Location: connexion.php');
    die();
}

require_once "moduleFunctions.php";

$numEtu = validatePost("numEtudiant");

if(!$numEtu){
    header('Location: admin.php?result=none');
    die();
}

$reservationID = GetReservationByStudentId($numEtu);

if (!$reservationID){
    header('Location: admin.php?result=none');
    die();
} else {
    header('Location: detailsReservation.php?id='.$reservationID);
}
