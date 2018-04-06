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
  <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="../lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../lib/animate/animate.min.css" rel="stylesheet">
  <link href="../lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="../lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="../css/style.css" rel="stylesheet">
  <link href="hoodie.css" rel="stylesheet">

</head>

<body>

  <!--==========================
	HEADER
  ============================-->
  <header id="header">
	<div class="container-fluid">

	  <div id="logo" class="pull-left">
		<h1><a href="../index.html" class="scrollto">ADEPT</a></h1>
		<!-- Uncomment below if you prefer to use an image logo -->
		<!-- <a href="#intro"><img src="img/logo.png" alt="" title="" /></a>-->
	  </div>

<!--	  <nav id="nav-menu-container">-->
<!--		<ul class="nav-menu">-->
<!--		  <li class="menu-active d-block d-sm-none"><a href="../indexFull.html#intro">Accueil</a></li>-->
<!--		  <li><a href="../indexFull.html#about">Qui sommes nous</a></li>-->
<!--		  <li><a href="../indexFull.html#services">Services</a></li>-->
<!--		  <li><a href="../indexFull.html#team">Membres du conseil</a></li>-->
<!--		  <li><a href="../indexFull.html#contact">Contact</a></li>-->
<!--		  <li><a href="http://lanadept.com">LAN de L'ADEPT</a></li>-->
<!--		</ul>-->
<!--	  </nav><!-- #nav-menu-container -->
	</div>
  </header><!-- #header -->


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
		  <a class="btn btn-lg btn-outline-primary theme-font" href="#resvform">RÉSERVER MAINTENANT</a><br><br>
		  <p>Intéréssé par un hoodie de la technique !? C'est le moment d'effectuer votre commande!<br>
              <br>Les hoodie coûtent 40$ (taxes incluses) et un supplément est applicable pour les tailles plus grandes que XL.<br><strong>Veuillez noter qu'un dépôt d'au moins 20$ sera nécessaire avant l'envoi de votre commande à notre fournisseur..</strong><br>
          </p>

		</div>
		<div class="row">
		  <div class="col-md-7"><img class="boxed" src="../img/hoodies/hoodies.jpg"></div>
		  <div class="col-md-5"><img class="boxed" src="../img/hoodies/badge.png"></div>
		</div>
		<span id="resvform"></span>
		<hr >
		<section>
		<h2>Réservation</h2>
		<div class="form">
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
				  <input type="radio" name="size" id="size1" value="S">&nbsp;
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

			  <div class="radio">
				<label>
				  <input type="radio" name="size" id="sizeundefined" value="N" checked>&nbsp;
				  J'irai essayer les grandeurs à l'ADEPT
				</label>
			  </div>
			  </div>
			</div>


			<div class="text-center"><button type="submit">Confirmer</button></div>
		  </form>
		</div>
            <br>
            <div class="alert alert-primary text-center">
                Hey ! BTW, les inscriptions pour le LAN sont commencées !<br>
                <a href="http://lanadept.com">www.lanadept.com</a>
            </div>
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
  <script src="../lib/jquery/jquery.min.js"></script>
  <script src="../lib/jquery/jquery-migrate.min.js"></script>
  <script src="../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../lib/easing/easing.min.js"></script>
  <script src="../js/main.js"></script>

</body>
</html>
