<?php

ob_start();
session_start();
require_once('../model/bd_articles.php');
require_once('../model/bd_utilisateur.php');
$userID = 'visiteur';
$roleID = 1;
if( isset($_SESSION['user']) && isset($_SESSION['roleID'])) {
    $userID = $_SESSION['user'];
    $roleID = $_SESSION['roleID'];
    if (!hasDashPerms(getInfo($userID,'roleID'))){
        header('Location: ../view/login.php?error=3');
    }
}
else{
    $_SESSION['user'] = 'visiteur'; 
    $_SESSION['roleID'] = '1';
    header('Location: ../view/login.php?error=3');
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Title Page-->
    <title>ADEPT - Administration</title>
    <?php include "../includes/dash_meta_links.php"?>

</head>

<body>
    <?php include "../includes/dash_header.php" ?>
            <!-- MAIN CONTENT-->
            <div class="main-content">
            <section id="contact" class="section-bg wow fadeInUp">
        <div class="container">

            <div class="section-header text-center">

                <h3>Liste des membres du site de l'ADEPT!</h3>

            </div>

            <hr>
            <section id="listeUtilisateurs">
                <table class="table table-bordered table-striped thead-dark">
                    <thead>
                        <tr>
                            <th style="width:5%">UserID</th>
                            <th  >Prenom</th>
                            <th  >Nom</th>
                            <th  >Role</th>
                            <th  >Couriel</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $tabAllUser = getAllUser();
                            foreach ($tabAllUser as $user)
                            { ?>
                                <tr>
                                    <td >
                                        <?php echo $user['userID']; ?>
                                    </td>
                                    <td >
                                        <?php echo $user['nom']; ?>
                                    </td>
                                    <td >
                                        <?php echo $user['prenom']; ?>
                                    </td> 
                                    <td >
                                        <?php echo $user['Role']; ?>
                                    </td> 
                                    <td colspan="2">
                                        <?php echo $user['email']; ?>
                                    </td> 
                                </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </section>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>
    </div>

    <?php include "../includes/dash_scripts.php"?>

</body>

</html>
<!-- end document-->
