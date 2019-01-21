<?php
/**
 * authentication.php
 * Created by Olivier Brassard on 28-02-18.
 * Copyright © 2018 Olivier Brassard. All rights reserved.
 */
require_once "bdconnect.php";

function usernameExist($username){
    $bdd = connect_BD();
    try{
        $request = $bdd -> prepare("SELECT COUNT(email)'count' FROM Utilisateur WHERE email=:username");
        $request ->execute(array(
            "username"=>$username
        ));
        $data = $request -> fetch();

        $request -> closeCursor();
        return ($data["count"] != 0);

    }catch (Exception $e){
        die($e->getMessage());
    }
}


function requestLogin($username, $token){
    $bdd = connect_BD();
    if(!usernameExist($username)){
        return false;
    }

    try{
        $request = $bdd -> prepare("SELECT password, email FROM Utilisateur WHERE email=:username");
        $request ->execute(array(
            "username"=>$username
        ));
        $data = $request -> fetch();

        $request -> closeCursor();

        if ($data["email"] == $token){
            $_SESSION["AdminID"] = $data["roleID"];

            return true;
        } else {
            return false;
        }

    }catch (Exception $e){
        die($e->getMessage());
    }
}