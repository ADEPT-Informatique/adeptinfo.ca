<?php

ob_start();
session_start();
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
                <table class="table table-bordered table-striped ">
                    <thead class="thead-dark">
                        <tr>
                            <th style="width:20%" >Prenom</th>
                            <th style="width:20%" >Nom</th>
                            <th style="width:20%" >Role</th>
                            <th style="width:30%" >Couriel</th>
                            <th style="width:10%" ></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $tabAllUser = getStaff();
                            foreach ($tabAllUser as $user)
                            { ?>
                                <tr class="clickable" data-toggle="collapse" id="row<?php echo $user['userID'];?>" data-target=".row<?php echo $user['userID'];?>">
                                    <td>
                                        <?php echo $user['Role']; ?>
                                    </td>
                                    <td >
                                        <?php echo $user['prenom']; ?>
                                    </td> 
                                    <td >
                                        <?php echo $user['nom']; ?>
                                    </td> 
                                    <td >
                                        <?php echo $user['email']; ?>
                                    </td> 
                                    <td >
                                        Retirer du CA
                                    </td> 
                                </tr>
                                <tr class="collapse row<?php echo $user['userID'];?>">
                                    <td>
                                        <img src="../../img/users/<?php echo $user['userID']; ?>.jpg" />
                                    </td>
                                    <td >
                                        <b>UserID:</b> <br>
                                        <?php echo $user['userID']; ?>
                                    </td> 
                                    <td >
                                        <?php echo $user['nom']; ?>
                                    </td> 
                                    <td >
                                        Changer l'Image <br>
                                        <form action="../controller/AdminEditIMG.php" method="POST" >
                                            <input type="file" name="img" id=" name"/>
                                            <input type="submit" value="Submit">
                                        </form>
                                    </td> 
                                    <td >
                                        <b>Options:</b> <br>
                                        Changer Email<br>
                                        Reset mot de passe
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
