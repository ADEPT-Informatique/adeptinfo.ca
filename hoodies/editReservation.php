<?php
/**
 * editReservation.php
 * Created by Olivier Brassard on 21-12-17.
 * Copyright © 2017 Olivier Brassard. All rights reserved.
 */
session_start();
if (!isset($_SESSION['AdminID'])){
    header('Location: connexion.php');
    die();
}
require_once "moduleFunctions.php";

$id = validatePost('id');
$size = validatePost('size');
$depot = validatePost('depot');

if (!($id && $size && !is_nan($depot))){
    header('Location: detailsReservation.php?update=fail&id='.$id);
    die();
}

$isrecupered = validatePost('isrecupered');
if ($isrecupered == 'yes'){
    $isrecupered = true;
} else {
    $isrecupered=false;
}


if($depot < 0 || $depot > 40){
    header('Location: detailsReservation.php?update=fail&id='.$id.'&depot='.$depot);
    die();
}

if ($isrecupered && $depot<40){
    header('Location: detailsReservation.php?update=fail-invalidrecup&id='.$id);
    die();
}

UpdateReservation($id,$depot,$size,$isrecupered);

//Historique des modifs
if($isrecupered){
    SaveInHistory(array('AdminID'=>$_SESSION['AdminID'], 'ReservationID' =>$id, 'Nom'=> GetName($id), 'Type'=>'recup','Recup'=>$isrecupered, 'Depot'=>$depot));
} else {
    SaveInHistory(array('AdminID'=>$_SESSION['AdminID'], 'ReservationID' =>$id, 'Nom'=> GetName($id), 'Type'=>'update','Recup'=>$isrecupered, 'Depot'=>$depot));
}


header('Location: detailsReservation.php?update=success&id='.$id);


?>