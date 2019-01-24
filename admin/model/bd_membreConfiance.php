<?php
require_once('bd_connexion.php');

function getCandidaturesMDC(){
    $bdd = connect_DB();
    try {
        $reponse = $bdd->query("SELECT SUBSTRING_INDEX(c.Nom,' ',1) AS prenom, 
                                SUBSTRING_INDEX(SUBSTRING_INDEX(c.Nom,' ',3),' ',-1) AS nom,
                                c.Email, NbSessions, Motivations,
                                Situation, Pizza, Facto, JavaJs, Gif, Meme, 
                                SujetBanis, Breuvage, AlimentPlusVendu, NumeroLocal, 
                                DateCandidature,
                                c.ReponseID
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

function getCandidature($id){
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

function addMembre($id){
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
        $request = $bdd->prepare("INSERT INTO HistoriqueCandidatureMembreConfiance SELECT * FROM CandidatureMembreConfiance WHERE ReponseID = :id");
        $request->execute(array(
            'id' => $id
        ));
        $request = $bdd->prepare("DELETE FROM CandidatureMembreConfiance WHERE ReponseID = :id");
        $request->execute(array(
            'id' => $id
        ));
        return true;
    } catch (Exception $e) {
        die($e->getMessage());
    }

}

function removeMembre($id){
    $bdd = connect_DB();
    try {
        $request = $bdd->prepare("UPDATE `Utilisateur` SET `roleID` = '10' WHERE `Utilisateur`.`userID` = :id");

        $request->execute(array('id' => $id));
        return true;
    } catch (Exception $e) {
        die($e->getMessage());
    }

}

function clearMembres(){
    $bdd = connect_DB();
    try {
        $request = $bdd->prepare("UPDATE `Utilisateur` SET `roleID` = '10' WHERE `Utilisateur`.`roleID` = 8");

        $request->execute();
        return true;
    } catch (Exception $e) {
        die($e->getMessage());
    }

}

function restoreCandidature($id){
    $membre = getCandidature($id);
    $bdd = connect_DB();
    try {
        
        $request = $bdd->prepare("INSERT INTO CandidatureMembreConfiance SELECT * FROM HistoriqueCandidatureMembreConfiance WHERE ReponseID = :id");
        $request->execute(array('id' => $id));

        $request = $bdd->prepare("DELETE FROM HistoriqueCandidatureMembreConfiance WHERE ReponseID = :id");
        $request->execute(array('id' => $id));
        return true;
    } catch (Exception $e) {
        die($e->getMessage());
    }

}
?>