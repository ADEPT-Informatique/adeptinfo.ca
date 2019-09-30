<?php
/**
 * bdconnect.php
 * Created by Olivier Brassard on 15-02-18.
 * Copyright © 2018 Olivier Brassard. All rights reserved.
 */
include_once __DIR__."/../controller/requestsHandlers.php";

//Connexion à la BD
function connect_DB(){
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=adept;charset=utf8', 'adept_auth', 'passw0rd');
        $bdd -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $bdd;
    }
    catch(Exception $e)
    {
        // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
    }
}
