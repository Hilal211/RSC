<?php
/**
 * Sidebar Template
 *
 * @package    WordPress
 * @subpackage TURNER
 * @author     TheGenious
 * @version    1.0
 */

if ( class_exists( '\Elementor\Plugin' ) AND $data->get( 'sidebar_type' ) == 'e' AND $data->get( 'sidebar_elementor' ) ) {
	?>

	<!-- Sidebar Side -->
    <div class="col-lg-4">
    	<div class="sidebar-area">
			<?php
            echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $data->get( 'sidebar_elementor' ) );
            ?>
        </div>
	</div>

	<?php
	return false;
} else {
	$options = $data->get( 'sidebar' );
}

?>
<?php if ( is_active_sidebar( 'blog-sidebar' ) ) : ?>

	<!-- Sidebar Side -->
    <div class="col-lg-4">
    	<div class="sidebar-area">
			<?php dynamic_sidebar( 'blog-sidebar' ); ?>
        </div>
	</div>

<?php endif; ?>
