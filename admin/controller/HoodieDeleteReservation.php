<?php 
session_start();
/**
 * deleteReservation.php
 * Created by Olivier Brassard on 28-02-18.
 * Copyright © 2018 Olivier Brassard. All rights reserved.
 */
require_once("../model/HoodieModuleFunctions.php");
require_once('../model/bd_utilisateur.php');

$userID = 'visiteur';
$roleID = '8';
if( isset($_SESSION['user']) && isset($_SESSION['roleID'])) {
    $userID = $_SESSION['user'];
    $roleID = $_SESSION['roleID'];
    if (!hasDashPerms(getInfo($userID,'roleID'))){
        header('Location: ../index.php?error=3');
    }
}
else{
    $_SESSION['user'] = 'visiteur'; 
    $_SESSION['roleID'] = '8';
    header('Location: ../index.php?error=3');
}

$id = validateGet('resId');
SaveInHistory(array('userID'=>$_SESSION['user'], 'ReservationID' =>$id, 'Nom'=> GetName($id), 'Type'=>'delete','Recup'=>false, 'Depot'=>null));


$email = GetEmail($id);
DeleteReservation($id);


$msg = "Bonjour ".$prenom."!<br>Nous voulons vous aviser que votre réservation du Hoodie du département informatique à été annulée.<br>
Si vous croyez qu'il s'agit d'une erreur, s'il vous plait contactez un membre du CA de l'ADEPT.
<br><br>Passez une excellente journée!<br>Cordialement, l'équipe de l'ADEPT !";

$msg = wordwrap($msg,70);

$headers = 'From: noreply@adeptinfo.ca' . "\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
// send email
mail($email,"ADEPT - Annulation de ta réservation",$msg,$headers);

header('Location: ../view/HoodieIndex.php');
