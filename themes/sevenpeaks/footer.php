</div> <!-- end of wrapper -->

<footer id="footer">
<div class="sp-footer__inner">
  <div class="sp-footer__brand">
    <a class="sp-footer__logo" href="<?php echo site_url(); ?>">
      <?php if (get_theme_mod('theme_logo')): ?>
        <img src="<?php echo get_theme_mod('theme_logo'); ?>" alt="7 Peaks Powder Coating">
      <?php else: ?>
        <img src="<?php echo get_stylesheet_directory_uri() . '/img/logo.svg'; ?>" alt="7 Peaks Powder Coating">
      <?php endif; ?>
    </a>
    <p class="sp-footer__motto">&ldquo;No job too big, No job too small&rdquo;</p>
  </div>

  <div class="sp-footer__col">
    <h4>Services</h4>
    <?php wp_nav_menu( array( 'theme_location' => 'footer-services' ) ); ?>
  </div>

  <div class="sp-footer__col">
    <h4>Company</h4>
    <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
  </div>

  <div class="sp-footer__col">
    <h4>Visit</h4>
    <ul>
      <li>23B Orgreave Crescent</li>
      <li>Handsworth, Sheffield S13 9NQ</li>
      <li><a href="tel:01144784780">0114 478 4780</a></li>
      <li><a href="mailto:sales@7peaks.co.uk">sales@7peaks.co.uk</a></li>
    </ul>
  </div>
</div>

<div class="sp-footer__bar">
  <span>&copy; <?php echo date('Y'); ?> 7 Peaks Powder Coating Ltd</span>
  <span>Powder coating specialists &middot; Sheffield</span>
</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
