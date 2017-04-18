<?php

if ( ! function_exists( 'kernix_setup' ) ) :
  /**
  * Sets up theme defaults and registers support for various WordPress features.
  *
  * Note that this function is hooked into the after_setup_theme hook, which
  * runs before the init hook. The init hook is too late for some features, such
  * as indicating support for post thumbnails.
  *
  * Create your own kernix_setup() function to override in a child theme.
  *
  * @since kernix 1.0
  */
  function kernix_setup() {
    /*
    * Make theme available for translation.
    * Translations can be filed in the /languages/ directory.
    * If you're building a theme based on kernix, use a find and replace
    * to change 'kernix' to the name of your theme in all the template files
    */
    load_theme_textdomain( 'kernix', get_template_directory() . '/languages' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
    * Let WordPress manage the document title.
    * By adding theme support, we declare that this theme does not use a
    * hard-coded <title> tag in the document head, and expect WordPress to
    * provide it for us.
    */
    add_theme_support( 'title-tag' );

    // This theme uses wp_nav_menu() in two locations.
    register_nav_menus( array(
      'primary' => __( 'Primary Menu', 'kernix' ),
      'footer-menu'  => __( 'Footer Menu', 'kernix' ),
    ) );

    /*
    * Switch default core markup for search form, comment form, and comments
    * to output valid HTML5.
    */
    add_theme_support( 'html5', array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    ) );


    add_theme_support( 'custom-logo', array(
      'height'      => 400,
      'width'       => 400,
      'flex-width' => true,
    ) );
    /*
    * Enable support for Post Formats.
    *
    * See: https://codex.wordpress.org/Post_Formats
    */
    add_theme_support( 'post-formats', array(
      'aside',
      'image',
      'video',
      'quote',
      'link',
      'gallery',
      'status',
      'audio',
      'chat',
    ) );

    // Indicate widget sidebars can use selective refresh in the Customizer.
    add_theme_support( 'customize-selective-refresh-widgets' );

    //Hide admin bar for non-admin users
    if (!current_user_can('administrator') && !is_admin()) {
      show_admin_bar(false);
    }

  }
endif; // kernix_setup
add_action( 'after_setup_theme', 'kernix_setup' );

/**
* Handles JavaScript detection.
*
* Adds a `js` class to the root `<html>` element when JavaScript is detected.
*
* @since kernix 1.0
*/
function kernix_javascript_detection() {
  echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'kernix_javascript_detection', 0 );

// Admin styles
function load_custom_wp_admin_style() {
  wp_register_style( 'custom_wp_admin_css', get_template_directory_uri() . '/css/admin-styles.css', false, null );
  wp_enqueue_style( 'custom_wp_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );

// Frontend styles
function theme_enqueue_scripts() {
  //css
  wp_enqueue_script( 'jquery' );

  if ( is_singular() && get_option( 'thread_comments' ) )
    wp_enqueue_script( 'comment-reply' );

  // Fonts
  wp_enqueue_style( 'fonts-style', 'https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,500i,700,700i,900,900i', array(), null );

  // CSS
  wp_enqueue_style( 'aos-style', get_template_directory_uri() . '/dist/vendor/aos/dist/aos.css', array(), null );
  wp_enqueue_style( 'material-design-iconic-font-style', get_template_directory_uri() . '/dist/vendor/material-design-iconic-font/dist/css/material-design-iconic-font.min.css', array(), null );
  wp_enqueue_style( 'kernix-theme-style', get_template_directory_uri() . '/dist/css/theme.min.css', array(), null );


  // HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries
  // WARNING: Respond.js doesn't work if you view the page via file://
  wp_enqueue_script('html5shiv', 'https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js', array(), '3.7.2', false);
  wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );

  wp_enqueue_script('respond', 'https://oss.maxcdn.com/respond/1.4.2/respond.min.js', array(), '1.4.2', false);
  wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );

  //JS
  wp_enqueue_script( 'bootstrap-script', get_template_directory_uri() . '/dist/vendor/bootstrap/dist/js/bootstrap.min.js', array('jquery'), null, true );
  wp_enqueue_script( 'aos-script', get_template_directory_uri() . '/dist/vendor/aos/dist/aos.js', array('jquery'), null, true );
  wp_enqueue_script( 'hammerjs-script', get_template_directory_uri() . '/dist/vendor/hammerjs/hammer.min.js', array('jquery'), null, true );
  wp_enqueue_script( 'main-script', get_template_directory_uri() . '/dist/js/main.min.js', array('jquery'), null, true );

}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_scripts' );

function clean($string) {
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}
