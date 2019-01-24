<?php
ob_start();
session_start();
require_once('../model/bd_utilisateur.php');
require_once('../model/bd_articles.php');

$userID;
$roleID;
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

$nom  = htmlspecialchars($_POST['nom']);
$qty  = htmlspecialchars($_POST['qty']);
$cout = htmlspecialchars($_POST['cout']);
if (Empty($_POST['desc'])){
    $desc = "Aucune description de fournie";
}
if (!Empty($_POST['desc'])){
    $desc = htmlspecialchars($_POST['desc']);
}

insertArticle($nom, $qty, $cout, $desc);
$article = getLastArticle();

if (isset($_FILES['img']) AND $_FILES['img']['error'] == 0) //fichier ok
{
    if ($_FILES['img']['size'] <= 5000000) //5Mo max
    {
        $infosfichier = pathinfo($_FILES['img']['name']);
        $extensionFichier = strtolower($infosfichier['extension']);
        $extensions_valides = array('jpg', 'jpeg', 'png');
        if (in_array($extensionFichier, $extensions_valides))
        {
            $fileName = $article['articleID'].".jpg";
            $name = $_SERVER['DOCUMENT_ROOT']."/img/epicerie/".$fileName;
            move_uploaded_file($_FILES['img']['tmp_name'],$name);
            header('Location: ../view/frmAddArticle.php?code=Good');
        }
    }
}

include('../view/frmAddArticle.html');

?>