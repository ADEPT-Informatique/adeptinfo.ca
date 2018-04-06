<?php
/**
 * bdconnect.php
 * Created by Olivier Brassard on 15-02-18.
 * Copyright © 2018 Olivier Brassard. All rights reserved.
 */


//Connexion à la BD
function connect_BD(){
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=adept;charset=utf8', 'root', 'root');
        $bdd -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $bdd;
    }
    catch(Exception $e)
    {
        // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
    }
}

function validatePost($field){
    if (isset($_POST[$field]) and $_POST[$field] != ""){
        $data = $_POST[$field];
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    else {
        return false;
    }
}
function validateGet($field)
{
    if (isset($_GET[$field]) and $_GET[$field] != "") {
        $data = $_GET[$field];
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    } else {
        return false;
    }
}