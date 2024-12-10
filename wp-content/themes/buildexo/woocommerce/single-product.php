<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.6.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
get_header( 'shop' );
$data    = \buildexo\Includes\Classes\Common::instance()->data( 'single' )->get();

$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );
if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}
$class = ( !$layout || $layout == 'full' ) ? 'col-lg-12 col-sm-12 col-md-12' : 'col-sm-12 col-md-12 col-lg-12';

if ( class_exists( '\Elementor\Plugin' ) && $data->get( 'tpl-type' ) == 'e') {
	
	while(have_posts()) {
	   the_post();
	   the_content();
    }

} else {
?>

<?php if ( class_exists( '\Elementor\Plugin' )):?>
	<?php do_action( 'turner_banner', $data );?>
<?php else:?>
<!-- breadcrumb start -->
<section class="breadcrumb bg_img d-flex align-items-center" data-overlay="dark-2" data-opacity="8" data-background="<?php echo esc_url( $data->get( 'banner' ) ); ?>">
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

<!-- shop single start -->
<section class="shop-single-section pt-120 pb-160">
    <div class="container">
        <div class="row">	            
            <!-- sidebar area -->
            <?php
                if ( $data->get( 'layout' ) == 'left' ) {
                    do_action( 'turner_sidebar', $data );
                    
                    /**
                     * woocommerce_sidebar hook
                     *
                     * @hooked woocommerce_get_sidebar - 10
                     */
                    do_action( 'woocommerce_sidebar' );
                }
            ?>                
            <div class="<?php echo esc_attr($class);?>">
                <?php
                    /**
                     * woocommerce_before_main_content hook
                     *
                     * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
                     * @hooked woocommerce_breadcrumb - 20
                     */
                    do_action( 'woocommerce_before_main_content' );
                ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php wc_get_template_part( 'content', 'single-product' ); ?>
                    <?php endwhile; // end of the loop. ?>
                <?php
                    /**
                     * woocommerce_after_main_content hook
                     *
                     * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
                     */
                    do_action( 'woocommerce_after_main_content' );
                ?>                    
            </div>            
            <!-- sidebar area -->
            
			<?php
            //   if ( $data->get( 'layout' ) == 'right' ) {
            //        do_action( 'turner_sidebar', $data );
                    
                    /**
                     * woocommerce_sidebar hook
                     *
                     * @hooked woocommerce_get_sidebar - 10
                     */
            //        do_action( 'woocommerce_sidebar' );
            //    }
            ?>
			
        </div>
	</div>
</section>
<?php
}
get_footer( 'shop' );
