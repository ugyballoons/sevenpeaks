<?php get_header(); ?>
<main id="content">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <?php the_content() ?>
<?php endwhile; endif; ?>
<!-- <?php get_template_part( 'nav', 'below' ); ?> -->
</main>
<?php get_footer(); ?>
