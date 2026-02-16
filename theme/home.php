<?php get_header(); ?>

<main class="blog-home">

  <div class="mlark-wrap">

    <?php
    // Get the ID of the assigned Posts page
    $posts_page_id = get_option('page_for_posts');

    if ($posts_page_id) {
      $posts_page = get_post($posts_page_id);

      if ($posts_page) {
        echo '<div class="blog-intro">';
        echo apply_filters('the_content', $posts_page->post_content);
        echo '</div>';
      }
    }
    ?>

    <section class="blog-posts">

      <?php if (have_posts()) : ?>

        <div class="blog-grid">

          <?php while (have_posts()) : the_post(); ?>

            <article class="blog-card">

              <a href="<?php the_permalink(); ?>" class="blog-card-inner">

                <?php if (has_post_thumbnail()) : ?>
                  <div class="blog-card-image">
                    <?php the_post_thumbnail('medium_large'); ?>
                  </div>
                <?php endif; ?>

                <div class="blog-card-content">
                  <h2 class="blog-card-title">
                    <?php the_title(); ?>
                  </h2>

                  <div class="blog-card-date">
                    <?php echo get_the_date(); ?>
                  </div>

                  <div class="blog-card-excerpt">
                    <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                  </div>
                </div>

              </a>

            </article>

          <?php endwhile; ?>

        </div>

        <div class="blog-pagination">
          <?php the_posts_pagination(); ?>
        </div>

      <?php else : ?>

        <p>No posts found.</p>

      <?php endif; ?>

    </section>

  </div>

</main>

<?php get_footer(); ?>
