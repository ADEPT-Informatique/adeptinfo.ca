<?php
session_start();
/**
 * editReservation.php
 * Created by Olivier Brassard on 28-02-18.
 * Copyright © 2018 Olivier Brassard. All rights reserved.
 */
require_once("../model/HoodieModuleFunctions.php");
require_once('../model/bd_utilisateur.php');

$userID = 'visiteur';
$roleID = '8';
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

$id = validatePost('id');
$size = validatePost('size');
$depot = validatePost('depot');

if (!($id && $size && !is_nan($depot))){
    header('Location: ../view/HoodieDetails.php?update=fail&id='.$id);
    die();
}

$isrecupered = validatePost('isrecupered');
if ($isrecupered == 'yes'){
    $isrecupered = true;
} else {
    $isrecupered=false;
}


if($depot < 0 || $depot > 40){
    header('Location: ../view/HoodieDetails.php?update=fail&id='.$id.'&depot='.$depot);
    die();
}

if ($isrecupered && $depot<40){
    header('Location: ../view/HoodieDetails.php?update=fail-invalidrecup&id='.$id);
    die();
}

UpdateReservation($id,$depot,$size,$isrecupered);

//Historique des modifs
if($isrecupered){
    SaveInHistory(array('userID'=>$_SESSION['user'], 'ReservationID' =>$id, 'Nom'=> GetName($id), 'Type'=>'recup','Recup'=>$isrecupered, 'Depot'=>$depot));
} else {
    SaveInHistory(array('userID'=>$_SESSION['user'], 'ReservationID' =>$id, 'Nom'=> GetName($id), 'Type'=>'update','Recup'=>$isrecupered, 'Depot'=>$depot));
}


header('Location: ../view/HoodieDetails.php?update=success&id='.$id);


?>