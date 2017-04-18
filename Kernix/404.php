<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage KERNIX
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="error-wrap">
  <div class="container">
    <h2>404</h2>
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Back to Home</a>
  </div>
</div>

<?php get_footer();
