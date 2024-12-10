<?php
$options = turner_WSH()->option(); 
$allowed_html = wp_kses_allowed_html( 'post' );

//Light Color Logo Settings
$dark_image_logo = $options->get( 'dark_image_logo' );
$dark_logo_dimension  = $options->get( 'dark_logo_dimension' );

$logo_type = '';
$logo_text = '';
$logo_typography = ''; 
$turner_meta = get_post_meta( get_the_ID(), 'turner_meta', true );
?>
<?php if($options->get('theme_preloader')) { ?>
<div id="tx-loadding" class="ct-loader style1"><div class="loading-spin"></div></div>
<?php } ?>
<header id="tur-header" class="tur-header-section">
    <div class="container">
        <div class="tur-header-content d-flex position-relative">
            <div class="brand-logo position-relative">
                <?php echo turner_logo( $logo_type, $dark_image_logo, $dark_logo_dimension, $logo_text, $logo_typography ); ?>
            </div>
            <div class="hamburger_menu d-lg-none">
                <a href="javascript:void(0);" class="active"><i class="far fa-bars"></i></a>
            </div> 
            <div class="header-top-content-menu-navigation">
                <div class="header-top-content d-flex align-items-center justify-content-between">
                    <div class="top-info ul-li">
                        <ul>
                            <li><i class="fas fa-bolt"></i> <?php echo wp_kses($options->get('header_text_v1'), true);?></li>
                        </ul>
                    </div>
                    <div class="top-info ul-li">
                        <ul>
                            <li><i class="fas fa-map-marker-alt"></i> <?php echo wp_kses($options->get('header_address_v1'), true);?></li>
                            <li><i class="fas fa-envelope"></i> <?php echo wp_kses($options->get('header_email_v1'), true);?></li>
                        </ul>
                    </div>
                </div>
                
                <div class="header-menu-cta-btn d-flex align-items-center justify-content-between">
                    <nav class="main-navigation clearfix ul-li">
                        <?php 
                            echo str_replace(['menu-item-has-children', 'sub-menu'], ['dropdown', 'dropdown-menu clearfix'], wp_nav_menu( array( 
                                'echo'           => false,
                                'theme_location' => !empty($turner_meta['onepagemenu']) == true ? 'main_one_menu' : 'main_menu', 
                                'menu_id'        =>'main-nav',
                                'menu_class'        =>'nav navbar-nav clearfix',
                                'container'=>false,
                            )) );	
                        ?>
                    </nav>
                    
                    <div class="header-cart-btn-grp d-flex align-items-center">
                          
                        <?php 
                            if ($options->get('show_shopping_cart_icon_v1')):
                            if( function_exists( 'WC' ) ): global $woocommerce;
                        ?>
                        <div class="header__action">
                            <a class="header-search-btn" href="javascript:void(0);"><i class="fas fa-search"></i></a>
                            <a class="shopping-cart header-cart-btn" href="javascript:void(0);"><i class="fas fa-shopping-cart"></i><span><?php echo wp_kses( $woocommerce->cart->cart_contents_count, true )?></span></a>
                        </div>
                        <?php  endif; endif; ?>
                        <?php if($options->get('show_btn_title_v1') ):?>
                        <div class="header-cta-btn">
                            <a class="text-uppercase" href="<?php echo esc_url($options->get('btn_link_v1'));?>"><?php echo wp_kses($options->get('btn_title_v1'), true);?> <i class="far fa-angle-double-right"></i></a>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <!-- <div class="mobile_menu_button open_mobile_menu">
                <i class="fal fa-bars"></i>
            </div> -->

        </div>
    </div>
    <!-- mobile menu -->
        <!-- /Mobile-Menu -->
    </div>
</header>
<!-- sidebar cart start -->
<aside>        
        
		<?php get_template_part('/templates/header/sidebar_settings');?> 
        <?php 
			if ($options->get('show_shopping_cart_icon_v1')):
			if( function_exists( 'WC' ) ): global $woocommerce;
		?>
        <div class="cart_sidebar">
            <div class="cart_sidebar_top">
                <h2 class="heading_title"><?php esc_html_e( 'Cart', 'buildexo' );?></h2>
                <button type="button" class="cart_close_btn tx-close"></button>
            </div>
            <div class="cart_items_list">
                <?php get_template_part('templates/widgets/cart_items'); ?>
            </div>
            
            <?php if (WC()->cart->get_cart()): ?>
        	<div class="cart_sidebar_bottom">
                <div class="total_price">
                    <span><?php esc_html_e('Sub Total: ', 'buildexo'); ?></span>
                    <span><?php wc_cart_totals_subtotal_html(); ?></span>
                </div>
                <div class="cart_sidebar_button">
                    <?php
						$cart_url = wc_get_cart_url();
						if ($cart_url) :
					?>
					<a class="thm-btn thm-btn__three" href="<?php echo esc_url($cart_url); ?>"><?php esc_html_e('View Cart', 'buildexo'); ?></a>
					<?php endif; ?>
					<?php
						$checkout_url = wc_get_checkout_url();
						if ($checkout_url) :
					?>
					<a class="thm-btn thm-btn__three" href="<?php echo esc_url($checkout_url); ?>"><?php esc_html_e('Checkout', 'buildexo'); ?></a>
					<?php endif; ?>
                </div>
        	</div>
            <?php endif; ?>
        </div>
        <!-- sidebar cart end -->
        <?php  endif; endif; ?>
    </aside>
    <!-- slide bar end -->
    
    
    <?php if( $options->get('show_search_icon_v1') ):?>
    <!-- header search start -->
    <div class="header-search-form-wrapper">
        <div class="tx-search-close tx-close"></div>
        <?php get_template_part('searchform1')?>        
    </div>
    <!-- header search end -->
    <?php endif; ?>
    
    <div class="body-overlay"></div>
    <main> 