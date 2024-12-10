<?php
/**
 * Footer Template  File
 *
 * @package TURNER
 * @author  ThemeXriver
 * @version 1.0
 */
$options = turner_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' );

$query_number = $options->get('query_number' );
$query_orderby = $options->get('query_orderby' );
$query_order = $options->get('query_order' );
$query_category = $options->get('query_category' );
$args = array(
	'post_type'      => 'project',
	'posts_per_page' => $query_number,
	'orderby'        => $query_orderby,
	'order'          => $query_order,
);
if( $query_category  ) $args['project_cat'] = $query_category;
$query = new \WP_Query( $args ); ?>
	
   	
    <!-- footer start -->
    <footer class="site-footer footer-bg">
        <div class="container">
            <?php if($options->get( 'show_footer_gallery_v1' )) { ?>
            <div class="footer-gallery ul_li">
                <?php 
					global $post;
					while ( $query->have_posts() ) : $query->the_post(); 
					$post_thumbnail_id = get_post_thumbnail_id($post->ID);
					$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id);
				?>
                <div class="footer-gallery__item">
                    <?php the_post_thumbnail('turner_174x116'); ?>
                    <a href="<?php echo esc_url( $post_thumbnail_url );?>"><i class="fab fa-instagram lightbox-image"></i></a>
                </div>
                <?php endwhile; ?>
            </div>
            <?php }  ?>
            <?php if($options->get( 'show_footer_info_section_v1' )) { ?>
            <div class="footer__top">
                <div class="row g-0 align-items-center">
                    <div class="col-lg-6">
                        <div class="footer__top-left ul_li_between">
                            <?php if($options->get( 'footer_phone_title_v1' ) || $options->get('footer_phone_no_v1')) { ?>
                            <div class="footer__cta ul_li">
                                <i class="fas fa-phone"></i>
                                <div class="footer__cta-holder">
                                    <?php if($options->get( 'footer_phone_title_v1' )) { ?><span><?php echo wp_kses($options->get('footer_phone_title_v1'), true);?></span><?php }  ?>
                                    <?php if($options->get( 'footer_phone_no_v1' )) { ?><h3><?php echo wp_kses($options->get('footer_phone_no_v1'), true);?></h3><?php }  ?>
                                </div>
                            </div>
                            <?php }  ?>
                            <?php if($options->get( 'show_footer_social_media_v1' )) {
							$icons = $options->get( 'footer_social_media_v1' );
							if ( ! empty( $icons ) ) { ?>
							<!-- Socials Box -->
							<div class="footer__social">
								<?php foreach ( $icons as $h_icon ) {
								
								$icon_class = explode( '-', turner_set( $h_icon, 'icon' ) ); ?>
								<a href="<?php echo esc_url(turner_set( $h_icon, 'url' )); ?>" <?php if( turner_set( $h_icon, 'background' ) || turner_set( $h_icon, 'color' ) ):?>style="background-color:<?php echo esc_attr(turner_set( $h_icon, 'background' )); ?>; color: <?php echo esc_attr(turner_set( $h_icon, 'color' )); ?>"<?php endif;?> target="_blank"><i class="<?php echo esc_attr( turner_set( $h_icon, 'icon' ) ); ?>"></i></a>
								<?php } ?>
							</div>
							<?php } } ?>
                        </div>
                    </div>
                    <?php if($options->get( 'footer_form_title_v1' ) || $options->get('footer_form_url_v1')) { ?>
                    <div class="col-lg-6">
                        <div class="footer__top-right ul_li_between">
                            <?php if($options->get( 'footer_form_title_v1' )) { ?><h3><?php echo wp_kses($options->get('footer_form_title_v1'), true);?></h3><?php }  ?>
                            <div class="footer__newsletter">
								<?php echo do_shortcode($options->get('footer_form_url_v1'), true);?>
                            </div>
                        </div>
                    </div>
                    <?php }  ?>
                </div>
            </div>
            <?php }  ?>
           
            <div class="footer__main 11 pt-70 pb-70">
                <div class="row mt-none-30">
                    <?php if ( is_active_sidebar( 'footer-sidebar' ) ) { ?>
                    <div class="col-lg-4 col-md-4 mt-30">
                        <?php dynamic_sidebar('footer-sidebar');?>
                    </div>
                    <?php } ?>
                    <div class="col-lg-8 col-md-8">
                        <div class="row footer__links-wrap">
                            <?php if ( is_active_sidebar( 'footer-sidebar-2' ) ) { ?>
                                <div class="col-lg-4 col-md-4 mt-30">
                                    <?php dynamic_sidebar('footer-sidebar-2');?>
                                </div>
                            <?php } ?>
                            <?php if ( is_active_sidebar( 'footer-sidebar-3' ) ) { ?>
                            <div class="col-lg-4 col-md-4 mt-30">
                                <div class="footer__widget">
                                    <?php dynamic_sidebar('footer-sidebar-3');?>
                                </div>
                            </div>
                            <?php } ?>
                            <?php if ( is_active_sidebar( 'footer-sidebar-4' ) ) { ?>
                            <div class="col-lg-4 col-md-4 mt-30">
                                <div class="footer__widget">
                                    <?php dynamic_sidebar('footer-sidebar-4');?>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>            
            <?php if( $options->get( 'copyright_text1') ) :?>
            <div class="footer__copyright-text text-center">
                <?php echo wp_kses( $options->get( 'copyright_text1'), true ); ?>
            </div>
            <?php endif; ?>
        </div>
    </footer>
    <!-- footer end -->
