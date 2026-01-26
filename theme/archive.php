<?php get_header(); ?>

<main id="content">

  <header class="archive-header">
    <?php
    if (is_archive()) {
      the_archive_title('<h1>', '</h1>');
      the_archive_description('<p>', '</p>');
    }
    ?>
  </header>

  <section class="archive-list">

    <?php
    if (have_posts()) {
      while (have_posts()) {
        the_post();
        ?>
        
        <article <?php post_class('archive-item'); ?>>
          <h2>
            <a href="<?php the_permalink(); ?>">
              <?php the_title(); ?>
            </a>
          </h2>
        </article>

        <?php
      }
    } else {
      ?>
      <p>No posts found.</p>
      <?php
    }
    ?>

  </section>

  <nav class="archive-pagination">
    <?php the_posts_pagination(); ?>
  </nav>

</main>

<?php get_footer(); ?>
