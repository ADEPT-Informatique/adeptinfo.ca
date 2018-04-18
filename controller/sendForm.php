<?php 
require_once "requestsHandlers.php";

$name = validatePost("name");
$email = validatePost("email");
$subject = validatePost("subject");
$message = validatePost("message");

if(!($name && $email && $subject && $message) || !(preg_match('/[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\\.[a-zA-Z0-9-.]+/',$email))){
    //Verifier que tous les champs sont valides
    header('Location: ../index.php?r=error');
    die();
}

$msg = "Bonjour!<br>Vous avez reçu un nouveau message depuis le site adeptinfo.ca<br><br>
Le message à été envoyé par : <br><strong>".$email."</strong><br><br>".$message;

$msg = wordwrap($msg,70);
$headers = 'From: notification@adeptinfo.ca' . "\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
// send email
mail("adept.informatique.cem@gmail.com","Message du site web - ".$subject,$msg,$headers);

header('Location: ../index.php?r=success');

?>