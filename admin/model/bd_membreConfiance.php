<?php
require_once('bd_connexion.php');

function getCandidaturesMDC()
{
    $bdd = connect_DB();
    try {
        $reponse = $bdd->query("SELECT SUBSTRING_INDEX(c.Nom,' ',1) AS prenom, 
                                SUBSTRING_INDEX(SUBSTRING_INDEX(c.Nom,' ',3),' ',-1) AS nom,
                                c.Email,
                                c.ReponseID as id
                                FROM CandidatureMembreConfiance c");

        if ($reponse)
        {
            $allMDC = $reponse->fetchAll();
            return $allMDC;
        }
        $reponse->closeCursor();
    }
    catch(Exception $e){die('Erreur : '.$e->getMessage());}
    $bdd->close();
}

function getCandidature($id)
{
    $bdd = connect_DB();
    $req = $bdd->prepare("  SELECT SUBSTRING_INDEX(c.Nom,' ',1) AS prenom, 
                            SUBSTRING_INDEX(SUBSTRING_INDEX(c.Nom,' ',3),' ',-1) AS nom,
                            c.Email as email
                            FROM CandidatureMembreConfiance c
                            WHERE c.ReponseID = :id
                            LIMIT 1");
    $req->execute(array('id' => $id));
    foreach ($req as $info){
        return $info;
    }
    
}

function addMembre($id)
{
    $membre = getCandidature($id);
    $bdd = connect_DB();
    try {
        $request = $bdd->prepare("INSERT INTO Utilisateur(nom, prenom, roleID, email) VALUES (:nom, :prenom, :roleID, :email)");

        $request->execute(array(
            'nom' => $membre['nom'],
            'prenom' => $membre['prenom'],
            'roleID' => '8',
            'email' => $membre['email']
        ));
        
        return true;
    } catch (Exception $e) {
        die($e->getMessage());
    }

}

?>