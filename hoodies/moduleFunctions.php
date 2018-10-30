<?php
/**
 * hoodieModuleFunctions.php
 * Created by Olivier Brassard on 15-02-18.
 * Copyright © 2018 Olivier Brassard. All rights reserved.
 */

require_once "../model/bdconnect.php";


function NewClient($nom, $prenom, $email,$studid){
    $db = connect_BD();
    try{
        $request = $db -> prepare("INSERT INTO Client(Nom, Prenom, Email, NumEtudiant) VALUES (:nom, :prenom, :email, :studentId)");
        $request ->execute(array(
            "nom"=>$nom,
            "prenom"=>$prenom,
            "email"=>$email,
            "studentId"=>$studid
        ));
        $request -> closeCursor();
    }catch (Exception $e){
        die($e->getMessage());
    }
    $db = null;
}

function GetIDOfLastClient(){
    $db = connect_BD();
    try{
        $request = $db -> query("SELECT ClientID FROM Client ORDER BY ClientID desc LIMIT 1");
        if ($request){
            return $request -> fetch()['ClientID'];
        }
        $request -> closeCursor();
    }catch (Exception $e){
        die($e->getMessage());
    }
    $db = null;
    return false;
}


function MakeReservation($client,$num,$size){
    $db = connect_BD();
    try{
        $request = $db -> prepare("INSERT INTO HoodieReservation(ClientID,NumeroReservation,Taille) VALUES (:client, :num, :size)");
        $request ->execute(array(
            "client"=>$client,
            "num"=>$num,
            "size"=>$size
        ));
        $request -> closeCursor();
    }catch (Exception $e){
        die($e->getMessage());
    }
    $db = null;
}


function GetAllClientReservation(){
    $db = connect_BD();
    try{
        $request = $db -> prepare("SELECT * FROM ClientReservation");
        $request->execute();
        return $request ->fetchAll();
    }catch (Exception $e){
        die($e->getMessage());
    }
    $db = null;
}

function GetOneClientReservation($reservationID){
    $db = connect_BD();
    try{
        $request = $db -> prepare("SELECT Nom, Prenom, Email, NumEtudiant, NumeroReservation, Taille, Depot, HoodieRecupere FROM ClientReservation where ReservationID = :resId");
        $request->execute(array(
            'resId'=>$reservationID
        ));
        return $request ->fetch();
    }catch (Exception $e){
        die($e->getMessage());
    }
}


function GetCountReservationBySize($taille){
    $db = connect_BD();
    try {
        $request = $db->prepare("SELECT COUNT(ReservationID) 'count' FROM HoodieReservation WHERE Taille = :Taille");
        $request->execute(array(
          'Taille' => $taille
        ));
        return $request->fetch()['count'];
        
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
    $db = null;
}


function GetTotalCountReservation(){
    $db = connect_BD();
    try {
        $request = $db->prepare("SELECT COUNT(ReservationID) 'count' FROM HoodieReservation");
        $request->execute();
        return $request->fetch()['count'];

    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
    $db = null;
}

function DeleteReservation($Id){
    $db = connect_BD();
    try {
        $request = $db->prepare("CALL USP_DeleteReservation(:resID)");
        $request->execute(array(
            "resID"=> $Id
        ));
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}

function GetEmail($reservationID){
    $db = connect_BD();
    try {
        $request = $db->prepare("SELECT Email FROM ClientReservation where ReservationID = :resID");
        $request->execute(array(
            "resID"=> $reservationID
        ));
        return $request->fetch()['Email'];

    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
    $db = null;
}

function GetName($reservationID){
    $db = connect_BD();
    try {
        $request = $db->prepare("SELECT CONCAT(Prenom, ' ', Nom) as Nom FROM ClientReservation where ReservationID = :resID");
        $request->execute(array(
            "resID"=> $reservationID
        ));
        return $request->fetch()['Nom'];

    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
    $db = null;
}

function GetReservationByStudentId($studentID)
{
    $db = connect_BD();
    try {
        $request = $db->prepare("SELECT ReservationID FROM ClientReservation where NumEtudiant = :num");
        $request->execute(array(
            'num' => $studentID
        ));

        $result = $request->fetch()['ReservationID'];
        if ($result) {
            return $result;
        } else {
            return false;
        }
    } catch (Exception $e) {
        die($e->getMessage());
    }
}

function UpdateReservation($reservationID, $depot, $size, $isRecupered)
{
    $db = connect_BD();
    try {
        $request = $db->prepare("UPDATE HoodieReservation set Depot = :depot, Taille = :size, HoodieRecupere = :recup where ReservationID = :ID");
        $request->execute(array(
            'ID' => $reservationID,
            'depot' => $depot,
            'size' => $size,
            'recup' => $isRecupered ? 1:0
        ));

        return true;
    } catch (Exception $e) {
        die($e->getMessage());
    }

}

function SaveInHistory($datas)
{
    $db = connect_BD();
    try {
        $request = $db->prepare("INSERT INTO HistoriqueReservation(AdminID, ReservationID, Nom, Type, Depot, Recup) VALUES (:admin,:reservation,:nom,:type, :depot, :recup)");
        $request->execute(array(
            'admin' => $datas['AdminID'],
            'reservation' => $datas['ReservationID'],
            'nom' => $datas['Nom'],
            'type' => $datas['Type'],
            'depot' => $datas['Depot'],
            'recup' => $datas['Recup'] ? 1:0
        ));

        return true;
    } catch (Exception $e) {
        die($e->getMessage());
    }

}

function GetHistory()
{
    $db = connect_BD();
    try {
        $request = $db->prepare("SELECT concat(a.Prenom,' ',a.Nom) as 'Admin', Date,h.Nom, Type, Depot,Recup 
                                          FROM HistoriqueReservation h 
                                          INNER JOIN Administrateurs a on a.AdminID = h.AdminID 
                                          ORDER BY Date DESC LIMIT 25");
        $request->execute();

        return $request->fetchAll();
    } catch (Exception $e) {
        die($e->getMessage());
    }

}

?>