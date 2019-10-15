<?php 
require_once  "../model/bdconnect.php";
require_once("../i18n/translationService.php");
$t = getTranslations();

?>
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
  <link href="../css/hoodie.css" rel="stylesheet">

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
                    <li class="menu-active d-block d-sm-none"><a href="../index.php"><?php echo $t->home ?></a></li>
                    <li><a href="../index.php?lang=<?php echo $t->lang ?>#about"><?php echo $t->about ?></a></li>
                    <li><a href="../index.php?lang=<?php echo $t->lang ?>#services"><?php echo $t->services ?></a></li>
                    <li><a href="../index.php?lang=<?php echo $t->lang ?>#team"><?php echo $t->team ?></a></li>
                    <li><a href="../index.php?lang=<?php echo $t->lang ?>#contact"><?php echo $t->contact ?></a></li>
                    <li><a href="http://adeptinfo.ca/lan"><?php echo $t->lan_adept ?></a></li>
                    <li><a href="?lang=<?php echo $t->switcher ?>"><?php echo $t->switcher ?></a></li>

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
       if ($result == "success") 
       { ?>
				<div id="confirmation" class="alert alert-success"><?php echo $t->hoodies_mod->success ?><strong><?php echo $resvnum ?></strong></div>
			<?php } else if ($result == "error") { ?>
				<div id="infirmation" class="alert alert-danger"><?php echo $t->hoodies_mod->error ?></div>
			<?php } ?>

		  <h3><?php echo $t->hoodies_mod->title ?></h3>
      <?php echo $t->hoodies_mod->desc ?>
      <br>
      <a class="btn btn-lg btn-outline-primary theme-font" href="#resvform"><?php echo $t->hoodies_mod->cta ?></a><br><br>

      <h4><?php echo $t->hoodies_mod->subtitle ?></h4>

		</div>
		<div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top" src="../img/hoodies/hoodie_navy.jpg" >
                    <div class="card-body">
                        <h6 class="card-text"><?php echo $t->hoodies_mod->navy ?></h6>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top" src="../img/hoodies/hoodie_noir.jpg" >
                    <div class="card-body">
                        <h6 class="card-text"><?php echo $t->hoodies_mod->black ?></h6>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top" src="../img/hoodies/hoodie_royal.jpg" >
                    <div class="card-body">
                        <h6 class="card-text"><?php echo $t->hoodies_mod->blue ?></h6>
                    </div>
                </div>
            </div>
		</div>
		<span id="resvform"></span>
		<hr >
		<section>
            <br>
		<h3><?php echo $t->hoodies_mod->reservation ?></h3>
		<div class="form">
		    <!-- <div class="alert alert-info">
		        <strong><?php echo $t->hoodies_mod->rsv_ended ?>.
		    </div> -->
		  <form action="../admin/controller/HoodieCreateReservation.php" method="post" role="form" class="contactForm">
			<div class="form-row">
			  <div class="form-group col-md-6">
				<input type="text" name="prenom" class="form-control" id="firstname" placeholder="<?php echo $t->hoodies_mod->firstname ?>" required />
			  </div>
			  <div class="form-group col-md-6">
				<input type="text" name="nom" class="form-control" id="lastname" placeholder="<?php echo $t->hoodies_mod->lastname ?>" required/>
			  </div>
			</div>
			  <div class="form-row">
				<div class="form-group col-md-6">
				  <input type="email" class="form-control" name="email" id="email" placeholder="<?php echo $t->hoodies_mod->email ?>" data-rule="email" data-msg="<?php echo $t->hoodies_mod->email_dsc ?>" required/>
				  <div class="validation"></div>
				</div>
				  <div class="form-group col-md-6">
					  <input type="text" name="studentid" class="form-control" id="studentid" placeholder="<?php echo $t->hoodies_mod->studentid ?>" pattern="^[1][0-9]{6}$" title="<?php echo $t->hoodies_mod->sid_invalid ?>" required />
				  </div>
			  </div>
			<div class="form-group card">
			  <div class="card-body">
				<p class="underlined"><?php echo $t->hoodies_mod->size ?></p>
                  <div class="radio">
                    <label>
                      <input type="radio" name="size" id="size1" value="S" required>&nbsp;
                      <?php echo $t->hoodies_mod->small ?>
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="size" id="size2" value="M">&nbsp;
                      <?php echo $t->hoodies_mod->medium ?>
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="size" id="size3" value="L">&nbsp;
                      <?php echo $t->hoodies_mod->large ?>
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                        <input type="radio" name="size" id="size3" value="XL">&nbsp;
                        <?php echo $t->hoodies_mod->xlarge ?>
                    </label>
                  </div>
<!--                  <div class="radio">-->
<!--                    <label>-->
<!--                      <input type="radio" name="size" id="sizeundefined" value="N" checked>&nbsp;-->
<!--                      <?php echo $t->hoodies_mod->try ?>-->
<!--                    </label>-->
<!--                  </div>-->
                </div>
			  </div>
              <div class="form-group card">
                  <div class="card-body">
                      <label for="selectCouleur" class="underlined"><?php echo $t->hoodies_mod->colors ?></label>
                      <select class="form-control" name="color" id="selectCouleur" required>
                          <option value=""><?php echo $t->hoodies_mod->colors_sub ?></option>
                          <option value="Navy"><?php echo $t->hoodies_mod->navy ?></option>
                          <option value="Black"><?php echo $t->hoodies_mod->black ?></option>
                          <option value="Royal"><?php echo $t->hoodies_mod->blue ?></option>
                      </select>
                  </div>
              </div>
			<div class="text-center"><button type="submit"><?php echo $t->hoodies_mod->confirm ?></button></div>
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
          <?php echo $t->footer->copyright ?>
          </div>
      </div>
      <div class="text-center">
          <a href="../admin/" class="text-dark"><?php echo $t->hoodies_mod->manage ?></a>
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
