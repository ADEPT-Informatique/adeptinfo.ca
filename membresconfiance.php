<?php require_once "controller/requestsHandlers.php"; 
require_once("i18n/translationService.php");

$t = getTranslations();
?>
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
        <link href="css/mbconfiance.css" rel="stylesheet">
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
                        <li class="menu-active d-block d-sm-none"><a href="../index.php"><?php echo $t->home ?></a></li>
                        <li><a href="./index.php#about"><?php echo $t->about ?></a></li>
                        <li><a href="./index.php#services"><?php echo $t->services ?></a></li>
                        <li><a href="./index.php#team"><?php echo $t->team ?></a></li>
                        <li><a href="./index.php#contact"><?php echo $t->contact ?></a></li>
                        <li><a href="http://adeptinfo.ca/lan"><?php echo $t->lan_adept ?></a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <div class="container content">
            <header class="section-header">
                <h3><?php echo $t->mconfiances->become_mdc ?></h3>
            </header>
            <div class="row">
                <?php if (isset($_GET['r']) && $_GET['r']=='success' ){ ?>
                    <div class="col-md-7">
                        <div class="alert alert-primary"><?php echo $t->mconfiances->success ?></div>
                    </div>
                <?php } else if ((isset($_GET['r']) && $_GET['r']=='error' )){ ?>
                    <div class="col-md-7">
                        <div class="alert alert-danger"><?php echo $t->mconfiances->error ?></div>
                    </div>
                <?php }?>


            </div>
            <div class="row">
                <div class="col-md-8" id="1">
                    <p>
                        <?php echo $t->mconfiances->mdc_lead ?>
                    </p>
                    <p>
                        <?php echo $t->mconfiances->mdc_desc ?>
                    </p>
                    <button id="btn-1" class="btn btn-outline-light"><?php echo $t->mconfiances->mdc_cta ?></button>
                </div>
                <div class="col-md-8" style="display: none" id="2">
                    <p>
                       <strong><?php echo $t->mconfiances->mdc_criterias_title?></strong>
                    </p>
                    <ol>
                        <?php echo $t->mconfiances->mdc_criterias_list ?>
                    </ol>
                    <p><?php echo $t->mconfiances->mdc_limited ?></p>

                    <button id="btn-2" class="btn btn-outline-light"><?php echo $t->mconfiances->continue ?></button>
                </div>
                <div id="logo-mdc" class="col-md-4">
                    <img src="img/membre-confiance.png">
                </div>
            </div>
            <div class="row text-center" style="display: none; padding-top: 0" id="contact">
                <div class="col-md-12">
                    <strong><?php echo $t->mconfiances->mdc_form_lead ?></strong><br>
                    (&nbsp;<?php echo $t->mconfiances->mdc_form_hint ?>&nbsp;!&nbsp;)
                        
                <?php if ($t->lang == 'en') { echo "<br>Please take note that this form is only available in french." ;} ?>
                </div>
                <div class="col-md-8 offset-md-2 form text-left">
                    <form action="controller/candidatureMdc.php" method="post" role="form" class="contactForm">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="nom">Quel est ton nom ?</label>
                                <input type="text" name="nom" class="form-control" id="nom" placeholder="Prénom Nom" required />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="email">Quel est ton adresse email ?</label>
                                <input type="email" name="email" class="form-control" id="email" required />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="nbsession">Combien de sessions en informatique as-tu complétées jusqu'à date ?</label>
                                <input type="number" name="nbsession" class="form-control" id="nbsession" required />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="raison">Pour quelle(s) raison(s) veux-tu devenir membre de confiance ?</label>
                                <textarea id="raison" class="form-control" name="raison" required></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="reaction">Un étudiant utilise la télévision comme escabot pour grimper sur le réfrigérateur. En lui demandant ce qu'il fait, il vous répond qu'il achète un thé glacé à l'ATIM par le plafond. Que faites-vous ?</label>
                                <textarea id="reaction" class="form-control" name="reaction" required></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="bin">01010001 01110101 01100101 01101100 01101100 01100101 00100000 01100101 01110011 01110100 00100000 01110100 01100001 00100000 01110011 01101111 01110010 01110100 01100101 00100000 01100100 01100101 00100000 01110000 01101001 01111010 01111010 01100001 00100000 01110000 01110010 11000011 10101001 01100110 11000011 10101001 01110010 11000011 10101001 01100101 ?</label>
                                <input type="text" name="bin" class="form-control" id="bin" required />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="facto">Factorise l'expression suivante : <i>x<sup>2</sup>&nbsp;+&nbsp;3x&nbsp;-&nbsp;xy&nbsp;-&nbsp;3y</i></label>
                                <input type="text" name="facto" class="form-control" id="facto" required />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="java">Java ou Javascript ?</label>
                                <input type="text" name="java" class="form-control" id="java" required />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="gif">Comment prononce-t-on gif ?</label>
                                <input type="text" name="gif" class="form-control" id="gif" required />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="meme">Quel meme te représente le mieux ? (Copie-colle un lien)</label>
                                <input type="text" name="meme" class="form-control" id="meme" required />
                            </div>
                        </div>
                        <br>
                        Pour terminer, quelques question sur la <b>Culture adeptienne</b>...
                        <br>
                        <br>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="ban">Quels sont le ou les sujet(s) bannis de l’ADEPT ?</label>
                                <input type="text" name="ban" class="form-control" id="ban" required />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="brev">Quel est LE breuvage officiel de l’ADEPT ?</label>
                                <input type="text" name="brev" class="form-control" id="brev" required />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="alim">Quel est l’aliment le plus vendu dans l'histoire de l'asso ?</label>
                                <input type="text" name="alim" class="form-control" id="alim" required />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="local">Sans tricher, quel est le numéro de local de l’ADEPT ?</label>
                                <input type="text" name="local" class="form-control" id="local" required />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="check" required>
                                <label class="form-check-label" for="check">Je comprend qu'il ne peut y avoir qu'un
                                    nombre limité de membres de confiance par session et que ma participation ne garantit pas
                                ma sélection.</label>
                            </div>
                        </div>
                        <br>
                        <div class="text-center"><button type="submit" class="btn btn-outline-light">Envoyer ma candidature</button></div>
                    </form>
                    <br>
                    <div class="text-center">
                        <img src="img/membre-confiance.png" width="300">
                    </div>
                </div>
            </div>
        </div>


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
                            <h4><?php echo $t->footer->useful_links ?></h4>
                            <ul>
                                <li><i class="ion-ios-arrow-right"></i> <a href="./hoodies/index.php"><?php echo $t->footer->get_hoodie ?></a></li>
                                <li><i class="ion-ios-arrow-right"></i> <a href="http://adeptinfo.ca/lan"><?php echo $t->footer->lan_adept ?></a></li>
                                <li><i class="ion-ios-arrow-right"></i> <a href="index.php#about" class="btn-get-started scrollto"><?php echo $t->footer->about ?></a></li>
                                <li><i class="ion-ios-arrow-right"></i> <a href="index.php#services" class="btn-get-started scrollto"><?php echo $t->footer->services ?></a></li>
                                <li><i class="ion-ios-arrow-right"></i> <a href="https://github.com/ADEPT-Informatique/Charte/blob/master/README.md" class="btn-get-started scrollto"><?php echo $t->footer->charter ?></a></li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-6 footer-contact">
              <h4><?php echo $t->footer->visit_us ?>s</h4>
              <p>
                <?php echo $t->footer->address ?>
                <br>
                <a href="mailto:adept.informatique.cem@gmail.com"><?php echo $t->footer->email_us ?></a>
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
              <h4><?php echo $t->footer->newsletter ?></h4>
              <p><?php echo $t->footer->newsletter_txt ?></p>
              <form action="controller/subscribe.php" method="post">
                <input type="email" name="email" placeholder="Email" required><input type="submit"  value="<?php echo $t->footer->input_subscribe ?>">
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="copyright">
        <?php echo $t->footer->copyright ?>
        </div>
        <div class="credits">
        <?php echo $t->footer->opensource ?>
			<br><span class="black">Why do Java programmers wear glasses ? Because they can't C# ;)</span>
		</div>
      </div>
    </footer>

        <!-- JavaScript Libraries -->
        <script src="./node_modules/jquery/dist/jquery.min.js"></script>
        <script src="./node_modules/jquery-migrate/dist/jquery-migrate.min.js"></script>
        <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="./node_modules/jquery.easing/jquery.easing.min.js"></script>
        <script src="./js/main.js"></script>
        <script>
            $('#btn-1').click(function () {
                $('#1').fadeOut(function () {
                    $('#2').fadeIn();
                });
            })
            $('#btn-2').click(function () {
                $('#logo-mdc').fadeOut();
                $('#2').fadeOut(function () {
                    $('#contact').fadeIn();
                });
            })
        </script>
    </body>
</html>

