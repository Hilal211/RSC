<?php

require_once get_template_directory() . '/includes/loader.php';

add_action( 'after_setup_theme', 'buildexo_setup_theme' );
add_action( 'after_setup_theme', 'turner_load_default_hooks' );


function buildexo_setup_theme() {

	load_theme_textdomain( 'buildexo', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'custom-background' );
	add_theme_support('woocommerce');
	add_theme_support('wc-product-gallery-lightbox');

	remove_theme_support( 'widgets-block-editor' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'editor-styles' );


	// Set the default content width.
	$GLOBALS['content_width'] = 525;

	/*---------- Register image sizes ----------*/

	//Register image sizes
	add_image_size( 'turner_175x197', 175, 197, true ); //'turner_175x197 Service Grid'
	add_image_size( 'turner_449x204', 449, 204, true ); //'turner_449x204 Project Grid'
	add_image_size( 'turner_596x973', 596, 973, true ); //'turner_596x973 Project Tabs'
	add_image_size( 'turner_592x529', 592, 529, true ); //'turner_592x529 Project Tabs'
	add_image_size( 'turner_566x320', 566, 320, true ); //'turner_566x320 News Grid'
	add_image_size( 'turner_385x229', 385, 229, true ); //'turner_385x229 News Grid'
	add_image_size( 'turner_399x231', 399, 231, true ); //'turner_399x231 News Carousel'
	add_image_size( 'turner_389x607', 389, 607, true ); //'turner_389x607 Team Grid'
	add_image_size( 'turner_403x399', 403, 399, true ); //'turner_403x399 Team Grid'
	add_image_size( 'turner_115x115', 115, 115, true ); //'turner_115x115 Testimonial Carousel Thumb'
	add_image_size( 'turner_101x92', 101, 92, true ); //'turner_101x92 Testimonial Carousel Thumb'
	add_image_size( 'turner_377x618', 377, 618, true ); //'turner_377x618 Testimonial Carousel'
	add_image_size( 'turner_58x55', 58, 55, true ); //'turner_58x55 Testimonial Carousel'
	add_image_size( 'turner_174x116', 174, 116, true ); //'turner_174x116 Footer Gallery Thumb'
	add_image_size( 'turner_95x91', 95, 91, true ); //'turner_95x91 Footer Gallery Thumb'
	add_image_size( 'turner_405x647', 405, 647, true ); //'turner_405x647 Team Detials'
	add_image_size( 'turner_389x390', 389, 390, true ); //'turner_389x390 Portfolio Detials'
	add_image_size( 'turner_828x516', 828, 516, true ); //'turner_828x516 Portfolio Detials'
	add_image_size( 'turner_1170x520', 1170, 520, true ); //'turner_1170x520 Service Detials'
	add_image_size( 'turner_768x282', 768, 282, true ); //'turner_768x282 Career Detials'
	add_image_size( 'turner_370x357', 370, 357, true ); //'turner_370x357 Product Carousel'
	add_image_size( 'turner_258x232', 258, 232, true ); //'turner_258x232 Shop Archive'
	add_image_size( 'turner_1170x350', 1170, 350, true ); //'turner_1170x350 Blog Classic'
	add_image_size( 'turner_1170x500', 1170, 500, true ); //'turner_1170x500 Blog Detials'

	/*---------- Register image sizes ends ----------*/



	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'main_menu' => esc_html__( 'Main Menu', 'buildexo' ),
		'main_one_menu' => esc_html__( 'Main Onepage Menu', 'buildexo' ),
		'header_menu' => esc_html__( 'Header Menu', 'buildexo' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'      => 250,
		'height'     => 250,
		'flex-width' => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style();
	add_action( 'admin_init', 'buildexo_admin_init', 2000000 );
}

/**
 * [buildexo_admin_init]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */


function buildexo_admin_init() {
	remove_action( 'admin_notices', array( 'ReduxFramework', '_admin_notices' ), 99 );
}

/*---------- Sidebar settings ----------*/

/**
 * [turner_widgets_init]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */
function turner_widgets_init() {

	global $wp_registered_sidebars;

	$theme_options = get_theme_mod( 'turner' . '_options-mods' );

	register_sidebar( array(
		'name'          => esc_html__( 'Default Sidebar', 'buildexo' ),
		'id'            => 'default-sidebar',
		'description'   => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'buildexo' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget__title">',
		'after_title'   => '</h2>',
	) );

	if ( class_exists( '\Elementor\Plugin' )){
	register_sidebar(array(
		'name' => esc_html__('Footer 1 (Home 1)', 'buildexo'),
		'id' => 'footer-sidebar',
		'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'buildexo'),
		'before_widget'=>'<div id="%1$s" class="footer-widget list-unstyled footer__widget %2$s">',
		'after_widget'=>'</div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>'
	));
	register_sidebar(array(
		'name' => esc_html__('Footer 2 (Home 1)', 'buildexo'),
		'id' => 'footer-sidebar-2',
		'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'buildexo'),
		'before_widget'=>'<div id="%1$s" class="footer-widget footer__widget %2$s"><div class="footer__link list-unstyled">',
		'after_widget'=>'</div></div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>'
	));
	register_sidebar(array(
		'name' => esc_html__('Footer 3 (Home 1)', 'buildexo'),
		'id' => 'footer-sidebar-3',
		'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'buildexo'),
		'before_widget'=>'<div id="%1$s" class="footer-widget footer__widget %2$s"><div class="footer__link list-unstyled">',
		'after_widget'=>'</div></div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>'
	));
	register_sidebar(array(
		'name' => esc_html__('Footer 4 (Home 1)', 'buildexo'),
		'id' => 'footer-sidebar-4',
		'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'buildexo'),
		'before_widget'=>'<div id="%1$s" class="footer-widget footer__widget %2$s"><div class="footer__link list-unstyled">',
		'after_widget'=>'</div></div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>'
	));
	register_sidebar(array(
		'name' => esc_html__('Footer Five (Home 2)', 'buildexo'),
		'id' => 'footer-sidebar-5',
		'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'buildexo'),
		'before_widget'=>'<div class="col-lg-3 col-md-6 mt-30"><div id="%1$s" class="footer-widget footer__widget footer__link list-unstyled %2$s">',
		'after_widget'=>'</div></div>',
		'before_title' => '<div class="widget-heading mb-30"><h3>',
		'after_title' => '</h3></div>'
	));
	register_sidebar(array(
		'name' => esc_html__('Footer Six 1 (Home 3)', 'buildexo'),
		'id' => 'footer-sidebar-6-1',
		'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'buildexo'),
		'before_widget'=>'<div id="%1$s" class="footer-widget footer__widget %2$s"><div class="footer__link list-unstyled">',
		'after_widget'=>'</div></div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>'
	));
	register_sidebar(array(
		'name' => esc_html__('Footer Six 2 (Home 3)', 'buildexo'),
		'id' => 'footer-sidebar-6-2',
		'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'buildexo'),
		'before_widget'=>'<div id="%1$s" class="footer-widget footer__widget %2$s"><div class="footer__link list-unstyled">',
		'after_widget'=>'</div></div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>'
	));
	register_sidebar(array(
		'name' => esc_html__('Footer Six 3 (Home 3)', 'buildexo'),
		'id' => 'footer-sidebar-6-3',
		'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'buildexo'),
		'before_widget'=>'<div id="%1$s" class="footer-widget footer__widget %2$s"><div class="footer__link list-unstyled">',
		'after_widget'=>'</div></div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>'
	));
	register_sidebar(array(
		'name' => esc_html__('Footer Six 4 (Home 3)', 'buildexo'),
		'id' => 'footer-sidebar-6-4',
		'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'buildexo'),
		'before_widget'=>'<div id="%1$s" class="footer-widget footer__widget %2$s"><div class="footer__link list-unstyled">',
		'after_widget'=>'</div></div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>'
	));
	register_sidebar(array(
		'name' => esc_html__('Service Widgets', 'buildexo'),
		'id' => 'service-sidebar',
		'description' => esc_html__('Widgets in this area will be shown in Service Single Page.', 'buildexo'),
		'before_widget'=>'<div id="%1$s" class="service-widget widget %2$s">',
		'after_widget'=>'</div>',
		'before_title' => '<h2 class="widget__title">',
		'after_title' => '</h2>'
	));
	register_sidebar(array(
		'name' => esc_html__('Shop Widgets', 'buildexo'),
		'id' => 'shop-sidebar',
		'description' => esc_html__('Widgets in this area will be shown in Service Single Page.', 'buildexo'),
		'before_widget'=>'<div id="%1$s" class="shop-sidebar widget %2$s">',
		'after_widget'=>'</div>',
		'before_title' => '<h2 class="widget__title">',
		'after_title' => '</h2>'
	));
	}
	register_sidebar(array(
	  'name' => esc_html__( 'Blog Listing', 'buildexo' ),
	  'id' => 'blog-sidebar',
	  'description' => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'buildexo' ),
	  'before_widget'=>'<div id="%1$s" class="widget %2$s">',
	  'after_widget'=>'</div>',
	  'before_title' => '<h2 class="widget__title">',
	  'after_title' => '</h2>'
	));
	if ( ! is_object( turner_WSH() ) ) {
		return;
	}

	$sidebars = turner_set( $theme_options, 'custom_sidebar_name' );

	foreach ( array_filter( (array) $sidebars ) as $sidebar ) {

		if ( turner_set( $sidebar, 'topcopy' ) ) {
			continue;
		}

		$name = $sidebar['sidebar'];
		if ( ! $name ) {
			continue;
		}
		$slug = str_replace( ' ', '_', $name );

		register_sidebar( array(
			'name'          => $name,
			'id'            => sanitize_title( $slug ),
			'before_widget' => '<div id="%1$s" class="%2$s widget mt-30 ">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget__title">',
			'after_title'   => '</h2>',
		) );
	}

	update_option( 'wp_registered_sidebars', $wp_registered_sidebars );
}

add_action( 'widgets_init', 'turner_widgets_init' );

/*---------- Sidebar settings ends ----------*/

/*---------- Gutenberg settings ----------*/

function buildexo_gutenberg_editor_palette_styles() {
    add_theme_support( 'editor-color-palette', array(
        array(
            'name' => esc_html__( 'strong yellow', 'buildexo' ),
            'slug' => 'strong-yellow',
            'color' => '#f7bd00',
        ),
        array(
            'name' => esc_html__( 'strong white', 'buildexo' ),
            'slug' => 'strong-white',
            'color' => '#fff',
        ),
		array(
            'name' => esc_html__( 'light black', 'buildexo' ),
            'slug' => 'light-black',
            'color' => '#242424',
        ),
        array(
            'name' => esc_html__( 'very light gray', 'buildexo' ),
            'slug' => 'very-light-gray',
            'color' => '#797979',
        ),
        array(
            'name' => esc_html__( 'very dark black', 'buildexo' ),
            'slug' => 'very-dark-black',
            'color' => '#000000',
        ),
    ) );

	add_theme_support( 'editor-font-sizes', array(
		array(
			'name' => esc_html__( 'Small', 'buildexo' ),
			'size' => 10,
			'slug' => 'small'
		),
		array(
			'name' => esc_html__( 'Normal', 'buildexo' ),
			'size' => 15,
			'slug' => 'normal'
		),
		array(
			'name' => esc_html__( 'Large', 'buildexo' ),
			'size' => 24,
			'slug' => 'large'
		),
		array(
			'name' => esc_html__( 'Huge', 'buildexo' ),
			'size' => 36,
			'slug' => 'huge'
		)
	) );

}
add_action( 'after_setup_theme', 'buildexo_gutenberg_editor_palette_styles' );

/*---------- Gutenberg settings ends ----------*/

/*---------- Enqueue Styles and Scripts ----------*/

function turner_enqueue_scripts() {

	//styles
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );
	wp_enqueue_style( 'buildexo-fontawesome', get_template_directory_uri() . '/assets/css/fontawesome.css' );
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate.css' );
	wp_enqueue_style( 'flaticon', get_template_directory_uri() . '/assets/css/flaticon.css' );
	wp_enqueue_style( 'jquery-ui', get_template_directory_uri() . '/assets/css/jquery-ui.css' );
	wp_enqueue_style( 'metismenu', get_template_directory_uri() . '/assets/css/metisMenu.css' );
	wp_enqueue_style( 'buildexo-swiper', get_template_directory_uri() . '/assets/css/swiper.min.css' );
	wp_enqueue_style( 'odometer', get_template_directory_uri() . '/assets/css/odometer.css' );
	wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/assets/css/magnific-popup.css' );
	wp_enqueue_style( 'buildexo-main', get_stylesheet_uri() );
	wp_enqueue_style( 'buildexo-style-main', get_template_directory_uri() . '/assets/css/main.css');
	wp_enqueue_style( 'buildexo-custom', get_template_directory_uri() . '/assets/css/custom.css' );
	wp_enqueue_style( 'buildexo-woocommerce', get_template_directory_uri() . '/assets/css/woocommerce.css' );
	wp_enqueue_style( 'buildexo-tut', get_template_directory_uri() . '/assets/css/tut.css' );
	wp_enqueue_style( 'buildexo-gutenberg', get_template_directory_uri() . '/assets/css/gutenberg.css' );

	if (is_rtl()) {
		wp_enqueue_style( 'buildexo-rtl', get_template_directory_uri() . '/assets/css/rtl.css' );
	}

    //scripts
	wp_enqueue_script( 'jquery-ui-core');
	wp_enqueue_script( 'bootstrap-bundle', get_template_directory_uri().'/assets/js/bootstrap.bundle.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'buildexo-swiper', get_template_directory_uri().'/assets/js/swiper.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'wow', get_template_directory_uri().'/assets/js/wow.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'appear', get_template_directory_uri().'/assets/js/appear.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery-magnific-popup', get_template_directory_uri().'/assets/js/jquery.magnific-popup.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'countdown', get_template_directory_uri().'/assets/js/countdown.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'odometer', get_template_directory_uri().'/assets/js/odometer.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'sticky-header', get_template_directory_uri().'/assets/js/sticky-header.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'metismenu', get_template_directory_uri().'/assets/js/metisMenu.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'touchspin', get_template_directory_uri().'/assets/js/touchspin.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'parallax-scroll', get_template_directory_uri().'/assets/js/parallax-scroll.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jarallax', get_template_directory_uri().'/assets/js/jarallax.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'appear-2', get_template_directory_uri().'/assets/js/appear-2.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'gsap', get_template_directory_uri().'/assets/js/gsap.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'scroll-trigger', get_template_directory_uri().'/assets/js/scroll-trigger.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'split-text', get_template_directory_uri().'/assets/js/split-text.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'cursor', get_template_directory_uri().'/assets/js/cursor.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'isotope-pkgd', get_template_directory_uri().'/assets/js/isotope.pkgd.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'imagesloaded-pkgd', get_template_directory_uri().'/assets/js/imagesloaded.pkgd.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'tilt-jquery', get_template_directory_uri().'/assets/js/tilt.jquery.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'twin', get_template_directory_uri().'/assets/js/twin.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'rbtools', get_template_directory_uri().'/assets/js/rbtools.min.js', array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'buildexo-main-script', get_template_directory_uri().'/assets/js/main.js', array(), false, true );
	if( is_singular() ) wp_enqueue_script('comment-reply');
}
add_action( 'wp_enqueue_scripts', 'turner_enqueue_scripts' );

/*---------- Enqueue styles and scripts ends ----------*/

/*---------- Google fonts ----------*/

function buildexo_fonts_url() {

	$fonts_url = '';

		$font_families['Exo+2']     = 'Exo 2:300,400,500,600,700,800';
		$font_families['Roboto']    = 'Roboto:300,400,500,700';
		$font_families['Teko'] 		= 'Teko:300,400,500,600,700';

		$font_families = apply_filters( 'TURNER/includes/classes/header_enqueue/font_families', $font_families );

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$protocol  = is_ssl() ? 'https' : 'http';
		$fonts_url = add_query_arg( $query_args, $protocol . '://fonts.googleapis.com/css' );

		return esc_url_raw($fonts_url);

}

function turner_theme_styles() {
    wp_enqueue_style( 'turner-theme-fonts', buildexo_fonts_url(), array(), null );
}

add_action( 'wp_enqueue_scripts', 'turner_theme_styles' );
add_action( 'admin_enqueue_scripts', 'turner_theme_styles' );

/*---------- Google fonts ends ----------*/

/*---------- More functions ----------*/

// 1) turner_set function

/**
 * [turner_set description]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */
if ( ! function_exists( 'turner_set' ) ) {
	function turner_set( $var, $key, $def = '' ) {

		if ( is_object( $var ) && isset( $var->$key ) ) {
			return $var->$key;
		} elseif ( is_array( $var ) && isset( $var[ $key ] ) ) {
			return $var[ $key ];
		} elseif ( $def ) {
			return $def;
		} else {
			return false;
		}
	}
}

// 2) turner_add_editor_styles function

function turner_add_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'admin_init', 'turner_add_editor_styles' );

// 3) Add specific CSS class by filter body class.

$options = turner_WSH()->option();
if( turner_set($options, 'boxed_wrapper') ){

add_filter( 'body_class', function( $classes ) {
    $classes[] = 'boxed_wrapper';
    return $classes;
} );
}

// 4) turner_related_products_limit function

function turner_related_products_limit() {
  global $product;

	$args['posts_per_page'] = 6;
	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'turner_related_products_args', 20 );
  function turner_related_products_args( $args ) {
	$args['posts_per_page'] = 3; // 4 related products
	$args['columns'] = 1; // arranged in 2 columns
	return $args;
}

function buildexo_custom_class( $classes ) {
    $page_meta = get_post_meta( get_the_ID(), 'turner_meta', true ) ? get_post_meta( get_the_ID(), 'turner_meta', true ) : [];
    $enable_boxed_layout = array_key_exists( 'enable_boxed_layout', $page_meta ) ? $page_meta['enable_boxed_layout'] : false;
    $box_layout_class = $enable_boxed_layout == true ? 'rz-boxed-layout' : '';
    $classes[] = '' . esc_attr( $box_layout_class ) . '';
    return $classes;
}
add_filter( 'body_class', 'buildexo_custom_class' );


function buildexo_theme_options_style() {

    //
    // Enqueueing StyleSheet file
    //
    wp_enqueue_style( 'buildexo-theme-custom-style', get_template_directory_uri() . '/assets/css/custom-style.css' );
    $css_output = '';
    $page_meta = get_post_meta( get_the_ID(), 'turner_meta', true ) ? get_post_meta( get_the_ID(), 'turner_meta', true ) : [];


    if(!empty($page_meta['box_bg_image']['url'])){
        $css_output .= '
        .rz-boxed-layout {
            background-image: url('.esc_url($page_meta['box_bg_image']['url']).');
			background-repeat: repeat;
    		background-attachment: fixed;
        }
        ';
    }


    wp_add_inline_style( 'buildexo-theme-custom-style', $css_output );

}
add_action( 'wp_enqueue_scripts', 'buildexo_theme_options_style' );


/*---------- More functions ends ----------*/
function buildexo_primary_color() {
	$options = turner_WSH()->option();
    wp_enqueue_style( 'buildexo-primary-color', get_template_directory_uri() . '/assets/css/buildexo-custom.css', [] );

    $color_primary = $options->get( 'color_primary', '#ff6600' );
    $color_primary_2 = $options->get( 'color_primary_2', '#fa4318' );
    $color_secondary = $options->get( 'color_secondary', '#dc4e11' );

    if (
        $color_primary ||
        $color_primary_2 ||
        $color_secondary
    ) {
        $custom_css = '';
        $custom_css .= '
            :root {
                --color-primary: ' . esc_attr( $color_primary ) . ';
                --color-primary-2: ' . esc_attr( $color_primary_2 ) . ';
                --color-secondary: ' . esc_attr( $color_secondary ) . ';
            }
        ';

        wp_add_inline_style( 'buildexo-primary-color', $custom_css );
    }
}
add_action( 'wp_enqueue_scripts', 'buildexo_primary_color' );