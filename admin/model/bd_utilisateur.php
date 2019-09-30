<?php
require_once('../../model/bdconnect.php');

function getAllUser(){
    $bdd = connect_DB();
    try {
        $reponse = $bdd->query("SELECT u.userID, u.nom, u.prenom, r.Role, u.email 
                                FROM Utilisateur u 
                                INNER JOIN Roles r 
                                ON r.RoleID = u.roleID");

        if ($reponse)
        {
            $tabAllUser = $reponse->fetchAll();
            return $tabAllUser;
        }
        $reponse->closeCursor();
    }
    catch(Exception $e){die('Erreur : '.$e->getMessage());}
    $bdd->close();
}

function getInfo($userID, $info){
    if ($userID == 'visiteur'){
        return 'error';
    }
    $bdd = connect_DB();
    $req = $bdd->prepare('SELECT * FROM Utilisateur WHERE userID = :userID');
    $req->execute(array('userID' => $userID));
    if ($info == 'nom'){
        foreach ($req as $user){
            return $user['nom'];
        }
    }
    if ($info == 'prenom'){
        foreach ($req as $user){
            return $user['prenom'];
        }
    }
    if ($info == 'email'){
        foreach ($req as $user){
            return $user['email'];
        }
    }
    if ($info == 'roleID'){
        foreach ($req as $user){
            return $user['roleID'];
        }
    }
}

function getIdByRole($roleID){
    $bdd = connect_DB();
    $req = $bdd->prepare('SELECT userID FROM Utilisateur WHERE roleID = :roleID');
    $req->execute(array('roleID' => $roleID));
    foreach ($req as $user){
        return $user['userID'];
    }
    
}

function getMDC(){
    $bdd = connect_DB();
    try {
        $reponse = $bdd->query("SELECT u.userID, u.nom, u.prenom, u.email, userID 
                                FROM Utilisateur u 
                                INNER JOIN Roles r 
                                ON r.RoleID = u.roleID
                                WHERE u.RoleID = 8");

        if ($reponse)
        {
            $tabMDC = $reponse->fetchAll();
            return $tabMDC;
        }
        $reponse->closeCursor();
    }
    catch(Exception $e){die('Erreur : '.$e->getMessage());}
    $bdd->close();
}

function getStaff(){
    $bdd = connect_DB();
    try {
        $reponse = $bdd->query("SELECT r.Role , u.nom, u.prenom, u.email, u.userID
                                FROM Utilisateur u 
                                INNER JOIN Roles r 
                                ON r.RoleID = u.roleID
                                WHERE u.roleID BETWEEN 1 AND 5
                                ORDER BY u.roleID");

        if ($reponse)
        {
            $tabMDC = $reponse->fetchAll();
            return $tabMDC;
        }
        $reponse->closeCursor();
    }
    catch(Exception $e){die('Erreur : '.$e->getMessage());}
    $bdd->close();
}

function hasDashPerms($roleID){
    if ($roleID > 0 && $roleID < 7)
    {
        return true;
    }
    else{
        return false;
    }
}

?>