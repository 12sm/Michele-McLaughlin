<footer class="content-info container-fluid" role="contentinfo">
  <div class="row imgLiquidFill imgLiquid">
    <img src="../wp-content/themes/michele/assets/img/footer-bg.png">
    <div class="col-xs-12">

      <div class="mini-foot row">
        <div class="col-xs-12">
          <ul id="foot-mini">
            <li class="bullet">
              <a href="/store">
                <img src="../wp-content/themes/michele/assets/img/bullet-footer.png">
                <h4>
                  BUY MUSIC
                </h4>
              </a>
            </li>
            <li class="bullet">
              <a href="/concerts">
                <img src="../wp-content/themes/michele/assets/img/bullet-footer.png">
                <h4>
                  CONCERTS
                </h4>
              </a>
            </li>
            <li class="bullet">
              <a href="/booking">
                <img src="../wp-content/themes/michele/assets/img/bullet-footer.png">
                <h4>
                  BOOK A SHOW
                </h4>
              </a>
            </li>
          </ul>
        </div>
      </div>

      <div class="main-foot row">
        <div class="col-xs-12">
          <ul id="foot-main">
            <li>
              <a href="/listen">
                <h3>
                  LISTEN
                </h3>
              </a>
            </li>
            <li>
              <a href="/concerts">
                <h3>
                  CONCERTS
                </h3>
              </a>
            </li>
            <li>
              <a href="/store">
                <h3>
                  STORE
                </h3>
              </a>
            </li>
            <li>
              <a href="/awards-and-credits">
                <h3>
                  AWARDS & CREDITS
                </h3>
              </a>
            </li>
            <li>
              <a href="/about">
                <h3>
                  ABOUT
                </h3>
              </a>
            </li>
            <li>
              <a class="contact" data-target="#contact-form" data-toggle="modal">
                <h3>
                  CONTACT
                </h3>
              </a>
            </li>
          </ul>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-12">
          <form action="http://newsletter.michelemclaughlin.com/t/d/s/xdif/" method="post">
            <div class="row">
              <div class="flights">
                <button type="submit"><i class="fa fa-caret-right"></i></button>
              </div>
              <div class="flights">
                <input size="30" id="fieldEmail" name="cm-xdif-xdif" type="email" placeholder="email address" required />
              </div>
              <div class="flights">
                <input size="20" id="fieldName" name="cm-name" type="text" placeholder="name" required />
              </div>
              <h3 id="joint">
                JOIN THE MAILING LIST:
              </h3>
            </div>
          </form>
        </div>
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
