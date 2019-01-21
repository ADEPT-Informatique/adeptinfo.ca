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

if (isset($_POST['soumis'])) 
{
    if ($_POST['add'] == 'TRUE') 
    {
        if (!Empty($_POST['nom']) AND !Empty($_POST['qty']) AND !Empty($_POST['prix']) AND !Empty($_POST['cout'])) 
        {
            $nom  = htmlspecialchars($_POST['nom']);
            $qty  = htmlspecialchars($_POST['qty']);
            $prix = htmlspecialchars($_POST['prix']);
            $cout = htmlspecialchars($_POST['cout']);
            $img = "../img/article.png";
            if (!Empty($_POST['img']))
                $img = htmlspecialchars($_POST['img']);
            if (Empty($_POST['desc']))
                $desc = "Aucune description de fournie";
            if (!Empty($_POST['desc']))
                $desc = htmlspecialchars($_POST['desc']);
            
             $msg = "<h3>L'article $nom a été ajouté.</h3>";
            
            insertArticle($nom, $qty, $prix, $cout, $desc, $img);
        }
    }
    else 
    {
        if (isset($_POST['qty']) && $_POST['qty'] == 0){
            deleteArticle($_POST['articleID']);
            $msg = $_POST['nom']."effacer avec succes!";
        }
        else{

            $img;
            $nom;
            $qtyCour;
            $desc;
            $prix;
            $cout;
            $img = "''";
            if (!Empty($_POST['nom']))
                $nom  = htmlspecialchars($_POST['nom']);
            if (!Empty($_POST['qty']))
                $qtyCour  = htmlspecialchars($_POST['qty']);
            if (!Empty($_POST['prix']))
                $prix = htmlspecialchars($_POST['prix']);
            if (!Empty($_POST['cout']))
                $cout = htmlspecialchars($_POST['cout']);
            if (!Empty($_POST['img']))
                $img = htmlspecialchars($_POST['img']);
            if (Empty($_POST['desc']))
                $desc = "Aucune description de fournie";
            if (!Empty($_POST['desc']))
                $desc = htmlspecialchars($_POST['desc']);
            
             $msg = "<h3>L'article $nom a été modifier.</h3>";
    
            updateArticle($nom, $prix, $cout, $desc, $img, $qtyCour);
        }
    }    
} 
else {
    //  sinon
    $msg = "Error";
}
include('../view/frmAddArticle.html');

?>