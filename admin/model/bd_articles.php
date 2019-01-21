<?php
$path = $_SERVER['DOCUMENT_ROOT']."/admin";
require_once($path.'/model/bd_connexion.php');

function getAllArticles()
{
    $bdd = connect_DB();
    try {
        $reponse = $bdd->query("SELECT nom, info, cout, articleID, qtyCourant FROM article");

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
function insertArticle($nom, $qty, $prix, $cout, $desc){
    $bdd = connect_DB();
    try {

        $req = $bdd->prepare('INSERT INTO article (nom, qtyPaquet, prixPaquet, cout, info, qtyCourant) 
                                    VALUES (:nom, :qty, :prix, :cout, :desc, :qty)');
        $req->execute(array(
            'nom' => $nom,
            'qty' => $qty,
            'prix' => $prix,
            'cout' => $cout,
            'desc' => $desc

        ));
    }
    catch(Exception $e){die('Erreur : '.$e->getMessage());}

}
function updateArticle($nom, $prix, $cout, $desc, $qtyCour, $articleID){
    $bdd = connect_DB();
    try {
        $str = "UPDATE article SET nom = $nom, qtyCourant = $qtyCour, cout = $cout, info = '$desc' WHERE articleID = $articleID";
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
    
        $reponse = $bdd->query("SELECT SUM(cout) * SUM(qtyCourant)  as 'total' FROM article");
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
    
        $reponse = $bdd->query("SELECT SUM(qtyCourant) as 'nbArticles' FROM article");
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
    
        $reponse = $bdd->query("SELECT nom , qtyCourant FROM article ORDER BY qtyCourant");
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

?>