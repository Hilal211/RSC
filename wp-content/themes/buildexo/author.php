<?php
/**
 * Blog Main File.
 *
 * @package TURNER
 * @author  The Genious
 * @version 1.0
 */
get_header();
global $wp_query;
$data  = \buildexo\Includes\Classes\Common::instance()->data( 'author' )->get();
$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );
$layout = ( $layout ) ? $layout : 'right';
$sidebar = ( $sidebar ) ? $sidebar : 'default-sidebar';
if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}
$class = ( !$layout || $layout == 'full' ) ? 'col-lg-12 col-md-12 col-sm-12' : 'col-lg-8 col-md-12 col-sm-12';
if ( class_exists( '\Elementor\Plugin' ) AND $data->get( 'tpl-type' ) == 'e' AND $data->get( 'tpl-elementor' ) ) {
	echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $data->get( 'tpl-elementor' ) );
} else {
?>

<?php if ( $data->get( 'enable_banner' ) ) : ?>
	<?php do_action( 'turner_banner', $data );?>
<?php else:?>

<!-- breadcrumb start -->
<section class="breadcrumb bg_img d-flex align-items-center" data-overlay="dark-2" data-opacity="8" data-background="<?php echo esc_url( $data->get( 'author_page_banner' ) ); ?>">
    <div class="container">
        <div class="breadcrumb__content text-center">
            <h2><?php if( $data->get( 'title' ) ) echo wp_kses( $data->get( 'title' ), true ); else( wp_title( '' ) ); ?></h2>
            <ul class="bread-crumb clearfix ul_li_center">
                <?php echo turner_the_breadcrumb(); ?>
            </ul>
        </div>
    </div>
</section>
<!-- breadcrumb end -->

<?php endif;?>

<!-- Sidebar Page Container -->
<section class="blog pt-120 pb-120">
    <div class="container">
        <div class="row">

			<?php
				if ( $data->get( 'layout' ) == 'left' ) {
					do_action( 'turner_sidebar', $data );
				}
            ?>
            <div class="content-side <?php echo esc_attr( $class ); ?>">
                <div class="blog__post-wrap">
                    <div class="thm-unit-test">
                        <?php
                            while ( have_posts() ) :
                                the_post();
                                turner_template_load( 'templates/blog/blog.php', compact( 'data' ) );
                            endwhile;
                            wp_reset_postdata();
                        ?>
                    </div>
                    <!--Pagination-->
                    <div class="styled-pagination pagination_wrap pt-50">
                        <?php turner_the_pagination( $wp_query->max_num_pages );?>
                    </div>
                </div>
            </div>
            <?php
                if ( $data->get( 'layout' ) == 'right' ) {
                    do_action( 'turner_sidebar', $data );
                }
            ?>
        </div>
    </div>
</section>
<!--End blog area-->
	<?php
}
get_footer();
