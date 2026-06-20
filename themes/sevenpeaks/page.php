<?php get_header(); ?>
<main id="content">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <h2 class="page-title">
    <?php the_title() ?>
  </h2>
  <?php the_content() ?>
<?php endwhile; endif; ?>
<?php $contact_block = get_page_by_title( 'Map & Contact', OBJECT, 'wp_block' );
      echo apply_filters('the_content', $contact_block->post_content);
?>
</main>
<?php get_footer(); ?>
