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
                            $tabUsers = getMDC();
                            foreach ($tabUsers as $user)
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
                                <td >
                                    <a href="../controller/MDCRemove.php?id=<?php echo $user['id']; ?>">Retirer</a>
                                </td>
                            </tr>
                            <?php } ?>
                            <tr>
                                <td colspan="2">
                                </td>
                                <td colspan="2">
                                    <a href="../controller/MDCremove.php?id=all">Retirer tout les membres de confiance.</a>
                                </td>
                            </tr>
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
                            $tabAll = getCandidaturesMDC();
                            foreach ($tabAll as $candidature)
                            { ?>
                                <tr class="clickable" data-toggle="collapse" id="row<?php echo $candidature['ReponseID'];?>" data-target=".row<?php echo $candidature['ReponseID'];?>">
                                    <td>
                                        <?php echo $candidature['prenom']; ?>
                                    </td>
                                    <td>
                                        <?php echo $candidature['nom']; ?>
                                    </td>
                                    <td>
                                        <?php echo $candidature['Email']; ?>
                                    </td>
                                    <td>
                                        <a href="../controller/MDCadd.php?id=<?php echo $candidature['ReponseID']; ?>">Accepter</a>
                                    </td>
                                </tr>
                                <tr class="collapse row<?php echo $candidature['ReponseID'];?>">
                                    <td>
                                        <?php echo $candidature['NbSessions']." Sessions"; ?>
                                    </td>
                                    <td>
                                        <?php echo "<b>Motivation:</b><br>".$candidature['Motivations']; ?>
                                    </td>
                                    <td>
                                        <?php echo "<b>Situation:</b><br>".$candidature['Situation']; ?>
                                    </td>
                                    <td>
                                        <?php echo "<b>Pizza:</b><br>".$candidature['Pizza']; ?>
                                    </td>
                                </tr>
                                <tr class="collapse row<?php echo $candidature['ReponseID'];?>">
                                    <td>
                                        <?php echo "<b>Maths (</b><i>(x-y)(x+3)</i><b>):</b><br>".$candidature['Facto']; ?>
                                    </td>
                                    <td>
                                        <?php echo "<b>Java ou Javascript ?:</b><br>".$candidature['JavaJs']; ?>
                                    </td>
                                    <td>
                                        <?php echo "<img src='".$candidature['Meme']."'/> <br> <a href='".$candidature['Meme']."'>if not work</a>"; ?>
                                    </td>
                                    <td>
                                        <?php echo "<b>Gif ou Jif:</b><br>".$candidature['Gif']; ?>
                                    </td>
                                </tr>
                                <tr class="collapse row<?php echo $candidature['ReponseID'];?>">
                                    <td>
                                        <?php echo "<b>Sujet Banis:</b><br>".$candidature['SujetBanis'];?>
                                    </td>
                                    <td>
                                        <?php echo "<b>IF !Arizona THEN MDCrefuse():</b><br>".$candidature['Breuvage']; ?>
                                    </td>
                                    <td>
                                        <?php echo "<b>Aliment le plus vendu:</b><br>".$candidature['AlimentPlusVendu']; ?>
                                    </td>
                                    <td>
                                        <?php echo "<b>Numero du local (F-041):</b><br>".$candidature['NumeroLocal']; ?>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                                    <br> <br>
                        <a href="MDCHistorique.php" class="btn btn-primary float-right">Histoque des candidatures</a>

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