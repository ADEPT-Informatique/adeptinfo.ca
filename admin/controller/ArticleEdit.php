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



$nom  = htmlspecialchars($_POST['nom'],ENT_QUOTES);
$qtyCour  = htmlspecialchars($_POST['qty']);
$prix = htmlspecialchars($_POST['prix']);
$cout = htmlspecialchars($_POST['cout']);

if (Empty($_POST['desc'])){
    $desc = htmlentities("Aucune description de fournie",ENT_QUOTES);
}
else{
    $desc = htmlentities($_POST['desc'],ENT_QUOTES);
}

$msg = "L'article $nom a été modifier.";


updateArticle($nom, $prix, $cout, $desc, $qtyCour, $_POST['articleID']);

$fileName = $_POST['articleID'].".jpg";
$name = $_SERVER['DOCUMENT_ROOT']."/img/epicerie/".$fileName;
/*
if(file_exists($name)){
    //unlink($name);
}

if (isset($_FILES['img']) AND $_FILES['img']['error'] == 0) //fichier ok
{
    if ($_FILES['img']['size'] <= 5000000) //5Mo max
    {
        $infosfichier = pathinfo($_FILES['img']['name']);
        $extensionFichier = strtolower($infosfichier['extension']);
        $extensions_valides = array('jpg', 'jpeg', 'png');
        if (in_array($extensionFichier, $extensions_valides))
        {
            move_uploaded_file($_FILES['img']['tmp_name'],$name);
            header('Location: ../view/frmAddArticle.php?code=Good');
        }
    }
}*/

include('../view/frmAddArticle.html');

?>