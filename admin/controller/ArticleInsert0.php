<?php
ob_start();
session_start();
require_once('../controller/ImgUpload.php');
require_once('../model/bd_utilisateur.php');
require_once('../model/bd_articles.php');
//https://gist.github.com/obrassard/b8efb5f2a92ddf499b81b880bb6ed3d4

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
$qty  = htmlspecialchars($_POST['qty']);
$prix = htmlspecialchars($_POST['prix']);
$cout = htmlspecialchars($_POST['cout']);
if (Empty($_POST['desc']))
    $desc = "Aucune description de fournie";
if (!Empty($_POST['desc']))
    $desc = htmlspecialchars($_POST['desc']);

$msg = "<h3>L'article $nom a été ajouté.</h3>";

//addAricleImage($_FILES['img'],$_POST['id']);







insertArticle($nom, $qty, $prix, $cout, $desc);
    
include('../view/frmAddArticle.html');

?>