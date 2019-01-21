<?php

ob_start();
session_start();

require_once('../model/bd_utilisateur.php');
require_once('../model/HoodieModuleFunctions.php');

$userID = 'visiteur';
$roleID = '8';
if( isset($_SESSION['user']) && isset($_SESSION['roleID'])) {
    $userID = $_SESSION['user'];
    $roleID = $_SESSION['roleID'];
    if (!hasDashPerms(getInfo($userID,'roleID'))){
        header('Location: ../view/login.php?error=3');
    }
}
else{
    $_SESSION['user'] = 'visiteur'; 
    $_SESSION['roleID'] = '8';
    header('Location: ../view/login.php?error=3');
}

$reservationId = validateGet('id');
$reservation = GetOneClientReservation($reservationId);

$sizes = array('S'=>'Petit','M'=>'Moyen','L'=>'Grand', 'XL'=>'Très grand', 'N' => 'À déterminer')


?>

<!DOCTYPE html>
<html lang="fr">
    <head>
    <title>ADEPT - Administration</title>
    <?php include "../includes/dash_meta_links.php"?>

</head>

<body>
    <?php 
    include("../includes/dash_header.php"); 
    include("HoodieDetails.html");
    include("../includes/dash_scripts.php");
    ?>

</body>

</html>
<!-- end document-->
