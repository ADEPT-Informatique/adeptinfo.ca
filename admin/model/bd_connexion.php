<?php

require_once($_SERVER['DOCUMENT_ROOT']."/controller/requestsHandlers.php");

function connect_DB(){
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=adept;charset=utf8', 'adept_auth', 'usFaMVSgB5tmOSBk');
        $bdd -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $bdd;
    }
    catch(Exception $e){die('Erreur : '.$e->getMessage());}
}

function connect_BD(){
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=adept;charset=utf8', 'adept_auth', 'usFaMVSgB5tmOSBk');
        $bdd -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $bdd;
    }
    catch(Exception $e){die('Erreur : '.$e->getMessage());}
}
?>
