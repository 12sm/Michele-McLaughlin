<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>
  <div class="modal fade" id="contact-form">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <?php echo do_shortcode( "[formidable id=2]"); ?>
        </div>
      </div>
    </div>
  </div>

  <!--[if lt IE 8]>
    <div class="alert alert-warning">
      <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'roots'); ?>
    </div>
  <![endif]-->

  <?php
    do_action('get_header');
    // Use Bootstrap's navbar if enabled in config.php
    if (current_theme_supports('bootstrap-top-navbar')) {
      get_template_part('templates/header-top-navbar');
    } else {
      get_template_part('templates/header');
    }
  ?>

  <div class="see-live dont-see">
    <a href="http://michelemclaughlinmusic.12southdev.com/concerts/">
      <div>
        <h1 style="text-align: center;">
          See<br>
          Michele<br>
          Live
        </h1>
      </div>
    </a>
  </div>

  <div class="see-book dont-see">
    <a class="contact" data-target="#contact-form" data-toggle="modal">
      <div>
        <h1 style="text-align: center;">
          Book<br>
          Michele<br>
          Today
        </h1>
      </div>
    </a>
  </div>

  <div class="wrap container-fluid" role="document">
    <div class="content row">
      <main class="main <?php echo roots_main_class(); ?>" role="main">
        <?php include roots_template_path(); ?>
      </main><!-- /.main -->
      <?php if (roots_display_sidebar()) : ?>
        <aside class="sidebar <?php echo roots_sidebar_class(); ?>" role="complementary">
          <?php include roots_sidebar_path(); ?>
        </aside><!-- /.sidebar -->
      <?php endif; ?>
    </div><!-- /.content -->
  </div><!-- /.wrap -->

  <?php get_template_part('templates/footer'); ?>

</body>
</html>
