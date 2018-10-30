<?php require_once  "../model/bdconnect.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>ADEPT Informatique</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <!-- Favicons -->
  <link href="../img/favicon.png" rel="icon">
  <link href="../img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
    <link href="../node_modules/bootstrap/dist/css/bootstrap.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
    <link href="../node_modules/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../node_modules/animate.css/animate.min.css" rel="stylesheet">
<!--    <link href="../node_modules/ionicons/dist/css/ionicons.min.css" rel="stylesheet">-->
    <link href="../node_modules/owl.carousel/dist/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../node_modules/lightbox2/dist/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="../css/style.css" rel="stylesheet">
  <link href="./hoodie.css" rel="stylesheet">

</head>

<body>

  <!--==========================
	HEADER
  ============================-->
    <header id="header">
        <div class="container-fluid">
            <div id="logo" class="pull-left">
                <h1><a href="../index.php" class="scrollto">ADEPT</a></h1>
            </div>
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li class="menu-active d-block d-sm-none"><a href="../index.php">Accueil</a></li>
                    <li><a href="../index.php#about">Qui sommes nous</a></li>
                    <li><a href="../index.php#services">Services</a></li>
                    <li><a href="../index.php#team">Membres du conseil</a></li>
                    <li><a href="../index.php#contact">Contact</a></li>
                    <li><a href="http://adeptinfo.ca/lan">LAN de L'ADEPT</a></li>
                </ul>
            </nav>
        </div>
    </header>


  <main id="module">


	<!--==========================
	  Module de réservation
	============================-->
	<section id="contact" class="section-bg wow fadeInUp">
	  <div class="container">

		<div class="section-header text-center">

			<?php
			 $result = validateGet("r");
			 $resvnum = validateGet("c");
			 if ($result == "success") { ?>
				<div id="confirmation" class="alert alert-success">Votre réservation à été faite avec succès! Un courriel de confirmation vous a été envoyé. <br>Votre numéro de réservation est <strong><?php echo $resvnum ?></strong></div>
			<?php } else if ($result == "error") { ?>
				<div id="infirmation" class="alert alert-danger">Oh non! Une erreur c'est produite <br>Veuillez réessayer</div>
			<?php } ?>

		  <h3>Les Hoodies de l'ADEPT sont arrivés!</h3>
		  <p>Intéréssé par un hoodie de la technique !? C'est le moment d'effectuer votre commande pour la session A18!<br>
              <br>Les hoodie coûtent 40$ (taxes incluses) et un supplément est applicable pour les tailles plus grandes que XL.<br><strong>Veuillez noter qu'un dépôt d'au moins 20$ sera nécessaire avant l'envoi de votre commande à notre fournisseur..</strong><br>
          </p>
            <a class="btn btn-lg btn-outline-primary theme-font" href="#resvform">RÉSERVER MAINTENANT</a><br><br>

            <h4>Cette année, le hoodie de l'ADEPT est disponible en 3 couleurs !</h4>

		</div>
		<div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top" src="../img/hoodies/hoodie_navy.jpg" >
                    <div class="card-body">
                        <h6 class="card-text">Navy</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top" src="../img/hoodies/hoodie_noir.jpg" >
                    <div class="card-body">
                        <h6 class="card-text">Noir</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top" src="../img/hoodies/hoodie_royal.jpg" >
                    <div class="card-body">
                        <h6 class="card-text">Bleu royal</h6>
                    </div>
                </div>
            </div>
		</div>
		<span id="resvform"></span>
		<hr >
		<section>
            <br>
		<h3>Réservation</h3>
		<div class="form">
		    <!-- <div class="alert alert-info">
		        <strong>La période de réservation des hoodies est maintenant terminée.</strong><br>
		        Pour plus d'informations, adressez-vous à un membre du CA de l'ADEPT.
		    </div> -->
		  <form action="createReservation.php" method="post" role="form" class="contactForm">
			<div class="form-row">
			  <div class="form-group col-md-6">
				<input type="text" name="prenom" class="form-control" id="firstname" placeholder="Prénom" required />
			  </div>
			  <div class="form-group col-md-6">
				<input type="text" name="nom" class="form-control" id="lastname" placeholder="Nom" required/>
			  </div>
			</div>
			  <div class="form-row">
				<div class="form-group col-md-6">
				  <input type="email" class="form-control" name="email" id="email" placeholder="Votre adresse courriel" data-rule="email" data-msg="Veuillez nous fournir une adresse courriel valide.<br>Cette information est nécéssaire pour vous contacter lorsque votre commande sera prête à être récupérée" required/>
				  <div class="validation"></div>
				</div>
				  <div class="form-group col-md-6">
					  <input type="text" name="studentid" class="form-control" id="studentid" placeholder="Numéro d'étudiant" pattern="^[1][0-9]{6}$" title="Ce numéro d'étudiant est invalide" required />
				  </div>
			  </div>
			<div class="form-group card">
			  <div class="card-body">
				<p class="underlined">Grandeur</p>
                  <div class="radio">
                    <label>
                      <input type="radio" name="size" id="size1" value="S" required>&nbsp;
                      Petit
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="size" id="size2" value="M">&nbsp;
                      Moyen
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="size" id="size3" value="L">&nbsp;
                      Grand
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                        <input type="radio" name="size" id="size3" value="XL">&nbsp;
                        Très Grand
                    </label>
                  </div>
<!--                  <div class="radio">-->
<!--                    <label>-->
<!--                      <input type="radio" name="size" id="sizeundefined" value="N" checked>&nbsp;-->
<!--                      J'irai essayer les grandeurs à l'ADEPT-->
<!--                    </label>-->
<!--                  </div>-->
                </div>
			  </div>
              <div class="form-group card">
                  <div class="card-body">
                      <label for="selectCouleur" class="underlined">Couleur</label>
                      <select class="form-control" name="color" id="selectCouleur" required>
                          <option value="">Veuillez choisir la couleur</option>
                          <option value="Navy">Navy</option>
                          <option value="Black">Noir</option>
                          <option value="Royal">Bleu</option>
                      </select>
                  </div>
              </div>
			<div class="text-center"><button type="submit">Confirmer</button></div>
		  </form>
		</div>
    <br>

		</section>
	  </div>
	</section>

  </main>

  <!--==========================
	Footer
  ============================-->
  <footer id="footer">
      <div class="container">
          <div class="copyright">
              &copy; Copyright 2018 <strong class="green">ADEPT Informatique</strong>. Tous droits réservés
          </div>
      </div>
      <div class="text-center">
          <a href="admin.php" class="text-dark">Gérer les réservations</a>
      </div>


	  <div class="credits">
		<!--
		  All the links in the footer should remain intact.
		  You can delete the links only if you purchased the pro version.
		  Licensing information: https://bootstrapmade.com/license/
		  Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=BizPage

		<Best <a href="https://bootstrapmade.com/">Bootstrap Templates</a> by BootstrapMade
		-->
	  </div>
  </footer><!-- #footer -->


  <!-- JavaScript Libraries -->
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/jquery-migrate/dist/jquery-migrate.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../node_modules/jquery.easing/jquery.easing.min.js"></script>
  <script src="../js/main.js"></script>

</body>
</html>
