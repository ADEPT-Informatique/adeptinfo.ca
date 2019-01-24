<?php

ob_start();
session_start();
require_once('../model/bd_articles.php');
require_once('../model/bd_utilisateur.php');

$userID = 'visiteur'; 
$roleID = '8';

if( isset($_SESSION['user']) && isset($_SESSION['roleID'])) {
    $userID = $_SESSION['user'];
    $roleID = $_SESSION['roleID'];
    if (!hasDashPerms(getInfo($userID,'roleID'))){
        header('Location: ../login.php?error=3');
    }
}
else{
    $_SESSION['user'] = 'visiteur'; 
    $_SESSION['roleID'] = '8';
    header('Location: ../login.php?error=3');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title Page-->
    <title>ADEPT ADMIN - Utilisteurs</title>
    <?php include("../includes/dash_meta_links.php");?>

</head>

<body>
    <?php include("../includes/dash_header.php"); ?>
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <section id="contact" class="section-bg wow fadeInUp">
            <div class="container">

                <div class="section-header text-center">

                    <h3>Liste des membres du site de l'ADEPT!</h3>

                </div>

                <hr>

                <section id="listeUtilisateurs">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th style="width:5%">UserID</th>
                                <th>Prenom</th>
                                <th>Nom</th>
                                <th>Role</th>
                                <th>Couriel</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $tabAllUser = getAllUser();
                            foreach ($tabAllUser as $user)
                            { ?>
                            <tr class="clickable" data-toggle="collapse" id="row<?php echo $user['userID'];?>"
                                data-target=".row<?php echo $user['userID'];?>">
                                <td>
                                    <?php echo $user['userID']; ?>
                                </td>
                                <td>
                                    <?php echo $user['nom']; ?>
                                </td>
                                <td>
                                    <?php echo $user['prenom']; ?>
                                </td>
                                <td>
                                    <?php echo $user['Role']; ?>
                                </td>
                                <td colspan="2">
                                    <?php echo $user['email']; ?>
                                </td>
                            </tr>
                            <tr class="collapse row<?php echo $user['userID'];?>">
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td colspan="2">
                                    Reset Password
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </section>
            </div>
        </section>
    </div>

    <?php include "../includes/dash_scripts.php"?>

</body>

</html>
<!-- end document-->