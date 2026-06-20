<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta name="description" content="">
<meta charset="<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="wrapper" class="hfeed">
  <header>
    <div class="site-title">
      <a class="logo" href="<?php echo site_url(); ?>" class="home-link">
      <?php if (get_theme_mod('theme_logo')): ?>

        <img
          class="logo-image"
          src="<?php echo get_theme_mod('theme_logo') ?>">

      <?php endif; ?>
      </a>

      <div class="business-details">
        <div class="phone-text">call us for a quote:</div>
        <a class="phone-number" href="tel:<?php echo get_theme_mod('business_phone','0114 0000 000') ?>">
          <img src="<?php echo get_stylesheet_directory_uri(). "/img/phone.svg" ?>" alt="phone">
          <?php echo get_theme_mod('business_phone','0114 0000 000') ?>
        </a>
        <a href="mailto:<?php echo get_theme_mod('business_email') ?>" class="email">
          <?php echo get_theme_mod('business_email') ?>
        </a>
      </div>

      <div class="menu-button">
          <div class="menu-slice one"></div>
          <div class="menu-slice two"></div>
          <div class="menu-slice tre"></div>
        </div>
    </div>
    <?php get_template_part( "menu" ) ?>
  </header>
