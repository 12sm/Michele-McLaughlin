<!-- /*-------- HEADER --------*/ -->

<!-- /*-------- EMAIL SIGNUP --------*/ -->

<?php echo do_shortcode("[wpv-view name='email-submit']"); ?>

<!-- /*-------- CONCERTS BANNER --------*/ -->

<?php get_template_part('templates/page', 'header'); ?>

<!-- /*-------- NEXT SHOW VIEW --------*/ -->

<div class="row bg-image-div">
  <div class="col-sm-6 bg-div">
    Single Bands In Town Embed
  </div>
</div>

<!-- /*-------- SHOWs VIEW --------*/ -->

<div class="row" id="concerts">
  <?php echo do_shortcode("[wpv-view name='concerts']"); ?>
</div>

<!-- /*-------- FOOTER --------*/ -->
