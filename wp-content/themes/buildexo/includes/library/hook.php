<?php

/**
 * Hookup all the tags here.
 *
 * @package TURNER
 * @author  ThemeXriver <themexriver.web@gmail.com>
 * @version 1.0
 */

/**
 * Load the default config
 */
//turner_load_default_hooks
function turner_load_default_hooks() {

	$config = turner_WSH()->config( 'default' );

	if ( is_array( $config ) ) {

		foreach ( $config as $key => $more ) {

			foreach ( $more as $k => $value ) {
				$func = is_array( $value ) ? $value[0] : $value;

				$priority = isset( $value[1] ) ? $value[1] : 99;
				$params   = isset( $value[2] ) ? $value[2] : 2;

				add_action( $key, $func, $priority, $params );
			}
		}
	}
}

/**
 * [buildexo_main_header_area description]
 *
 * @return [type] [description]
 */

//buildexo_main_header_area
function buildexo_main_header_area() {

	$options     = turner_WSH()->option();
    
    $header_type = '';
    $header_e = 0;
    $header_d = '';

    if( is_page() ) {
		$header_source_type = ( isset($turner_meta['header_source_type']) ) ? $turner_meta['header_source_type'] : '';
		$header_new_elementor_template = ( isset($turner_meta['header_new_elementor_template']) ) ? $turner_meta['header_new_elementor_template']: '';  
		$header_style_settings = ( isset($turner_meta['header_style_settings']) ) ? $turner_meta['header_style_settings'] : '';
		
		
		$turner_meta = get_post_meta( get_the_ID(), 'turner_meta', true );
		$header_type = $header_source_type;
        $header_e    = $header_new_elementor_template;
        $header_d    = $header_style_settings;
	}
	
	if( ! $header_type || $header_type == 'd' ) {
	    
    	$header_type = $options->get( 'header_source_type' );
        $header_e = $options->get('header_elementor_template');
        $header_d = $options->get('header_style_settings');
        
	}
        if ( $header_type == 'e' AND class_exists( '\Elementor\Plugin' ) AND $header_e ) {
            echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $header_e );

            return false;
        } elseif ( $header_type == 'd' AND class_exists( '\Elementor\Plugin' ) AND $header_d ) {
            //need to change
			$turner_meta = get_post_meta( get_the_ID(), 'turner_meta', true );
			$header_option = $options->get( 'header_style_settings' );
			$header_style = ( isset($turner_meta['header_style_settings']) ) ? $turner_meta['header_style_settings'] : $header_option;
		}else {
			//need to change
            $turner_meta = get_post_meta( get_the_ID(), 'turner_meta', true );
			$header_option = $options->get( 'header_style_settings' );
			$header_style = ( isset($turner_meta['header_style_settings']) ) ? $turner_meta['header_style_settings'] : $header_option;
		
		}

	//need to change
	
	if ( $header_style == 'header_v1' ) {
		turner_template_load( 'templates/header/default-header.php' );
	} elseif ( $header_style == 'header_v2' ) {
		turner_template_load( 'templates/header/header_v2.php' );
	} elseif ( $header_style == 'header_v3' ) {
		turner_template_load( 'templates/header/header_v3.php' );
	}elseif ( $header_style == 'header_v4' ) { 
		turner_template_load( 'templates/header/header_v4.php' );
	}elseif ( $header_style == 'header_v5' ) { 
		turner_template_load( 'templates/header/header_v5.php' );
	}else {
		turner_template_load( 'templates/header/header_v4.php' );
	}
}

/**
 * [turner_main_footer_area description]
 *
 * @return [type] [description]
 */
//turner_main_footer_area
function turner_main_footer_area() {

	$options     = turner_WSH()->option();
    
    $footer_type = '';
    $footer_e = 0;
    $footer_d = '';

    if( is_page() ) {
		$footer_source_type = ( isset($turner_meta['footer_source_type']) ) ? $turner_meta['footer_source_type'] : '';
		$footer_new_elementor_template = ( isset($turner_meta['footer_new_elementor_template']) ) ? $turner_meta['footer_new_elementor_template']: '';  
		$footer_style_settings = ( isset($turner_meta['footer_style_settings']) ) ? $turner_meta['footer_style_settings'] : '';
		
		$turner_meta = get_post_meta( get_the_ID(), 'turner_meta', true );
	    $footer_type = $footer_source_type;
        $footer_e    = $footer_new_elementor_template;
        $footer_d    = $footer_style_settings;
	}
	
	if( ! $footer_type || $footer_type == 'd' ) {
	    
    	$footer_type = $options->get( 'footer_source_type' );
        $footer_e = $options->get('footer_elementor_template');
        $footer_d = $options->get('footer_style_settings');
        
	}

        if ( $footer_type == 'e' AND class_exists( '\Elementor\Plugin' ) AND $footer_e ) {
            echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $footer_e );

            return false;
        } elseif ( $footer_type == 'd' AND class_exists( '\Elementor\Plugin' ) AND $footer_d ) {
            //need to change
			$turner_meta = get_post_meta( get_the_ID(), 'turner_meta', true );
			$footer_option = $options->get( 'footer_style_settings' );
			$footer_style = ( isset($turner_meta['footer_style_settings']) ) ? $turner_meta['footer_style_settings'] : $footer_option;
		}else {
            //need to change
			$turner_meta = get_post_meta( get_the_ID(), 'turner_meta', true );
			$footer_option = $options->get( 'footer_style_settings' );
			$footer_style = ( isset($turner_meta['footer_style_settings']) ) ? $turner_meta['footer_style_settings'] : $footer_option;
		}

	//need to change
	if ( $footer_style == 'footer_v1' ) {
		turner_template_load( 'templates/footer/default-footer.php' );
	} elseif ( $footer_style == 'footer_v2' ) {
		turner_template_load( 'templates/footer/footer_v2.php' );
	} elseif ( $footer_style == 'footer_v3' ) {
		turner_template_load( 'templates/footer/footer_v3.php' );
	} else {
		turner_template_load( 'templates/footer/default-footer.php' );
	}
}

/**
 * [turner_sidebar description]
 *
 * @return [type] [description]
 */
//turner_sidebar
function turner_sidebar( $data ) {

	turner_template_load( 'templates/sidebar.php', compact( 'data' ) );
}

/**
 * [turner_banner description]
 *
 * @return [type] [description]
 */
//turner_banner
function turner_banner( $data ) {

	turner_template_load( 'templates/banner/banner.php', compact( 'data' ) );

}