<footer class="content-info container-fluid" role="contentinfo">
  <div class="row imgLiquidFill imgLiquid">
    <img src="../wp-content/themes/michele/assets/img/footer-bg.png">
    <div class="col-xs-12">
      <div class="row">
        <div class="col-xs-2 col-xs-offset-3">
          <a href="/store">
            <div class="">
              <img src="../wp-content/themes/michele/assets/img/bullet-footer.png">
              <h4>
                BUY MUSIC
              </h4>
            </div>
          </a>
        </div>
        <div class="col-xs-2">
          <a href="/concerts">
            <div class="">
              <img src="../wp-content/themes/michele/assets/img/bullet-footer.png">
              <h4>
                CONCERTS
              </h4>
            </div>
          </a>
        </div>
        <div class="col-xs-2">
          <a href="/booking">
            <div class="">
              <img src="../wp-content/themes/michele/assets/img/bullet-footer.png">
              <h4>
                BOOK A SHOW
              </h4>
            </div>
          </a>
        </div>
      </div>
      <div class="row">
        Main Nav
      </div>
      <div class="row">
        Email
      </div>
      <div class="row">
        Socials
      </div>
      <div class="row">
        <div class="col-lg-12">

          <div class="row sidebar-footer">
            <?php dynamic_sidebar( 'sidebar-footer'); ?>
          </div>

          <div class="row footer-nav">
            <?php if (has_nav_menu( 'footer_navigation')) : wp_nav_menu(array( 'theme_location'=>'footer_navigation', 'menu_class' => '')); endif; ?>
          </div>

          <div id="social" class="row social-nav">
            <?php if (has_nav_menu( 'social_navigation')) : wp_nav_menu(array( 'theme_location'=>'social_navigation', 'menu_class' => '')); endif; ?>
          </div>

          <p class="credits">&copy;
            <?php echo date('Y'); ?>
            MICHELE MCLAUGHLIN. ALL RIGHTS RESERVED.
            <a href="http://12southmusic.com/" target="_blank">
              BUILT BY 12SM.
            </a>
          </p>

        </div>
      </div>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>

<!-- Begin 12SM Network Analytics <!-->
  <script type="text/javascript">
	var _gaq = _gaq || [];
  	_gaq.push(['_setAccount', 'UA-27814560-1']);
  	_gaq.push(['_setDomainName', '12southmusic.com']);
  	_gaq.push(['_setAllowLinker', true]);
  	_gaq.push(['_trackPageview']);
 	(function() {
	  	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	  	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	  	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  	})();
	</script>
  <!-- End 12SM Network Analytics <!-->
