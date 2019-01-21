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

if(isset($_GET['id'])&& filter_var($_GET['id'], FILTER_VALIDATE_INT)){
    deleteArticle($_GET['id']);
    header('Location: ../view/frmAddArticle.php?status=0');

}
else{
    echo erreur;
}




?>