<!-- /*-------- EMAIL SIGNUP --------*/ -->

<div class="max-wrap">
  <?php echo do_shortcode("[wpv-view name='email-submit']"); ?>
</div>

<!-- /*-------- CONCERTS BANNER --------*/ -->

<?php get_template_part('templates/page', 'header'); ?>

<!-- /*-------- NEXT SHOW VIEW --------*/ -->

<?php echo do_shortcode("[wpv-view name='next-concert']"); ?>

<!-- /*-------- SHOWs VIEW --------*/ -->

<?php echo do_shortcode("[wpv-view name='concerts']"); ?>

<!-- /*-------- FOOTER --------*/ -->
