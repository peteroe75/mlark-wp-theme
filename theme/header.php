<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>

<!---PUT HEADER CODE HERE --->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300;400;500;600;700&display=swap">

</head>
<body <?php body_class(); ?>>

<header class="site-header">
<div class="mlark-wrap">
        <?php if (function_exists('meadowlark_component_by_role')) {
    echo meadowlark_component_by_role('header'); }
?>
         </div>
</header>
