<footer class="content-info container-fluid" role="contentinfo">
  <div class="row imgLiquidFill imgLiquid">
    <img src="/wp-content/themes/michele/assets/img/footer-bg.png">
    <div class="col-xs-12">

      <div class="mini-foot row">
        <div class="col-xs-12">
          <ul id="foot-mini">
            <li class="bullet">
              <a href="/store">
                <img src="/wp-content/themes/michele/assets/img/bullet-footer.png">
                <h4>
                  BUY MUSIC
                </h4>
              </a>
            </li>
            <li class="bullet">
              <a href="/concerts">
                <img src="/wp-content/themes/michele/assets/img/bullet-footer.png">
                <h4>
                  CONCERTS
                </h4>
              </a>
            </li>
            <li class="bullet">
              <a href="/booking">
                <img src="/wp-content/themes/michele/assets/img/bullet-footer.png">
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
              <a href="/albums">
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

      <div class="row emails">
        <div class="col-md-12 col-lg-12">
          <form action="http://newsletter.michelemclaughlin.com/t/d/s/xdif/" method="post">
            <div class="row formosa">
              <div class="flight">
                <h3 id="join">
                JOIN THE MAILING LIST:
              </h3>
                <input size="20" id="fieldName" name="cm-name" type="text" placeholder="name" required />
              </div>
              <div class="flight">
                <input size="30" id="fieldEmail" name="cm-xdif-xdif" type="email" placeholder="email address" required />
              </div>
              <div class="flight">
                <button type="submit"><i class="fa fa-caret-right"></i></button>
              </div>

            </div>
          </form>
        </div>
      </div>

      <div class="socials-foot row">
        <div class="col-xs-12">
          <ul id="foot-socials">
            <li>
              <a href="https://www.facebook.com/michelemclaughlinmusic" target="_blank">
                <i class="fa fa-facebook-square"></i>
              </a>
            </li>
            <li>
              <a href="https://twitter.com/michelemclaughl" target="_blank">
                <i class="fa fa-twitter-square"></i>
              </a>
            </li>
            <li>
              <a href="https://plus.google.com/+MicheleMcLaughlinmusic/posts" target="_blank">
                <i class="fa fa-google-plus-square"></i>
              </a>
            </li>
            <li>
              <a href="https://www.linkedin.com/profile/view?id=11168700" target="_blank">
                <i class="fa fa-linkedin-square"></i>
              </a>
            </li>
            <li>
              <a href="http://instagram.com/michelemclaughlin" target="_blank">
                <i class="fa fa-instagram"></i>
              </a>
            </li>
            <li>
              <a href="https://www.youtube.com/user/nali22btm" target="_blank">
                <i class="fa fa-youtube-square"></i>
              </a>
            </li>
          </ul>
        </div>
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

<script>
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-5080950-3']);
_gaq.push(['_trackPageview']);
(function() {
var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
</script>
<!--Michelle GA <!-->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-27814560-47', 'auto');
  ga('send', 'pageview');

</script>