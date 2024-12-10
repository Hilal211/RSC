<?php
/**
 * Footer Template  File
 *
 * @package TURNER
 * @author  ThemeXriver
 * @version 1.0
 */

$options = turner_WSH()->option();
$footer_bg_img_v2 = $options->get( 'footer_bg_img_v2' );
$footer_bg_img_v2 = turner_set( $footer_bg_img_v2, 'url', TURNER_URI . '' );

$footer_cta_bg_img_v2 = $options->get( 'footer_cta_bg_img_v2' );
$footer_cta_bg_img_v2 = turner_set( $footer_cta_bg_img_v2, 'url', TURNER_URI . '' );

$allowed_html = wp_kses_allowed_html( 'post' );
?>
	
    <!-- footer start -->
    <footer class="site-footer footer-style-two bg_img" data-background="<?php echo esc_url($footer_bg_img_v2); ?>">
        <div class="container">
            <?php if( $footer_cta_bg_img_v2 || $options->get( 'footer_newsletter_text_v2') || $options->get( 'footer_btn_title_v2')) :?>
            <div class="footer-cta bg_img" data-background="<?php echo esc_url($footer_cta_bg_img_v2); ?>">
                <div class="footer-cta__inner ul_li_between">
                    <?php if( $options->get( 'footer_newsletter_text_v2') ) :?><h3 class="footer-cta__title"><?php echo wp_kses( $options->get( 'footer_newsletter_text_v2'), true ); ?></h3><?php endif; ?>
                    <?php if( $options->get( 'footer_btn_title_v2') ) :?>
                    <a class="thm-btn thm-btn--2 thm-btn--2--black" href="<?php echo esc_url( $options->get( 'footer_btn_link_v2')); ?>"><?php echo wp_kses( $options->get( 'footer_btn_title_v2'), true ); ?></a>
                    <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>
            
            <?php if ( is_active_sidebar( 'footer-sidebar-5' ) ) { ?>
                <div class="footer__main pt-85 pb-65">
                    <div class="row mt-none-30">
                        <?php dynamic_sidebar('footer-sidebar-5');?>   
                    </div>
                </div>
            <?php } ?>
        </div>
        <?php if( $options->get( 'copyright_text2') ) :?>
        <div class="footer__copyright-wrap">
            <div class="container">
                <div class="footer__copyright-text text-center">
                    <?php echo wp_kses( $options->get( 'copyright_text2'), true ); ?> 
                </div>
            </div>
        </div>
        <?php endif; ?>
    </footer>
    <!-- footer end -->
