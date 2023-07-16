<?php get_header(); ?>
<main class="wrap">
  <section class="content-area content-thin">
    <?php
        $rest_countries = get_field('ikonic_content', 'option');
        echo do_shortcode($rest_countries);
    ?>
  </section><?php get_sidebar(); ?>
</main>
<?php get_footer(); ?>
