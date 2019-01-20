<?php
require_once __DIR__."/../model/bdconnect.php";

function ObtenirCollationsDispo(){
    $db = connect_BD();
    try{
        $request = $db -> query("SELECT NomProduit, Prix 
                                FROM ProduitsAutoFinancement 
                                where Disponible = 1 && EstUnBrevage = 0 order by NomProduit");
        if ($request){
            return $request -> fetchAll();
        }
        $request -> closeCursor();
    }catch (Exception $e){
        die($e->getMessage());
    }
    $db = null;
    return false;
}

function ObtenirBrevagesDispo(){
    $db = connect_BD();
    try{
        $request = $db -> query("SELECT NomProduit, Prix 
                                FROM ProduitsAutoFinancement 
                                where Disponible = 1 && EstUnBrevage = 1 order by NomProduit");
        if ($request){
            return $request -> fetchAll();
        }
        $request -> closeCursor();
    }catch (Exception $e){
        die($e->getMessage());
    }
    $db = null;
    return false;
}

?>