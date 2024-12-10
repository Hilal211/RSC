<?php
/**
 * Footer Template  File
 *
 * @package TURNER
 * @author  ThemeXriver
 * @version 1.0
 */
$options = turner_WSH()->option();

$footer_bg_img_v3 = $options->get( 'footer_bg_img_v3' );
$footer_bg_img_v3 = turner_set( $footer_bg_img_v3, 'url', TURNER_URI . '' );

$allowed_html = wp_kses_allowed_html( 'post' );
?>
	
    <!-- footer start -->
    <footer class="site-footer footer-style-three pt-105 bg_img" data-background="<?php echo esc_url($footer_bg_img_v3); ?>">
        <div class="container">
            <div class="row pb-90">

                <?php if ( is_active_sidebar( 'footer-sidebar-6-1' ) ) { ?>
                <div class="col-lg-4 col-md-6">
                    <?php dynamic_sidebar('footer-sidebar-6-1');?>
                </div>
                <?php } ?>
                <?php if ( is_active_sidebar( 'footer-sidebar-6-2' ) ) { ?>
                    <div class="col-lg-2 col-md-6">
                        <?php dynamic_sidebar('footer-sidebar-6-2');?>
                    </div>
                <?php } ?>
                <?php if ( is_active_sidebar( 'footer-sidebar-6-3' ) ) { ?>
                <div class="col-lg-2 col-md-6">
                    <?php dynamic_sidebar('footer-sidebar-6-3');?>
                </div>
                <?php } ?>
                <?php if ( is_active_sidebar( 'footer-sidebar-6-4' ) ) { ?>
                    <div class="col-lg-4 col-md-6">
                        <?php dynamic_sidebar('footer-sidebar-6-4');?>
                    </div>
                <?php } ?>
            </div>
            <?php if( $options->get( 'copyright_text3') ) { ?>
            <div class="footer-copyright">
                <?php echo wp_kses( $options->get( 'copyright_text3'), true ); ?>
            </div>
            <?php } ?>
        </div>
    </footer>
    <!-- footer end -->

