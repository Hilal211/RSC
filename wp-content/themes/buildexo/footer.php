<?php
/**
 * Footer Main File.
 *
 * @package TURNER
 * @author  The Genious
 * @version 1.0
 */
global $wp_query;
$options = turner_WSH()->option(); 
$page_id = ( $wp_query->is_posts_page ) ? $wp_query->queried_object->ID : get_the_ID();
$layout_switcher = $options->get( 'layout_switcher' );
?>
	
    </main>
    
    <div class="clearfix"></div>
    <?php turner_template_load( 'templates/footer/footer.php', compact( 'page_id' ) );?>    
</div>
<!--End Page Wrapper-->

<!-- ScrollToTop Start -->
<div class="progress-wrap active-progress">
	<svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
	<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919px, 307.919px; stroke-dashoffset: 228.265px;"></path>
	</svg>
</div>
<!-- ScrollToTop End -->

<?php wp_footer(); ?>
</body>
</html>
