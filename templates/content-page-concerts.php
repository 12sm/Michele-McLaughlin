<!-- /*-------- EMAIL SIGNUP --------*/ -->

<div class="max-wrap">
  <?php echo do_shortcode("[wpv-view name='email-submit']"); ?>
</div>

<!-- /*-------- CONCERTS BANNER --------*/ -->

<div class="max-wrap">
  <?php get_template_part('templates/page', 'header'); ?>
</div>

<!-- /*-------- NEXT SHOW VIEW --------*/ -->

<div class="max-wrap">
  <?php echo do_shortcode("[wpv-view name='next-concert']"); ?>
</div>

<!-- /*-------- SHOWs VIEW --------*/ -->

<div class="max-wrap">
  <?php echo do_shortcode("[wpv-view name='concerts']"); ?>
</div>

<!-- /*-------- FOOTER --------*/ -->
