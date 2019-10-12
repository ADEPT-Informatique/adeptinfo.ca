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
                <li><i class="ion-ios-arrow-right"></i> <a href="#about" class="btn-get-started scrollto"><?php echo $t->footer->about ?></a></li>
                <li><i class="ion-ios-arrow-right"></i> <a href="#services" class="btn-get-started scrollto"><?php echo $t->footer->services ?></a></li>
                <li><i class="ion-ios-arrow-right"></i> <a href="https://adept-informatique.github.io/Charte/" class="btn-get-started scrollto"><?php echo $t->footer->charter ?></a></li>
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
    <!-- #footer -->
    <!-- Bouton retourner en haut <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a> -->
    <!-- JavaScript Libraries -->
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/jquery-migrate/dist/jquery-migrate.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="node_modules/jquery.easing/jquery.easing.min.js"></script>
    <script src="node_modules/superfish/dist/js/hoverIntent.js"></script>
    <script src="node_modules/superfish/dist/js/superfish.min.js"></script>
    <script src="node_modules/wow.js/dist/wow.min.js"></script>
    <script src="node_modules/waypoints/lib/jquery.waypoints.min.js"></script>
    <script src="node_modules/counterup/jquery.counterup.min.js"></script>
    <script src="node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="node_modules/isotope-layout/dist/isotope.pkgd.min.js"></script>
    <script src="node_modules/lightbox2/dist/js/lightbox.min.js"></script>
    <script src="node_modules/jquery-touchswipe/jquery.touchSwipe.min.js"></script>
    <script src="js/konami.js?v=1.1"></script>
    <!-- Template Main Javascript File -->
    <script src="js/main.js"></script>
  </body>
</html>