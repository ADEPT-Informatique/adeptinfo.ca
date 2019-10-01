<?php
/**
 * candidatureMdc.php
 * Created by Olivier Brassard on 02-08-18.
 * Copyright © 2018 Olivier Brassard. All rights reserved.
 */

require_once "requestsHandlers.php";
require_once "../model/bdconnect.php";

$prenom = validatePost("prenom");
$nom = validatePost("nom");
$email = validatePost("email");
$numetu = validatePost("numetu");
$motivations = validatePost("motivation");
$qualifiaction = validatePost("qualifications");
$branche = validatePost("branche");
$participation = validatePost("participation");

if(!($nom && $prenom && $email && $numetu && $motivations && $qualifiaction
    && $branche && $participation && isset($_POST['postes'][0])) || !(preg_match('/[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\\.[a-zA-Z0-9-.]+/',$email))){
    //Verifier que tous les champs sont valides
    header('Location: ../comitelan.php?r=error');
    die();
} else {
    $choix1 = $_POST['postes'][0];
    if (isset($_POST['postes'][1])){
        $choix2 = $_POST['postes'][1];
    } else {
        $choix2 = null;
    }

    $bdd = connect_DB();

    try{
        $request = $bdd -> prepare("INSERT INTO `CandidaturesChefComiteLan`(`Nom`, `Prenom`, `NumEtudiant`, `Branche`, `Qualifications`, `ChoixPoste1`, `ChoixPoste2`, `Motivation`, `Participation`, `Email`)
        VALUES(:Nom, :Prenom, :NumEtudiant, :Branche, :Qualifications, :ChoixPoste1, :ChoixPoste2, :Motivation, :Participation, :Email)");
        $request ->execute(array(
            "Nom" => $nom ,
            "Prenom" => $prenom ,
            "NumEtudiant" => $numetu ,
            "Branche" => $branche ,
            "Qualifications" => $qualifiaction ,
            "ChoixPoste1" => $choix1 ,
            "ChoixPoste2" => $choix2 ,
            "Motivation" => $motivations ,
            "Participation" => $participation ,
            "Email" => $email
        ));

    }catch (Exception $e){
        header('Location: ../comitelan.php?r=error');
        die($e->getMessage());
    }
}
header('Location: ../comitelan.php?r=success');