<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage KERNIX
 * @since 1.0
 * @version 1.0
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>  class="no-js">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">

  <!-- Styles -->
  <?php wp_head();?>

  <!-- Favicon -->
  <?php get_template_part('template-parts/header/favicon'); ?>
</head>
<body <?php body_class(); ?>>

  <header class="header-wrap">
    <div class="container">
      <?php $custom_logo_id = get_theme_mod( 'custom_logo' );
      $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' ); ?>
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
        <img src="<?php echo esc_url( $logo[0] ); ?>" alt="<?php bloginfo('name'); ?>" />
      </a>
      <nav class="main-nav">
      <?php
        wp_nav_menu( array(
          'theme_location' => 'primary',
          'menu_class'     => 'list-unstyled list-inline',
          'container' => false
        ) );
      ?>
      </nav>
    </div>
  </header>
