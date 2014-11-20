<!-- /*-------- EMAIL SIGNUP --------*/ -->

<div class="max-wrap">
  <?php echo do_shortcode("[wpv-view name='email-submit']"); ?>
</div>

<!-- /*-------- LISTEN BANNER --------*/ -->

<div class="max-wrap">
  <?php get_template_part('templates/page', 'header'); ?>
</div>

<!-- /*-------- ALBUM VIEW --------*/ -->
<div class="max-wrap">
  <?php echo do_shortcode("[wpv-view name='music']"); ?>
</div>

<div class="max-wrap">
  <h2>More Albums</h2>
  <?php echo do_shortcode("[wpv-view name='Music-Carousel']"); ?>
</div>
