<?php
ob_start();
session_start();
$path = $_SERVER['DOCUMENT_ROOT'].'/admin';
require_once($path.'/model/bd_utilisateur.php');

?>

<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles/style.css">
    <script>
        $(document).ready(function () {
            $('#username').focus();
        })
    </script>
</head>
<body class="loginPage">

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card login" style="width: 25rem;">
                    <div class="card-body text-center">
                        <img src="../img/badge.png" width="120">
                        <h4 class="card-title text-center">Veuillez vous connecter</h4><br>
                        <?php
                            if (isset($_GET['error'])){
                                if ($_GET['error'] == 1){
                                    echo '<h6 class="card-title text-center alert-danger">Utilisateur ou Mot de Passe invalide </h6>';
                                }
                                if ($_GET['error'] == 2){
                                    echo '<h6 class="card-title text-center alert-danger">Utilisateur inexistant</h6>';
                                }
                                if ($_GET['error'] == 3){
                                    echo '<h6 class="card-title text-center alert-danger">Vous n\'êtes  pas connectez.</h6>';
                                }
                            }
                        ?>
                        <br>
                        <form action="model/bd_auth.php" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" id="email" name="email" placeholder="Courriel">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            </div>
                            <input type="submit" class="btn btn-primary btn-block" value="Se connecter">
                        </form>
                        <a href="..">Retour a l'acceuil</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>

</body>
</html>
