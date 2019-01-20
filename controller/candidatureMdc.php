<?php
/**
 * candidatureMdc.php
 * Created by Olivier Brassard on 02-08-18.
 * Copyright © 2018 Olivier Brassard. All rights reserved.
 */

require_once "requestsHandlers.php";
require_once "../model/bdconnect.php";

$nom = validatePost("nom");
$email = validatePost("email");
$nbSessions = validatePost("nbsession");
$motivations = validatePost("raison");
$situation = validatePost("reaction");
$pizza = validatePost("bin");
$facto = validatePost("facto");
$javajs = validatePost("java");
$gif = validatePost("gif");
$meme = validatePost("meme");
$sujetsban = validatePost("ban");
$breuvage = validatePost("brev");
$aliment = validatePost("alim");
$numlocal = validatePost("local");

if(!($nom && $email && $nbSessions && $motivations && $situation
    && $pizza && $facto && $javajs && $gif && $meme && $sujetsban &&
    $breuvage && $aliment && $numlocal) || !(preg_match('/[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\\.[a-zA-Z0-9-.]+/',$email))){
    //Verifier que tous les champs sont valides
    header('Location: ../membresconfiance.php?r=error');
    die();
} else {

    $bdd = connect_BD();

    try{
        $request = $bdd -> prepare("INSERT INTO `CandidatureMembreConfiance`
(`Nom`,`Email`,`NbSessions`,`Motivations`,`Situation`,`Pizza`,`Facto`,`JavaJs`,`Gif`,
`Meme`,`SujetBanis`,`Breuvage`,`AlimentPlusVendu`,`NumeroLocal`) 
VALUES(:Nom,:Email,:NbSessions,:Motivations,:Situation,:Pizza,
:Facto,:JavaJs,:Gif,:Meme,:SujetBanis,:Breuvage,:AlimentPlusVendu,:NumeroLocal)");
        $request ->execute(array(
            "Nom" => $nom,
            "Email" => $email,
            "NbSessions" => $nbSessions,
            "Motivations" => $motivations,
            "Situation" => $situation,
            "Pizza" => $pizza,
            "Facto" => $facto,
            "JavaJs" => $javajs,
            "Gif" => $gif,
            "Meme" => $meme,
            "SujetBanis" => $sujetsban,
            "Breuvage" => $breuvage,
            "AlimentPlusVendu" => $aliment,
            "NumeroLocal" => $numlocal
        ));

    }catch (Exception $e){
        header('Location: ../membresconfiance.php?r=error');
        die($e->getMessage());
    }
}
header('Location: ../membresconfiance.php?r=success');