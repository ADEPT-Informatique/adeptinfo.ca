<?php require_once "controller/requestsHandlers.php"; ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>ADEPT Informatique</title>
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
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">
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
        <section id="call-to-action" class="wow fadeIn">
            <div class="container text-center">
                <div class="row">
                    <?php if (isset($_GET['r']) && $_GET['r']=='success' ){ ?>
                        <div class="col-md-12">
                            <div class="alert alert-primary">Votre candidature a été envoyée avec succès!</div>
                        </div>
                    <?php } else if ((isset($_GET['r']) && $_GET['r']=='error' )){ ?>
                        <div class="col-md-12">
                            <div class="alert alert-danger">Une erreur est survenue! Veuillez réésayer.</div>
                        </div>
                    <?php }?>


                </div>
                <img src="./img/logo-lan.png" id="logo-lan" />
                <header class="section-header wow fadeInUp">
                    <h3>Nous avous besoin de vous<br>comme chef d'équipe !</h3>
                </header>
            </div>
        </section>
        <section id="contact" class="section-bg wow fadeInUp">
            <div class="container">
                <div class="section-header text-center">
                    <p class="compact">
                        Le comité officiel du LAN formé de membres volontaires qui s'engagent à contribuer à l'organisation du LAN.<br>
                        Ce comité est établi à chaque début de session.
                        Il est composé de 4 chefs et d'équipes sous-jacente à chacun des rôle.<br>
                        <a href="https://github.com/ADEPT-Informatique/Charte/blob/master/README.md#chapitre-8--comité-officiel-du-lan">En savoir plus sur le comité du lan</a>
                    </p>
                    <p class="font-weight-bold compact">
                        Vous souhaitez vous impliquer ? Devenir chef d'équipe est le moyen idéal !
                    </p>

                </div>

                <div class="form">
                    <form action="controller/candidaturecomite.php" method="post" role="form" class="contactForm">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="text" name="prenom" class="form-control" id="prenom" placeholder="Votre prénom" required minlength="4"/>
                                <div class="validation"></div>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" name="nom" class="form-control" id="nom" placeholder="Votre nom" required minlength="4"/>
                                <div class="validation"></div>
                            </div>

                            <div class="form-group col-md-6">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Votre adresse courriel"  required/>
                                <div class="validation"></div>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="numetu" id="numetu" placeholder="Votre numéro d'étudiant du cégep"  required/>
                                <div class="validation"></div>
                            </div>

                            <div class="form-group col-md-6">
                                <textarea class="form-control" name="motivation" rows="4" placeholder="Pour quelle(s) raison(s) souhaites tu devenir chef d'équipe du comité ?" required minlength="10"></textarea>
                                <div class="validation"></div>
                            </div>
                            <div class="form-group col-md-6">
                                <textarea class="form-control" name="qualifications" rows="4" placeholder="As tu des qualifications ou aptitudes particulières qui pourraient faire de toi un bon candidat ?" required></textarea>
                                <div class="validation"></div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="branche" id="radreseau" value="Réseau" required>
                                    <label class="form-check-label" for="radreseau">
                                        J'étudie en <b>gestion de réseaux</b>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="branche" id="radprog" value="Prog" required>
                                    <label class="form-check-label" for="radprog">
                                        J'étudie en <b>informatique de gestion</b> (prog)
                                    </label>
                                </div>
                            </div>
                        </div><br>
                        <div class="card">
                            <div class="card-body">
                                As tu déjà participé à l'organisation d'un LAN ou d'un autre évennement semblable ?<br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="participation" id="radoui" value="oui" required>
                                    <label class="form-check-label" for="radoui">
                                        Oui
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="participation" id="radnon" value="non" required>
                                    <label class="form-check-label" for="radnon">
                                       Non
                                    </label>
                                </div>
                            </div>
                        </div><br>
                        <div class="card">
                            <div class="card-body">
                                <div class="col-md-7">
                                    <label for="postes">Veuillez choisir jusqu'à deux postes qui vous intéressent :</label><br>
                                    <select required id="postes" name="postes[]" multiple title="Choisissez une ou deux options" data-width="100%" class="selectpicker" data-max-options="2">
                                        <option value="Gestionnaire de Lan" data-subtext="Chef du comité">Gestionnaire de Lan </option>
                                        <option value="Responsable réseau" data-subtext="Chef de l'équipe réseau">Responsable réseau</option>
                                        <option value="Délégué au matériel et aux locaux" data-subtext="Chef de l'équipe d'installation du LAN">Délégué au matériel et aux locaux</option>
                                        <option value="Responsable des tournois" data-subtext="Chef de l'équipe des administrateurs de tournois">Responsable des tournois</option>
                                    </select>
                                </div>
                            </div>
                        </div><br>
                        <div class="card">
                            <div class="card-body">
                                <div class=" form-check">
                                    <input type="checkbox" class="form-check-input" id="agree" required>
                                    <label class="form-check-label" for="agree">En me présentant comme volontaire, je m’engage à me présenter et à participer activement à l'installation et au rangement du matériel durant le LAN avec l'équipe d'installation.</label>
                                </div>
                            </div>
                        </div><br>
                        <div class="text-center"><button type="submit">Soumettre ma candidature</button></div>
                    </form>
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

