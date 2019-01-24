<?php
ob_start();
session_start();

require_once('../model/bd_utilisateur.php');
require_once('../model/HoodieModuleFunctions.php');
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
$reservations = GetAllClientReservation();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>ADEPT - Administration</title>
    <?php include "../includes/dash_meta_links.php"?>

</head>

<body>
    <?php include("../includes/dash_header.php") ?>
            <!-- MAIN CONTENT-->
    
            <?php include("HoodieIndex.html");
            ?>
            <!-- END PAGE CONTAINER-->
        </div>
    </div>

    <?php include "../includes/dash_scripts.php"?>

</body>

</html>
<!-- end document-->
