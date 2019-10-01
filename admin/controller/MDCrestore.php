<?php
ob_start();
session_start();
require_once('../model/bd_utilisateur.php');
require_once("../model/bd_articles.php");
require_once('../model/bd_membreConfiance.php');

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
    $_SESSION['roleID'] = '1';
    header('Location: ../index.php?error=3');
}

if (isset($_GET['id'])) 
{
    if(restoreCandidature($_GET['id']))
    {
        header('Location: ../view/MDCList.php?status=0');
    }
    else{
        header('Location: ../view/MDCList.php?status=1');
    }
}
else{
    header('Location: ../view/MDCList.php?status=2');
}

?>