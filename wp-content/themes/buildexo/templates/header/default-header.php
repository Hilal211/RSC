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
    <div class="tx-cursor tx-js-cursor">
        <div class="tx-cursor-wrapper">
            <div class="tx-cursor--follower ct-js-follower"></div>
        </div>
    </div>

    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
        </svg>
    </div>


<div class="">
    <!-- header start -->
    <header id="tx-header-area" class ="site-header header-style-one is-sticky header--transparent">
        <div class="tx-header">
            <div class="container">
                <div class="row g-0 align-items-end">
                    <div class="col-lg-2 col-md-3 col-6">
                        <div class="header__logo header__logo-bg">
                            <?php echo turner_logo( $logo_type, $dark_image_logo, $dark_logo_dimension, $logo_text, $logo_typography ); ?>
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-9 col-6">
                        <div class="header__top ul_li_between">
                            <?php if( $options->get('show_header_text_v1') ):?>
                            <div class="header__top-text">
                                <i class="fas fa-bolt"></i><?php echo wp_kses($options->get('header_text_v1'), true);?>
                            </div>
                            <?php endif; ?>
                            <?php if($options->get('show_header_address_v1') ):?>
                            <ul class="header__info ul_li">
                                <li><i class="fas fa-map-marker-alt"></i><?php echo wp_kses($options->get('header_address_v1'), true);?></li>
                                <li><i class="fas fa-envelope"></i><?php echo wp_kses($options->get('header_email_v1'), true);?></li>
                            </ul>
                            <?php endif; ?>
                        </div>
                        <div class="header__main">
                            <div class="main-menu__wrap ul_li navbar navbar-expand-lg">
                                <nav class="main-menu collapse navbar-collapse">
                                    <ul>
                                        <?php wp_nav_menu( array( 
                                            'theme_location' => !empty($turner_meta['onepagemenu']) == true ? 'main_one_menu' : 'main_menu', 
                                            'container_id' => 'navbar-collapse-1',
                                            'container_class'=>'navbar-collapse collapse navbar-right',
                                            'menu_class'=>'nav navbar-nav',
                                            'fallback_cb'=>false, 
                                            'items_wrap' => '%3$s', 
                                            'container'=>false,
                                            'depth'=>'3',
                                            'walker'=> new Bootstrap_walker()  
                                        ) ); ?>
                                    </ul>
                                </nav>
                            </div>
                            <div class="header__right ul_li">                                
                                <div class="hamburger_menu d-lg-none">
                                    <a href="javascript:void(0);" class="active"><i class="far fa-bars"></i></a>
                                </div>                                
                                <div class="header__action">
                                    <?php if( $options->get('show_search_icon_v1') ):?>
                                    <a class="header-search-btn" href="javascript:void(0);"><i class="fas fa-search"></i></a>
                                    <?php endif; ?> 
                                    <?php 
										if ($options->get('show_shopping_cart_icon_v1')):
										if( function_exists( 'WC' ) ): global $woocommerce;
									?>
									<a class="shopping-cart header-cart-btn" href="javascript:void(0);"><i class="fas fa-shopping-cart"></i><span><?php echo wp_kses( $woocommerce->cart->cart_contents_count, true )?></span></a>
									<?php  endif; endif; ?>
                                </div>                                
                                
                                <?php if($options->get('show_btn_title_v1') ):?>
                                <div class="header__button">
                                    <a href="<?php echo esc_url($options->get('btn_link_v1'));?>"><?php echo wp_kses($options->get('btn_title_v1'), true);?><i class="far fa-chevron-double-right"></i></a>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->
    
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