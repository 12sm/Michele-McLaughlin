<!-- /*-------- HEADER --------*/ -->

<!-- /*-------- EMAIL SIGNUP --------*/ -->

<div class="row text-right">
  Email Signup
</div>

<!-- /*-------- AWARDS BANNER --------*/ -->

<?php get_template_part('templates/page', 'header'); ?>

<!-- /*-------- ALBUM AWARDS VIEW --------*/ -->

[wpv-loop-start]
  <div class="row">
    Album Title
  </div>
  <div class="row">
    <div class="col-sm-6">
      <div class="bg-div">
        Album Art
      </div>
    </div>
    <div class="col-sm-6">
      <div class="row">
        [wpv-loop-start]
          <div class="col-xs-12">
            Featured Award
          </div>
        [wpv-loop-end]
        [wpv-loop-start]
          <div class="col-xs-12">
            Award
          </div>
        [wpv-loop-end]
      </div>
    </div>
  </div>
[wpv-loop-end]

<!-- /*-------- FOOTER --------*/ -->
