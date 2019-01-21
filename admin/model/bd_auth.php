<?php
session_start();
require_once('bd_connexion.php');


if (isset($_GET['action']) && $_GET['action'] == 'logoff'){
    $_SESSION['user'] = 'visiteur'; 
    $_SESSION['roleID'] = '1';
    header('Location: ..');
}

if (isset($_POST['email'])){

    $email = $_POST['email'];
    $password = $_POST['password'];
}

if($email != null && !Empty($email) && isset($email)){
    $bdd = connect_DB();
    $req = $bdd->prepare('SELECT * FROM Utilisateur WHERE email = :email');

    $req->execute(array('email' => $email));

    $userCount =  $req->rowCount();
    if ($userCount < 1){
        header('Location: /admin/index.php?error=2');
    }
    foreach ($req as $row) {
  
        if($row['password'] == $password){

            $_SESSION['role'] = $row['roleID'];
            $_SESSION['user'] = $row['userID'];
            header('Location: /admin/view/dashboard.php');
        }
        else{
            header('Location: /admin/index.php?error=1');       
        }
    }
}
?>