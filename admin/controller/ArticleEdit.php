<?php
ob_start();
session_start();
require_once('../model/bd_utilisateur.php');
require_once("../model/bd_articles.php");


$userID;
$roleID;
if( isset($_SESSION['user']) && isset($_SESSION['roleID'])) {
    $userID = $_SESSION['user'];
    $roleID = $_SESSION['roleID'];
    if (!hasDashPerms(getInfo($userID,'roleID'))){
        header('Location: ../view/login.php?error=3');
    }
}
else{
    $_SESSION['user'] = 'visiteur'; 
    $_SESSION['roleID'] = '1';
    header('Location: ../view/login.php?error=3');
}



$nom  = htmlspecialchars($_POST['nom']);
$qtyCour  = htmlspecialchars($_POST['qty']);
$prix = htmlspecialchars($_POST['prix']);
$cout = htmlspecialchars($_POST['cout']);
if (Empty($_POST['desc'])){
    $desc = "Aucune description de fournie";
}
else{
    $desc = $_POST['desc'];
}

    $msg = "L'article $nom a été modifier.";

updateArticle($nom, $prix, $cout, $desc, $qtyCour);



include('../view/frmAddArticle.html');

?>