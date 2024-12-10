<?php
$options = turner_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' );
$turner_meta = get_post_meta( get_the_ID(), 'turner_meta', true );
?>    

<!-- side-mobile-menu start -->
<div class="slide-bar">
    <div class="close-mobile-menu">
        <a class="tx-close" href="javascript:void(0);"></a>
    </div> 
    <nav class="side-mobile-menu">
        <div class="header-mobile-search">
            <?php get_template_part('templates/searchform');?> 
        </div>
        <ul id="mobile-menu-active">
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
    
    
