<?php get_header(); ?>

<main id="content">
<div class="mlark-wrap">
  <?php
  while (have_posts()) {
    the_post();
    ?>

    <article <?php post_class(); ?>>
      <?php the_content(); ?>
    </article>

    <?php
  }
  ?>
</div>
</main>

<?php get_footer(); ?>
