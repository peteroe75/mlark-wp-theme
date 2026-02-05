<?php get_header(); ?>

<main id="content">
<div class="mlark-wrap">


        <?php
  while (have_posts()) {
    the_post();
    the_content();
  }
  ?>
        </div>
</main>

<?php get_footer(); ?>
