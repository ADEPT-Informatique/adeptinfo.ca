<?php

ob_start();
session_start();
require_once('../model/bd_articles.php');
require_once('../model/bd_utilisateur.php');
require_once('../model/bd_membreConfiance.php');
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

                    <h3>Liste des membres de confiance de l'ADEPT!</h3>

                </div>

                <hr>
                <section id="listeUtilisateurs">
                    <table class="table table-bordered table-striped ">
                        <thead class="thead-dark">
                            <tr>
                                <th style="width:30%">Prenom</th>
                                <th style="width:30%">Nom</th>
                                <th style="width:30%">Couriel</th>
                                <th style="width:10%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $tabAllUser = getMDC();
                            foreach ($tabAllUser as $user)
                            { ?>
                            <tr>
                                <td>
                                    <?php echo $user['prenom']; ?>
                                </td>
                                <td>
                                    <?php echo $user['nom']; ?>
                                </td>
                                <td>
                                    <?php echo $user['email']; ?>
                                </td>
                                <td col>
                                    BeGone
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <br>
                    <div class="section-header ">

                        <h3>Candidatures pour membre de confiance de l'ADEPT!</h3>

                    </div>

                    <hr>
                    <?php if(isset($_GET['status'])&&$_GET['status'] == 0 ){
                        echo "<div class='alert alert-primary'>Candidature ajoutée avec succès.</div>";
                     }
                     if(isset($_GET['status']) && $_GET['status'] == 1 )
                     {
                        echo  "<div class='alert alert-danger'>Candidature retourne une erreur lors de la fonction bd_membreConfiance.</div>" ;
                     }
                     if(isset($_GET['status']) && $_GET['status'] == 2 )
                     {
                        echo "<div class='alert alert-danger'>Aucun ID de candidature.</div>" ;
                     } ?>
                    <section id="listeUtilisateurs">
                        <table class="table table-bordered table-striped ">
                            <thead class="thead-dark">
                                <tr>
                                    <th style="width:30%">Prenom</th>
                                    <th style="width:30%">Nom</th>
                                    <th style="width:30%">Couriel</th>
                                    <th style="width:10%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                            $tabAllUser = getCandidaturesMDC();
                            foreach ($tabAllUser as $user)
                            { ?>
                                <tr>
                                    <td>
                                        <?php echo $user['prenom']; ?>
                                    </td>
                                    <td>
                                        <?php echo $user['nom']; ?>
                                    </td>
                                    <td>
                                        <?php echo $user['Email']; ?>
                                    </td>
                                    <td col>
                                        <a href="../controller/MDCadd.php?id=<?php echo $user['id']; ?>">Accepter</a>
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