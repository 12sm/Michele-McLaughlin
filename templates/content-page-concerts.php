<!-- /*-------- HEADER --------*/ -->

<!-- /*-------- EMAIL SIGNUP --------*/ -->

<div class="row text-right">
  Email Signup
</div>

<!-- /*-------- CONCERTS BANNER --------*/ -->

<?php get_template_part('templates/page', 'header'); ?>

<!-- /*-------- NEXT SHOW VIEW --------*/ -->

<div class="row bg-image-div">
  <div class="col-sm-6 bg-div">
    Single Bands In Town Embed
  </div>
</div>

<!-- /*-------- SHOWs VIEW --------*/ -->

<div class="row bg-div">
  <?php echo do_shortcode("[wpv-view name='concerts']"); ?>
</div>

<!-- /*-------- FOOTER --------*/ -->
