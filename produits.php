<?php 
require_once "controller/produitsController.php"; 

$brevages = ObtenirBrevagesDispo();
$collations = ObtenirCollationsDispo();

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>ADEPT Informatique - Autofinancement</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <!-- Favicons -->
        <link href="img/favicon.png" rel="icon">
        <link href="img/apple-touch-icon.png" rel="apple-touch-icon">
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet">
        <!-- Bootstrap CSS File -->
        <link href="node_modules/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
        <!-- Libraries CSS Files -->
        <link href="node_modules/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="node_modules/animate.css/animate.min.css" rel="stylesheet">
        <link href="node_modules/ionicons/css/ionicons.min.css" rel="stylesheet">
        <link href="node_modules/owl.carousel/dist/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="node_modules/lightbox2/dist/css/lightbox.min.css" rel="stylesheet">
        <!-- Main Stylesheet File -->
        <link href="css/style.css?v1.4" rel="stylesheet">

        <style>
            body{
                padding-top: 90px;
            }
        </style>
    </head>
    <body>
        <!--==========================
	                HEADER
        ============================-->
        <header id="header" style="background: black">
            <div class="container-fluid">
                <div id="logo" class="pull-left">
                    <h1><a href="./index.php" class="scrollto">ADEPT</a></h1>
                </div>
                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <li class="menu-active d-block d-sm-none"><a href="../index.php">Accueil</a></li>
                        <li><a href="./index.php#about">Qui sommes nous</a></li>
                        <li><a href="./index.php#services">Services</a></li>
                        <li><a href="./index.php#team">Membres du conseil</a></li>
                        <li><a href="./index.php#contact">Contact</a></li>
                        <li><a href="http://adeptinfo.ca/lan">LAN de L'ADEPT</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <section id="contact" class="section-bg wow fadeInUp">
            <div class="container">
                <div class="section-header text-center">
                <header class="section-header wow fadeInUp">
                    <h3>Autofinancement</h3>
                </header>
                    <p class="compact">
                        Afin d'organiser des évennements comme le LAN et d'améliorer l'aménagement de notre local,
                        l'ADEPT offre à ses membres (et à tous les visiteurs) un programme d'autofinancement.

                        Nous vous offrons ainsi une vaste séléction de collations et de repas hautement gatronomiques à faible coût qui respectent
                        bien entendu les recommendations du guide alimentaire canadien! Ce qui est avantageux pour vous, en tant que membre, c'est
                        que tous les profits retournent directement à l'association et donc en quelques sortes à vous même !
                    </p>
                    
                    <p class="font-weight-bold compact">
                        Voici la liste des produits disponible à notre local (F-041)
                    </p>
                </div>
                <div class="row">
                    <div class="col-md-6" style="margin-bottom:10px">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-striped">
                                <thead>
                                    <tr>
                                    <th scope="col">Brevages</th>
                                    <th scope="col">Prix</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($brevages as $brevage) {
                                    echo "<tr>
                                                <td>".$brevage['NomProduit']."</td>
                                                <td>".$brevage['Prix']." $</td>
                                            </tr>";
                                    }  ?>
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-striped">
                                <thead>
                                    <tr>
                                    <th scope="col">Collations/Repas</th>
                                    <th scope="col">Prix</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($collations as $collation) {
                                    echo "<tr>
                                                <td>".$collation['NomProduit']."</td>
                                                <td>".$collation['Prix']." $</td>
                                            </tr>";
                                    }  ?>
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--==========================
            Pied de page
        ============================-->
        <footer id="footer">
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 footer-info">
                            <img src="img/badge.png" id="footer-logo">
                        </div>
                        <div class="col-lg-3 col-md-6 footer-links">
                            <h4>Liens utiles</h4>
                            <ul>
                                <li><i class="ion-ios-arrow-right"></i> <a href="./hoodies/index.php">Réserver un hoodie</a></li>
                                <li><i class="ion-ios-arrow-right"></i> <a href="http://adeptinfo.ca/lan">Le LAN de l'ADEPT</a></li>
                                <li><i class="ion-ios-arrow-right"></i> <a href="index.php#about" class="btn-get-started scrollto">À propos</a></li>
                                <li><i class="ion-ios-arrow-right"></i> <a href="index.php#services" class="btn-get-started scrollto">Nos services</a></li>
                                <li><i class="ion-ios-arrow-right"></i> <a href="https://github.com/ADEPT-Informatique/Charte/blob/master/README.md" class="btn-get-started scrollto">Charte de l'ADEPT</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-6 footer-contact">
                            <h4>Visitez-nous</h4>
                            <p>
                                945 chemin Chambly, Longueuil<br>
                                Local F-041, CEM,<br>
                                Québec, Canada <br>
                                <a href="mailto:adept.informatique.cem@gmail.com">Nous écrire par courriel...</a>
                            </p>
                            <div class="social-links">
                                <!--
                                    <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                                    <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                                    <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                                    -->
                                <a href="https://www.facebook.com/ADEPTInformatique/" class="facebook"><i class="fa fa-facebook"></i></a>
                                <a href="https://github.com/ADEPT-Informatique" class="git-hub"><i class="fa fa-github"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 footer-newsletter">
                            <h4>Infolettre</h4>
                            <p>Inscrivez-vous afin de recevoir des nouvelles de nos événements et activités !</p>
                            <form action="controller/subscribe.php" method="post">
                                <input type="email" name="email" placeholder="Email" required><input type="submit"  value="S'abonner">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    &copy; Copyright 2018 <strong class="green">ADEPT Informatique</strong>. Tous droits réservés.
                </div>
                <div class="credits">
                    Ce site web est <a href="https://github.com/adept-informatique/adeptinfo.ca">open-source</a>. Merci à <a href="https://github.com/ADEPT-Informatique/adeptinfo.ca#remerciements">tous ceux qui y ont collaboré</a> !
                </div>
            </div>
        </footer>

        <!-- JavaScript Libraries -->
        <script src="./node_modules/jquery/dist/jquery.min.js"></script>
        <script src="./node_modules/jquery-migrate/dist/jquery-migrate.min.js"></script>
        <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="./node_modules/jquery.easing/jquery.easing.min.js"></script>
        <script src="./js/main.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    </body>

</html>

