<?php
/**
 * subscribe.php
 * Created by Olivier Brassard on 17-04-18.
 * Copyright © 2018 Olivier Brassard. All rights reserved.
 */

require_once "../model/bdconnect.php";

$email = validatePost("email");

if(!$email || !(preg_match('/[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\\.[a-zA-Z0-9-.]+/',$email))){
    header('Location: ../index.php');
    die();
}

$bdd = connect_DB();

try{
    $request = $bdd -> prepare("INSERT INTO InscriptionInfolettre(email) VALUES (:email)");
    $request ->execute(array(
        "email"=>$email
    ));

}catch (Exception $e){
    header('Location: ../index.php?r=error-as');
    die($e->getMessage());
}


$msg = "Bonjour!<br>Nous voulons simplement vous aviser que votre adresse courriel
viens d'être ajoutée à la liste des destinataires de l'infolettre de l'ADEPT Informatique depuis le site <a href='http://adeptinfo.ca'>www.adeptinfo.ca</a>.
Si vous pensez qu'il s'agit d'une erreur, vous pouvez <a href='http://adeptinfo.ca/controller/unsubscribe.php?e=".$email."'>cliquer ici</a> pour annuler votre abonnement.<br><br>
Nous vous souhaitons une agréable journée !<br>L'équipe de l'ADEPT.";

$msg = wordwrap($msg,70);
$headers = 'From: notification@adeptinfo.ca' . "\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
mail($email,"Confirmation d'abonnement à l'infolettre de l'ADEPT",$msg,$headers);

header('Location: ../index.php?r=subscribed');

?>