<?php
ob_start();
session_start();
require_once('../model/bd_utilisateur.php');
require("../model/bd_articles.php");

$userID = 'visiteur'; 
$roleID = '8';

if( isset($_SESSION['user']) && isset($_SESSION['roleID'])) {
    $userID = $_SESSION['user'];
    $roleID = $_SESSION['roleID'];
    if (!hasDashPerms(getInfo($userID,'roleID'))){
        header('Location: ../login.php?error=3');
    }
}
else{
    $_SESSION['user'] = 'visiteur'; 
    $_SESSION['roleID'] = '8';
    header('Location: ../login.php?error=3');
}

$msg = "";

include('frmAddArticle.html');

?>
