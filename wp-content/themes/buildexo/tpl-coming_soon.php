<?php
/* Template Name: Coming Soon Page */
/**
 * @package TURNER
 * @author  Themexriver
 * @version 1.0
 */
?>
<?php 

get_header('coming-soon') ;

while (have_posts()): the_post();
     the_content(); 
endwhile; 

get_footer('coming-soon') ; 

?>
