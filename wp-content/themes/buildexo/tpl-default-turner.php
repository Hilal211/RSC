<?php 
/* Template Name: Home Turner Page */ 
/**
 * @package TURNER
 * @author  TheGenious
 * @version 1.0
 */
?>
<?php 
get_header();
?>
<?php while ( have_posts() ): the_post(); ?>
	<?php the_content(); ?>
<?php endwhile; ?>
<?php get_footer(); ?>
