<?php 
require_once "../model/bdconnect.php";

$name = validatePost("name");
$email = validatePost("email");
$subject = validatePost("subject");
$message = validatePost("message");

if(!($name && $email && $subject && $message){
    //Verifier que tous les champs sont valides
    header('Location: ../index.html?r=error');
    die();
}

$msg = "Bonjour!<br>Vous avez re�u un nouveau message depuis le site adeptinfo.ca<br><br>
Le message � �t� envoy� par : <br><strong>".$email."</strong><br><br>".$message;

$msg = wordwrap($msg,70);
$headers = 'From: notification@adeptinfo.ca' . "\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
// send email
mail("adept.informatique.cem@gmail.com","Message du site web - ".$subject,$msg,$headers);

header('Location: ../index.html?r=success);

?>