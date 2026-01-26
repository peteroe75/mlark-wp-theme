<?php get_header(); ?>

<main id="content">

  <?php
  if (have_posts()) {
    while (have_posts()) {
      the_post();
      ?>
      
      <article <?php post_class(); ?>>
        <?php the_content(); ?>
      </article>

      <?php
    }
  } else {
    ?>
    <p>No content found.</p>
    <?php
  }
  ?>

</main>

<?php get_footer(); ?>
