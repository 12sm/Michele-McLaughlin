<?php while (have_posts()) : the_post(); ?>
  <?php the_content(); ?>
  <?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>
<?php endwhile; ?>

<!-- /*-------- HEADER --------*/ -->

<!-- /*-------- EMAIL SIGNUP --------*/ -->

<div class="row text-right">
  Email Signup
</div>

<!-- /*-------- HOME SLIDER VIEW --------*/ -->

<div class="row">
  SLider
</div>

<div class="row">
  Mini Nav
</div>

<?php echo do_shortcode( "[wpv-view name='home-bio']"); ?>

<!-- /*-------- HOME BIO VIEW --------*/ -->

<div class="row">
  <div class="col-sm-6 home-player">
    Featured Track
  </div>
  <div class="col-sm-6 home-bio">
    <div class="row">
      Excerpt Title
    </div>
    <div class="row">
      Excerpt
    </div>
    <div class="row">
      Link To Bio Page
    </div>
  </div>
</div>

<!-- /*-------- FOOTER --------*/ -->
