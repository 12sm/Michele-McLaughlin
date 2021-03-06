<header class="banner navbar navbar-default navbar-static-top" role="banner">
  <div class="container" id="head">
    <div class="navbar-header row">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo home_url(); ?>/"><img src="/wp-content/themes/michele/assets/img/nav-logo.png"></a>
    </div>

    <nav class="collapse navbar-collapse" role="navigation">
      <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'contact nav navbar-nav'));
        endif;
      ?>
      <ul class="nav navbar-nav no-marg">
        <li>
          <a class="contact" data-target="#contact-form" data-toggle="modal">Contact</a>
        </li>
      </ul>
    </nav>
  </div>
</header>
