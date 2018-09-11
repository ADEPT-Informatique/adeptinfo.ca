<?php
require_once "moduleFunctions.php";
/**
 * createReservation.php
 * Created by Olivier Brassard on 15-02-18.
 * Copyright © 2018 Olivier Brassard. All rights reserved.
 */

$nom = validatePost("nom");
$prenom = validatePost("prenom");
$email = validatePost("email");
$size = validatePost("size");
$studentId = validatePost("studentid");
$color = validatePost("color");

if(!($nom && $prenom && $email && $studentId && $size && $color) ||
!(preg_match('/[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\\.[a-zA-Z0-9-.]+/',$email))||
!(preg_match('/^[1][0-9]{6}$/',$studentId))){
    //Verifier que tous les champs sont valides
    header('Location: index.php?r=error');
    die();
}


NewClient($nom,$prenom,$email,$studentId);
$cId = GetIDOfLastClient();


$cfnumber = "AD".substr(strval(time()), -4).strval($cId);


MakeReservation($cId, $cfnumber, $size, $color);


//Email de confirmation

// the message
$msg = "Bonjour ".$prenom."!<br>Merci d'avoir reservé un Hoodie du département informatique!<br>Votre numero de confirmation est le <strong>".$cfnumber.".</strong><br><br>
Nous vous enverrons bientôt un courriel pour vous informer de l'état de votre commande.
<br><br>Passez une bonne journée!<br>Cordialement, l'équipe de l'ADEPT !";

$msg = wordwrap($msg,70);

$headers = 'From: noreply@adeptinfo.ca' . "\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
// send email
mail($email,"ADEPT - Confirmation de ta réservation",$msg,$headers);

//=============================
// the message
$msgStatus = "Notification ADEPT-Hoodies<br><br><h4>Une réservation de plus!</h4><br>".$prenom." ".$nom." a réservé un hoodie.
<br><br>Passez une bonne journée!<br>ADEPT Bot";

$msgStatus = wordwrap($msgStatus,70);

$headers = 'From: status@adeptinfo.ca' . "\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
// send email
mail('brassard.oli@gmail.com',"ADEPT Nouvelle réservation",$msgStatus,$headers);


header('Location: index.php?r=success&c='.$cfnumber);


?>