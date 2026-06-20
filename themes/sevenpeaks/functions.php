<?php

require get_template_directory() . '/inc/customizer.php';

add_action( 'after_setup_theme', 'sevenpeaks_setup' );
function sevenpeaks_setup() {
  load_theme_textdomain( 'sevenpeaks', get_template_directory() . '/languages' );
  // global $content_width;
  // if ( ! isset( $content_width ) ) { $content_width = 1920; }
  register_nav_menus( ['main-menu' => esc_html__( 'Main Menu', 'sevenpeaks' )] );
}

add_theme_support('title-tag');
add_theme_support('post-thumbnails');
add_post_type_support( 'page', 'excerpt' );

add_action( 'wp_enqueue_scripts', 'sevenpeaks_load_scripts' );
function sevenpeaks_load_scripts() {
    wp_enqueue_style( 'sevenpeaks-style', get_stylesheet_uri(), array(), time());
    wp_enqueue_style( 'wp-google-fonts', 'https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500&display=swap', false );

    wp_enqueue_script( 'mainjs', get_stylesheet_directory_uri()."/js/main.js", array('jquery'), false, true );
}

add_filter( 'document_title_separator', 'sevenpeaks_document_title_separator' );
function sevenpeaks_document_title_separator( $sep ) {
  $sep = '|';
  return $sep;
}

add_filter( 'the_title', 'sevenpeaks_title' );
function sevenpeaks_title( $title ) {
  if ( $title == '' ) {
    return '...';
  } else {
    return $title;
  }
}

add_filter( 'the_content_more_link', 'sevenpeaks_read_more_link' );
function sevenpeaks_read_more_link() {
  if ( ! is_admin() ) {
    return ' <a href="' . esc_url( get_permalink() ) . '" class="more-link">...</a>';
  }
}

add_filter( 'excerpt_more', 'sevenpeaks_excerpt_read_more_link' );
function sevenpeaks_excerpt_read_more_link( $more ) {
  if ( ! is_admin() ) {
    global $post;
  return ' <a href="' . esc_url( get_permalink( $post->ID ) ) . '" class="more-link">...</a>';
  }
}


add_action( 'widgets_init', 'sevenpeaks_widgets_init' );
function sevenpeaks_widgets_init() {
  register_sidebar( array(
    'name' => esc_html__( 'Widget Area', 'sevenpeaks' ),
    'id' => 'primary-widget-area',
    'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
    'after_widget' => '</li>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ) );
}


// REMOVE WP EMOJI
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );


?>
