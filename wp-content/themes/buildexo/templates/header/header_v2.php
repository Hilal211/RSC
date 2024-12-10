<?php
	$options = turner_WSH()->option();
	$allowed_html = wp_kses_allowed_html( 'post' );
	
	//Dark Color Logo Settings
	$dark_image_logo = $options->get( 'dark_image_logo' );
	$dark_logo_dimension = $options->get( 'dark_logo_dimension' );
	
	//Light Color Logo Settings
	$light_image_logo = $options->get( 'light_image_logo' );
	$light_logo_dimension = $options->get( 'light_logo_dimension' );
	
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

<div class="demo-two">
    <!-- header start -->
    <header id="tx-header-area" class="site-header header-style-two is-sticky header--transparent">
        <div class="header__main tx-header">
            <div class="header__logo">
                <?php echo turner_logo( $logo_type, $light_image_logo, $light_logo_dimension, $logo_text, $logo_typography ); ?>
            </div>
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
                
                <?php if( $options->get('show_search_icon_v2') ):?>
                <div class="header__action">
                    <a class="header-search-btn" href="javascript:void(0);"><i class="fas fa-search"></i></a>
                </div>
                <?php endif; ?>
                
				<?php if($options->get('show_btn_title_v2') ):?>
                <div class="header-btn">
                    <a class="thm-btn thm-btn--2" href="<?php echo esc_url($options->get('btn_link_v2'));?>"><?php echo wp_kses($options->get('btn_title_v2'), true);?></a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </header>
    <!-- header end -->  
    <?php get_template_part('/templates/header/sidebar_settings');?> 
    <?php if( $options->get('show_search_icon_v2') ):?>
    <!-- header search start -->
    <div class="header-search-form-wrapper">
        <div class="tx-search-close tx-close"></div>
        <?php get_template_part('searchform1')?>        
    </div>
    <!-- header search end -->
    <?php endif; ?>
    
    <div class="body-overlay"></div>

    	<main>
 