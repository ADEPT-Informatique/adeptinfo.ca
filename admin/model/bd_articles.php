<?php
$path = $_SERVER['DOCUMENT_ROOT']."/admin";
require_once('../../model/bdconnect.php');

function getAllArticles(){
    $bdd = connect_DB();
    try {
        $reponse = $bdd->query("SELECT * FROM article");

        if ($reponse)
        {
            $tabAllArticles = $reponse->fetchAll();
            return $tabAllArticles;
        }

        $reponse->closeCursor();
    }
    catch(Exception $e){die('Erreur : '.$e->getMessage());}
    $bdd->close();
}
function insertArticle($nom, $qty, $cout, $desc){
    $bdd = connect_DB();
    try {

        $req = $bdd->prepare('INSERT INTO article (nom, cout, info, qty) 
                                    VALUES (:nom, :cout, :desc, :qty)');
        $req->execute(array(
            'nom' => $nom,
            'qty' => $qty,
            'cout' => $cout,
            'desc' => $desc

        ));
    }
    catch(Exception $e){die('Erreur : '.$e->getMessage());}

}
function updateArticle($nom, $prix, $cout, $desc, $qty, $articleID){
    $bdd = connect_DB();
    try {
        $str = "UPDATE article SET nom = '$nom', qty = '$qty', cout = '$cout', info = '$desc' WHERE articleID = '$articleID'";
            $bdd->query($str);
         
        $msg =  "<h3>L\'article $nom a été modifie.</h3>";

    }
    catch(Exception $e){die('Erreur : '.$e->getMessage());}

}

function deleteArticle($id){
    $bdd = connect_DB();
    try {

        $req = $bdd->prepare("DELETE FROM article WHERE articleID = :id");
        $req->execute(array(
            'id' => $id
        ));
    }
    catch(Exception $e){die('Erreur : '.$e->getMessage());}

}

function valeurProduits(){
    $bdd = connect_DB();
    try {
    
        $reponse = $bdd->query("SELECT SUM(cout) * SUM(qty)  as 'total' FROM article");
        if ($reponse)
        {
            $tabAllArticles = $reponse->fetchAll();
            foreach ($tabAllArticles as $article)
            return $article['total'];
        }
        $reponse->closeCursor();
    }
    catch(Exception $e){die('Erreur : '.$e->getMessage());}
}

function qtyTotalProduits(){
    $bdd = connect_DB();
    try {
    
        $reponse = $bdd->query("SELECT SUM(qty) as 'nbArticles' FROM article");
        if ($reponse)
        {
            $tabAllArticles = $reponse->fetchAll();
            foreach ($tabAllArticles as $article)
            return $article['nbArticles'];
        }
        $reponse->closeCursor();
    }
    catch(Exception $e){die('Erreur : '.$e->getMessage());}
}

function articleEnManque(){
    $bdd = connect_DB();
    try {
    
        $reponse = $bdd->query("SELECT nom , qty FROM article ORDER BY qty");
        if ($reponse)
        {
            $tabAllArticles = $reponse->fetchAll();
            foreach ($tabAllArticles as $article)
            return $article;
        }
        $reponse->closeCursor();
    }
    catch(Exception $e){die('Erreur : '.$e->getMessage());}
}

function profitEstime(){
    $bdd = connect_DB();
    try {
        $reponse = $bdd->query("SELECT FLOOR(SUM(( qtyPaquet * cout ) - (( prixPaquet / qtyPaquet ) * qtyCourant))) AS 'output' FROM article");
        if ($reponse)
        {
            $tabAllArticles = $reponse->fetchAll();
            foreach ($tabAllArticles as $article){
                return $article['output'];

            }
        }
        $reponse->closeCursor();
    }
    catch(Exception $e){die('Erreur : '.$e->getMessage());}
}

function getLastArticle(){
    $bdd = connect_DB();
    try {
        $reponse = $bdd->query("SELECT * FROM article ORDER BY articleID DESC LIMIT 1");

        if ($reponse)
        {
            $tabAllArticles = $reponse->fetchAll();
            foreach ($tabAllArticles as $article){
                return $article;
            }
        }

        $reponse->closeCursor();
    }
    catch(Exception $e){die('Erreur : '.$e->getMessage());}
    $bdd->close();
}

?>