<?php
/**
 * unsubscribe.php
 * Created by Olivier Brassard on 17-04-18.
 * Copyright © 2018 Olivier Brassard. All rights reserved.
 */

require_once "../model/bdconnect.php";
$email = validateGet("e");

$errorMessage = "<h4>Une erreur s'est produite</h4>
<p>Il est possible que l'annulation de votre abonnement n'aie 
pas été éffectuée avec succèss. Veuillez svp réésayer.</p>
<p>Si le problème persiste, <a href='mailto:adept.informatique.cem@gmail.com?subject=Erreur%20Desabonnement'>contactz un administrateur</a></p>";

if (!$email){
    echo $errorMessage;
    die();
}

$bdd = connect_BD();

try{
    $request = $bdd -> prepare("DELETE FROM InscriptionInfolettre WHERE email = :email");
    $request ->execute(array(
        "email"=>$email
    ));

}catch (Exception $e){
    echo $errorMessage;
    die($e->getMessage());
}

echo "<h4>Vous avez été retiré de la liste d'envoi avec succès. Au revoir :(</h4>"

?>