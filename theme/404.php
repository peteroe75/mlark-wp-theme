<?php
defined('ABSPATH') || exit;

get_header();
?>

<main class="site-main">

  <div class="mlark-wrap">

    <h1 style="font-size: 4rem; margin: 4rem 0 1rem 0;">
      404
    </h1>

    <p>
      Page not found.
    </p>

    <p>
      <a href="<?php echo esc_url(home_url('/')); ?>">
        Return Home
      </a>
    </p>

  </div>

</main>

<?php get_footer(); ?>
