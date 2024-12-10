<?php
include_once( get_template_directory() . '/demo-import/codestar.php');
function buildexo_ocdi_import_files() {
	return array(
		array(
			'import_file_name'             => 'Home 1',
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'demo-import/content.xml',
			'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'demo-import/widgets.wie',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'demo-import/customizer.dat',
			'local_import_json'           => array(
				array(
					'file_path'   => trailingslashit( get_template_directory() ) . 'demo-import/theme-options.json',
					'option_name' => 'turner_options',
				),
			),
			'import_preview_image_url'     => get_template_directory_uri() . '/screenshot.png',
			'import_notice'                => esc_html__( 'Import process may take 3-10 minutes. If you facing any issues please contact our support.After Import Succesfuly go to Appearance->Menu And Set your Menu', 'buildexo' ),
			'preview_url'                  => 'https://themexriver.com/wp/buildexo/',
		),

	);
}
add_filter( 'pt-ocdi/import_files', 'buildexo_ocdi_import_files' );

function buildexo_ocdi_after_import( $selected_import ) {

    $front_page_id = get_page_by_title( 'Home' );
    $blog_page_id	= get_page_by_title( 'Blog' );
    $shop_page_id  = get_page_by_title( 'My Shop' );
	$cart_page_id  = get_page_by_title( 'My Shopping Cart' );
	$checkout_page_id  = get_page_by_title( 'My Checkout' );
	$myaccount_page_id  = get_page_by_title( 'My Account' );

	// Assign buildexo menus to their locations where will be display.
    $main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );

	$header_menu = get_term_by( 'name', '', 'nav_menu' );


	set_theme_mod(
		'nav_menu_locations', array(
			'main_menu' => $main_menu->term_id,
			'header_menu' => $header_menu->term_id,
		)
	);


	//Revulation Slider Import
	if( class_exists('RevSliderSliderImport') ) {
		foreach(array('slider-1', 'slider-2', 'slider-3', 'slider-4') as $slider) {
			$file = get_template_directory() . '/demo-import/slider/'.$slider.'.zip';
			if( file_exists($file) ) {
				$importer = new RevSliderSliderImport();
				$response = $importer->import_slider( true, $file );
			}
		}
    }


    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );
    update_option( 'woocommerce_shop_page_id', $shop_page_id->ID );
	update_option( 'woocommerce_cart_page_id', $cart_page_id->ID );
	update_option( 'woocommerce_checkout_page_id', $checkout_page_id->ID );
	update_option( 'woocommerce_myaccount_page_id', $myaccount_page_id->ID );
	update_option('elementor_experiment-e_font_icon_svg' , 'inactive');
}
add_action( 'pt-ocdi/after_import', 'buildexo_ocdi_after_import' );

function buildexo_ocdi_before_content_import() {
    add_filter( 'wp_import_post_data_processed', 'buildexo_ocdi_wp_import_post_data_processed', 99, 2 );
}
add_action( 'pt-ocdi/before_content_import', 'buildexo_ocdi_before_content_import', 99 );

function buildexo_ocdi_wp_import_post_data_processed( $postdata, $data ) {
    return wp_slash( $postdata );
}

add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );
