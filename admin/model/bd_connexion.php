<?php

require_once($_SERVER['DOCUMENT_ROOT']."/controller/requestsHandlers.php");

function connect_DB(){
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=adept;charset=utf8', 'adept_auth', 't$BfP-2&+V5D2Ty-');
        $bdd -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $bdd;
    }
    catch(Exception $e){die('Erreur : '.$e->getMessage());}
}

function connect_BD(){
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=adept;charset=utf8', 'adept_auth', 't$BfP-2&+V5D2Ty-');
        $bdd -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $bdd;
    }
    catch(Exception $e){die('Erreur : '.$e->getMessage());}
}
?>
