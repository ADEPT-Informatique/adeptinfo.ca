<?php 
require_once("controller/requestsHandlers.php"); 
include("includes/header.php");
include("admin/model/bd_utilisateur.php");
require_once("i18n/translationService.php");

$t = getTranslations();

?>
</head>
  <body>
  <!-- Load Facebook SDK for JavaScript -->
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = 'https://connect.facebook.net/fr_FR/sdk/xfbml.customerchat.js#xfbml=1&version=v2.12&autoLogAppEvents=1';
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>

	<!-- Your customer chat code -->
	<div class="fb-customerchat"
	  minimized="true"
	  attribution="setup_tool"
	  page_id="1405736689655466"
	  theme_color="#10d213"
	  logged_in_greeting="<?php echo $t->fb_greeting_short ?>"
	  logged_out_greeting="<?php echo $t->fb_greeting ?>">
	</div>
    <!--==========================
        Entête
        ============================-->
    <header id="header">
        <?php include("includes/nav.php")?>
    </header>
    <!-- #header -->
    <!--==========================
        SECTION : ACCUEIL
        ============================-->
    <section id="intro">
      <div class="intro-container">
        <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">
          <ol class="carousel-indicators"></ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active" id="first" style="background-image: url('img/intro-carousel/1.jpg');">
              <div class="carousel-container">
                <div class="carousel-content">
                    <?php $r = validateGet("r");
                    if ($r == 'success'){
                        echo '<div class="alert alert-success top-message">'.$t->message_success.'</div>';
                    } else if ($r == 'error') {
                        echo "<div class='alert alert-danger top-message'>$t->error_form</div>";
                    } else if($r =='error-as') {
                        echo "<div class='alert alert-warning top-message'>$t->already_subscribed</div>";
                    } else if ($r == 'subscribed') {
                        echo "<div class='alert alert-success top-message'>$t->success_subscribe</div>";
                    }?>
                  <h2><?php echo $t->welcome ?></h2>
                  <p><?php echo $t->welcome_msg ?>
                    <br class="hidden-mobile" /><strong><?php echo $t->welcome_sub ?></strong>
                  </p>
                  <a href="#about" class="btn-get-started scrollto"><?php echo $t->discover_adept ?></a>
                </div>
              </div>
            </div>
            <!-- À décommenter pour ajouter des pages au carroussel
            <div class="carousel-item" style="background-image: url('img/intro-carousel/2.jpg');">
                <div class="carousel-container">
                  <div class="carousel-content">
                      <h2>Bienvenue à l'ADEPT</h2>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                      <a href="#about" class="btn-get-started scrollto">Découvrir l'ADEPT</a>
                  </div>
                </div>
                </div>

                <div class="carousel-item" style="background-image: url('img/intro-carousel/3.jpg');">
                <div class="carousel-container">
                  <div class="carousel-content">
                    <h2>Bienvenue à l'ADEPT</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <a href="#about" class="btn-get-started scrollto">Découvrir l'ADEPT</a>
                  </div>
                </div>
                </div> -->
          <!-- </div>
          <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Précédent</span>
          </a>
          <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Suivant</span>
          </a>
        </div> -->
      </div>
    </section>
    <!-- #intro -->
    <main id="main">
      <!--==========================
          SECTION À PROPOS
          ============================-->
      <section id="about">
        <div class="container">
          <header class="section-header">
            <h3 class="small-title"><?php echo $t->mission ?></h3>
            <p><?php echo $t->mission_txt ?></p>
          </header>
          <div class="row about-cols">
            <div class="col-md-4 wow fadeInUp">
              <div class="about-col">
                <div class="img">
                  <img src="img/communaute.jpg" alt="" class="img-fluid">
                  <div class="icon"><i class="ion-ios-people" ></i></div>
                </div>
                <h2 class="title"><a href="#"><?php echo $t->community ?></a></h2>
                <p class="description">
                <?php echo $t->community_txt ?>
                </p>
              </div>
            </div>
            <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
              <div class="about-col">
                <div class="img">
                  <img src="img/adept-hero.jpg" alt="" class="img-fluid">
                  <div class="icon"><i class="fa fa-gavel" style="font-size: 30px"></i></div>
                </div>
                <h2 class="title"><a href="#"><?php echo $t->rights ?></a></h2>
                <p class="description">
                <?php echo $t->rights_txt ?>
                </p>
              </div>
            </div>
            <div class="col-md-4 wow fadeInUp" data-wow-delay="0.2s">
              <div class="about-col">
                <div class="img">
                  <img src="img/hoodie-promo.jpg" alt="" class="img-fluid">
                  <div class="icon"><i class="ion-arrow-graph-up-right"></i></div>
                </div>
                <h2 class="title"><a href="#"><?php echo $t->promote ?></a></h2>
                <p class="description">
                  <?php echo $t->promote_txt ?>
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- #about -->
      <!--==========================
            Section Suis-je membre
      ============================-->
      <section id="featured-services">
        <div class="container">
          <header class="section-header">
            <h3><?php echo $t->am_i_member ?></h3>
            <p class="text-center description"><?php echo $t->am_i_member_txt ?></p>
          </header>
          <div class="row">
            <div class="col-lg-6 box">
              <h2 class="text-center"><i class="fa fa-code"></i></h2>
              <h4 class="title text-center"><span class="white"><?php echo $t->prog ?></span></h4>
              <!--<p class="description text-center">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>-->
            </div>
            <div class="col-lg-6 box box-bg">
              <h2 class="text-center"><i class="fa fa-server"></i></h2>
              <h4 class="title text-center"><span class="white"><?php echo $t->network ?></span></h4>
              <!--<p class="description text-center">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</p>-->
            </div>
          </div>
        </div>
      </section>
      <!-- #featured-services -->
      <!--==========================
          Section des services
      ============================-->
      <section id="services">
        <div class="container">
          <header class="section-header wow fadeInUp">
            <h3><?php echo $t->services ?></h3>
            <p> </p>
          </header>

          <div class="row">
            <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
                <div class="icon"><i class="ion-android-happy"></i></div>
                <h4 class="title"><?php echo $t->local ?></h4>
                <p class="description"><?php echo $t->local_txt ?></p>
            </div>
            <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
                <div class="icon"><i class="ion-ios-game-controller-b"></i></div>
                <h4 class="title"><a href="http://adeptinfo.ca/lan"><?php echo $t->lan ?></a></h4>
                <p class="description"><?php echo $t->lan_txt ?></p>
            </div>
            <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
              <div class="icon"><i class="ion-tshirt-outline"></i></div>
              <h4 class="title"><a href="./hoodies/index.php"><?php echo $t->hoodies ?></a></h4>
              <p class="description"><?php echo $t->hoodies_txt ?></p>
            </div>
            <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
              <div class="icon"><i class="ion-pizza"></i></div>
              <h4 class="title"><a href="./produits.php"><?php echo $t->fridge ?></a></h4>
              <p class="description"><?php echo $t->fridge_txt ?></p>
            </div>
            <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
              <div class="icon"><i class="ion-ios-monitor"></i></div>
              <h4 class="title"><?php echo $t->computers ?></h4>
              <p class="description"><?php echo $t->computers_txt ?></p>
            </div>
              <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
                  <div class="icon"><i class="ion-chatbubble"></i></div>
                  <h4 class="title"><a href="https://discordapp.com/invite/KYZ5JQB"><?php echo $t->discord_server ?></a></h4>
                  <p class="description"><?php echo $t->discord_server_txt ?></p>
              </div>
          </div>
        </div>
      </section>
      <!-- #services -->
      <!--==========================
          Pub Lan de l'adept
      ============================-->
      <section id="call-to-action" class="wow fadeIn">
        <div class="container text-center">
          <img src="./img/logo-lan.png" id="logo-lan" />
          <div class="col-md-8 offset-md-2">
              <p><?php echo $t->lan_ad ?></p>
          </div>

          <a class="cta-btn" href="http://adeptinfo.ca/lan"><?php echo $t->lan_ad_cta ?></a>
        </div>
      </section>
      <!-- #call-to-action -->
      <!--==========================
         Statistiques
      ============================-->
      <section id="facts"  class="wow fadeIn">
        <div class="container">
          <header class="section-header">
            <h3><?php echo $t->about_adept ?></h3>
            <p><?php echo $t->adept_bad_joke ?>
                <br><span class="x-small"><?php echo $t->adept_disclaimer_small ?></span></p>
          </header>
          <div class="row counters">
            <div class="col-lg-3 col-6 text-center">
              <span data-toggle="counter-up">256</span>
              <p><?php echo $t->members ?></p>
            </div>
            <div class="col-lg-3 col-6 text-center">
              <span data-toggle="counter-up">31</span>
              <p><?php echo $t->years ?></p>
            </div>
            <div class="col-lg-3 col-6 text-center">
              <span data-toggle="counter-up">9</span>
              <p><?php echo $t->lans_org ?></p>
            </div>
            <div class="col-lg-3 col-6 text-center">
              <span data-toggle="counter-up">752</span>
              <p><?php echo $t->pogos_sold ?></p>
            </div>
          </div>
          <!-- <div class="facts-img">
            <img src="img/facts-img.png" alt="" class="img-fluid">
          </div> -->
        </div>
      </section>
      <!-- #facts -->
      <!--==========================
          Section Membres Conseil
      ============================-->
      <section id="team">
        <div class="container">
          <div class="section-header wow fadeInUp">
            <h3><?php echo $t->admins_members ?></h3>
            <p><?php echo $t->admins_txt ?></p>
          </div>
          <div class="row">
            <div class="col-md-2 offset-md-1 wow fadeInUp">
              <div class="member">
                <img src="img/users/<?php echo getIdByRole(1);?>.jpg" class="img-fluid" alt="">
                <div class="member-info">
                  <div class="member-info-content">
                  <h4><?php echo getInfo(getIdByRole(1), 'prenom').'<br/>'.getInfo(getIdByRole(1), 'nom'); ?></h4>
                    <span><?php echo $t->president ?></span>
                    <div class="social">
                       <a href="https://twitter.com/Mantatatai"><i class="fa fa-twitter"></i></a>
                      <!--<a href=""><i class="fa fa-facebook"></i></a> -->
                      <a href="https://github.com/HandsomeRomanian"><i class="fa fa-github"></i></a>
                      <a href="https://www.linkedin.com/in/matei-martin-30534a165/"><i class="fa fa-linkedin"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-2 wow fadeInUp" data-wow-delay="0.1s">
              <div class="member">
                <img src="img/users/<?php echo getIdByRole(2);?>.jpg" class="img-fluid" alt="">
                <div class="member-info">
                  <div class="member-info-content">
                    <h4><?php echo getInfo(getIdByRole(2), 'prenom').'<br/>'.getInfo(getIdByRole(2), 'nom'); ?></h4>
                    <span><?php echo $t->vp ?></span>
                    <div class="social">
                      <!-- <a href=""><i class="fa fa-twitter"></i></a>
                      <a href=""><i class="fa fa-facebook"></i></a> 
                      <a href="https://github.com/christopherst-pierre"><i class="fa fa-github"></i></a>
                       <a href=""><i class="fa fa-linkedin"></i></a> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-2 wow fadeInUp" data-wow-delay="0.2s">
              <div class="member">
                <img src="img/users/<?php echo getIdByRole(4);?>.jpg" class="img-fluid" alt="">
                <div class="member-info">
                  <div class="member-info-content">
                    <h4><?php echo getInfo(getIdByRole(4), 'prenom').'<br/>'.getInfo(getIdByRole(4), 'nom'); ?></h4>
                    <span><?php echo $t->ex_secretary ?></span>
                    <div class="social">
                      <!-- <a href=""><i class="fa fa-twitter"></i></a>
                      <a href=""><i class="fa fa-facebook"></i></a>
                      <a href=""><i class="fa fa-github"></i></a>
                      <a href=""><i class="fa fa-linkedin"></i></a> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-2 wow fadeInUp" data-wow-delay="0.3s">
              <div class="member">
                <img src="img/users/<?php echo getIdByRole(3);?>.jpg" class="img-fluid" alt="">
                <div class="member-info">
                  <div class="member-info-content">
                   <h4><?php echo getInfo(getIdByRole(3), 'prenom').'<br/>'.getInfo(getIdByRole(3), 'nom'); ?></h4>
                    <span><?php echo $t->in_secretary ?></span>
                    <div class="social">
                      <!-- <a href=""><i class="fa fa-twitter"></i></a>
                      <a href=""><i class="fa fa-facebook"></i></a>
                      <a href=""><i class="fa fa-github"></i></a>
                      <a href=""><i class="fa fa-linkedin"></i></a> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-2 wow fadeInUp" data-wow-delay="0.3s">
              <div class="member">
                <img src="img/users/<?php echo getIdByRole(5);?>.jpg" class="img-fluid" alt="">
                <div class="member-info">
                  <div class="member-info-content">
                    <h4><?php echo getInfo(getIdByRole(5), 'prenom').'<br/>'.getInfo(getIdByRole(5), 'nom'); ?></h4>
                    <span><?php echo $t->treasurer ?></span>
                    <div class="social">
                      <!-- <a href=""><i class="fa fa-twitter"></i></a>
                      <a href=""><i class="fa fa-facebook"></i></a>
                      <a href=""><i class="fa fa-github"></i></a>
                      <a href="https://www.linkedin.com/in/vincent-p-bb4a66105/"><i class="fa fa-linkedin"></i></a>-->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- #team -->
      <!--==========================
      Programme des membres de confiance
      ============================-->
        <section id="membres-confiance"  class="wow fadeIn">
            <div class="container">
                <header class="section-header">
                    <h3><?php echo $t->mdc ?></h3>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-7">
                            <h5 class="white"><?php echo $t->mdc_header ?></h5>
                            <p>
                              <?php echo $t->mdc_desc ?>
                            </p>
                            <a href="./membresconfiance.php?lang=<?php echo $t->lang ?>" class="btn btn btn-light"><?php echo $t->mdc_cta ?></a>
                        </div>
                        <div class="col-md-4">
                            <img src="img/membre-confiance.png">
                        </div>
                    </div>

                </header>
            </div>
        </section>
        <!-- #facts -->
      <!--==========================
          Section de contact
      ============================-->
      <section id="contact" class="section-bg wow fadeInUp">
        <div class="container">
          <div class="section-header">
            <h3><?php echo $t->contact_us ?></h3>
            <p class="font-weight-bold compact"><?php echo $t->contact_txt ?></p>
            <p class="font-italic"><?php echo $t->contact_opt ?></p>
          </div>
          <div class="row contact-info">
            <div class="col-md-4 left">
                <!--<i class="fab fa-discord large-icon discord-color"></i>-->
				<iframe src="https://discordapp.com/widget?id=362987473154080778&theme=dark" width="100%" height="390" allowtransparency="true" frameborder="0"></iframe>
              <!--================
				Bouton d'inviation discord normal
			  ====================
			  <svg class="svg-inline--fa fa-discord  large-icon discord-color" aria-hidden="true" width="50" data-icon="discord" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <path fill="currentColor" d="M297.216 243.2c0 15.616-11.52 28.416-26.112 28.416-14.336 0-26.112-12.8-26.112-28.416s11.52-28.416 26.112-28.416c14.592 0 26.112 12.8 26.112 28.416zm-119.552-28.416c-14.592 0-26.112 12.8-26.112 28.416s11.776 28.416 26.112 28.416c14.592 0 26.112-12.8 26.112-28.416.256-15.616-11.52-28.416-26.112-28.416zM448 52.736V512c-64.494-56.994-43.868-38.128-118.784-107.776l13.568 47.36H52.48C23.552 451.584 0 428.032 0 398.848V52.736C0 23.552 23.552 0 52.48 0h343.04C424.448 0 448 23.552 448 52.736zm-72.96 242.688c0-82.432-36.864-149.248-36.864-149.248-36.864-27.648-71.936-26.88-71.936-26.88l-3.584 4.096c43.52 13.312 63.744 32.512 63.744 32.512-60.811-33.329-132.244-33.335-191.232-7.424-9.472 4.352-15.104 7.424-15.104 7.424s21.248-20.224 67.328-33.536l-2.56-3.072s-35.072-.768-71.936 26.88c0 0-36.864 66.816-36.864 149.248 0 0 21.504 37.12 78.08 38.912 0 0 9.472-11.52 17.152-21.248-32.512-9.728-44.8-30.208-44.8-30.208 3.766 2.636 9.976 6.053 10.496 6.4 43.21 24.198 104.588 32.126 159.744 8.96 8.96-3.328 18.944-8.192 29.44-15.104 0 0-12.8 20.992-46.336 30.464 7.68 9.728 16.896 20.736 16.896 20.736 56.576-1.792 78.336-38.912 78.336-38.912z"></path>
              </svg>
                <h3>Discord</h3>-->
              <p><a href="https://discordapp.com/invite/KYZ5JQB" class="btn btn-primary text-white discord"><?php echo $t->join_discord ?></a></p>
            </div>


            <div class="col-md-4 center">
              <!--<i class="fab fa-facebook-messenger large-icon messenger-color"></i>-->
              <svg class="svg-inline--fa fa-facebook-messenger fa-w-14 large-icon messenger-color" aria-hidden="true" data-prefix="fab" width="50" data-icon="facebook-messenger" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                <path fill="currentColor" d="M224 32C15.9 32-77.5 278 84.6 400.6V480l75.7-42c142.2 39.8 285.4-59.9 285.4-198.7C445.8 124.8 346.5 32 224 32zm23.4 278.1L190 250.5 79.6 311.6l121.1-128.5 57.4 59.6 110.4-61.1-121.1 128.5z"></path>
              </svg>
              <h3><?php echo $t->fb_messenger ?></h3>
              <p><a href="https://www.facebook.com/ADEPTInformatique/" class="btn btn-primary text-white"><?php echo $t->send_msg ?></a></p>
            </div>


            <div class="col-md-4 right">
              <svg class="svg-inline--fa fa-discord large-icon green" aria-hidden="true"  width="50" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path fill="currentColor" d="M494.586 164.516c-4.697-3.883-111.723-89.95-135.251-108.657C337.231 38.191 299.437 0 256 0c-43.205 0-80.636 37.717-103.335 55.859-24.463 19.45-131.07 105.195-135.15 108.549A48.004 48.004 0 0 0 0 201.485V464c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V201.509a48 48 0 0 0-17.414-36.993zM464 458a6 6 0 0 1-6 6H54a6 6 0 0 1-6-6V204.347c0-1.813.816-3.526 2.226-4.665 15.87-12.814 108.793-87.554 132.364-106.293C200.755 78.88 232.398 48 256 48c23.693 0 55.857 31.369 73.41 45.389 23.573 18.741 116.503 93.493 132.366 106.316a5.99 5.99 0 0 1 2.224 4.663V458zm-31.991-187.704c4.249 5.159 3.465 12.795-1.745 16.981-28.975 23.283-59.274 47.597-70.929 56.863C336.636 362.283 299.205 400 256 400c-43.452 0-81.287-38.237-103.335-55.86-11.279-8.967-41.744-33.413-70.927-56.865-5.21-4.187-5.993-11.822-1.745-16.981l15.258-18.528c4.178-5.073 11.657-5.843 16.779-1.726 28.618 23.001 58.566 47.035 70.56 56.571C200.143 320.631 232.307 352 256 352c23.602 0 55.246-30.88 73.41-45.389 11.994-9.535 41.944-33.57 70.563-56.568 5.122-4.116 12.601-3.346 16.778 1.727l15.258 18.526z" class=""></path>
              </svg>
              <h3><?php echo $t->email ?></h3>
              <p><a href="mailto:adept.informatique.cem@gmail.com" id="emailbtn" class="btn btn-primary text-white"><?php echo $t->sendmail ?></a></p>
            </div>
          </div>
            <br>
          <div class="form">
            <form action="controller/sendForm.php" method="post" role="form" class="contactForm">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <input type="text" name="name" class="form-control" id="name" placeholder="<?php echo $t->input_name ?>" required minlength="4"/>
                  <div class="validation"></div>
                </div>
                <div class="form-group col-md-6">
                  <input type="email" class="form-control" name="email" id="email" placeholder="<?php echo $t->input_email ?>"  required/>
                  <div class="validation"></div>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="<?php echo $t->input_subject ?>" required/>
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" placeholder="<?php echo $t->input_msg ?>" required minlength="10"></textarea>
                <div class="validation"></div>
              </div>
              <div class="text-center"><button type="submit"><?php echo $t->input_send ?></button></div>
            </form>
          </div>
        </div>
      </section>
      <!-- #contact -->
    </main>
<?php
include("includes/footer.php");
?>