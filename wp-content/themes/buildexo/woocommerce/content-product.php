<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

global $wp_query;
$data  = \buildexo\Includes\Classes\Common::instance()->data( 'blog' )->get();
$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );
if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}

if( $layout || $layout == 'full' ) $classes[] = 'col-lg-4 col-md-4 col-sm-6'; else $classes[] = 'col-lg-4 col-md-4 col-sm-6'; 

$post_thumbnail_id = get_post_thumbnail_id($post->ID);
$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id); 

?>

<div <?php post_class( $classes ); ?>>
	<div class="products">
        <div class="product">
            <div class="product--img">
                <?php
                /**
                 * Hook: woocommerce_before_shop_loop_item.
                 *
                 * @hooked woocommerce_template_loop_product_link_open - 10
                 */
                do_action( 'woocommerce_before_shop_loop_item_title' );
            
                /**
                 * Hook: woocommerce_before_shop_loop_item_title.
                 *
                 * @hooked woocommerce_show_product_loop_sale_flash - 10
                 * @hooked woocommerce_template_loop_product_thumbnail - 10
                 */
                ?>
                
                <?php the_post_thumbnail('turner_258x232'); ?>
                
                 
                <?php do_action( 'woocommerce_before_shop_loop_item_title' );
            
                /**
                 * Hook: woocommerce_shop_loop_item_title.
                 *
                 * @hooked woocommerce_template_loop_product_title - 10
                 */
                //do_action( 'woocommerce_shop_loop_item_title' );
            
                /**
                 * Hook: woocommerce_after_shop_loop_item_title.
                 *
                 * @hooked woocommerce_template_loop_rating - 5
                 * @hooked woocommerce_template_loop_price - 10
                 */
                do_action( 'woocommerce_after_shop_loop_item_title' );
                ?>
                <div class="product--btn">
                    <a class="thm-btn thm-btn__gradient" href="<?php echo esc_url(get_the_permalink(get_the_id())); ?>"><i class="far fa-shopping-bag"></i><?php esc_html_e('Add to cart', 'buildexo'); ?></a>
                </div>	
             </div>
              
             <div class="product--holder">
                <h3 class="product--title"><a href="<?php echo esc_url(get_the_permalink(get_the_id())); ?>"><?php the_title(); ?></a></h3>
                <span class="product--price"><?php woocommerce_template_loop_price(); ?></span>
             </div>
                
                <?php
                /**
                 * Hook: woocommerce_after_shop_loop_item.
                 *
                 * @hooked woocommerce_template_loop_product_link_close - 5
                 * @hooked woocommerce_template_loop_add_to_cart - 10
                 */
                do_action( 'woocommerce_after_shop_loop_item_title' );
                ?>
        </div>
	</div>
</div>