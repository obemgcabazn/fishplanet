<?php get_header(); ?>

<div class="breadcrumbs-wrapper">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <br>
        <?php if ( !is_front_page() && function_exists('yoast_breadcrumb') ) {
          yoast_breadcrumb('<p id="breadcrumbs" class="text-center">','</p>');
        } ?>
        <br>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row justify-content-md-center">
    <?php if ( is_cart() ){ ?>
      <div class="col-12 col-lg-8">
    <?php } else { ?>
      <div class="col-12">
    <?php } ?>


      <?php
      if (have_posts()):
          while (have_posts()): the_post();

              the_content();

          endwhile;
      endif;
      ?>

    </div>
  </div><!-- row -->
</div> <!-- container -->


<?php get_footer(); ?>