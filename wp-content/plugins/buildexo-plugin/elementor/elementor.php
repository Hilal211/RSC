<?php

namespace TURNERPLUGIN\Element;

class Elementor {
	static $widgets = array(
		//Updated
		'hero_title',
		'service_grid',
		'feature_tabs',
		'client_carousel',
		'button',
		'feature_list',
		'accordian',
		'form',
		'testimonial_carousel',
		'icon_box',
		'float_image',
		'working_plan',
		'project_grid',
		'team_grid',
		'product_carousel',
		'news_grid',
		'news_carousel',
		'service_carousel',
		'feature_tab_two',
		'cta_slider',
		'project_carousel',
		'project_list',
		'team_item',
		'award_tab',
		'hero_slider',
		'service_carousel_two',
		'news_grid_two',
		'testimonial_carousel_two',
		'project_carousel_two',
		'cta_bar',
		'turner_counter',
		'team_item_two',
		'contact_infos',
		'progress_bar',
		'about_list',
		
		//Home Two
		'call_to_action',
		'experiance_section',
		'projects_tab',
		
		//Home Three
		'pricing_plane',		
		
		//Inner Pages
		'testimonials_grid',
		'coming_soon',
		'project_mixitup',
		'career',
		'google_map',
		
	);

	static function init() {
		add_action( 'elementor/init', array( __CLASS__, 'loader' ) );
		add_action( 'elementor/elements/categories_registered', array( __CLASS__, 'register_cats' ) );
	}

	static function loader() {
		
		foreach ( self::$widgets as $widget ) {
			$file = TURNERPLUGIN_PLUGIN_PATH . '/elementor/' . $widget . '.php';
			if ( file_exists( $file ) ) {
				require_once $file;
			}			
			add_action( 'elementor/widgets/widgets_registered', array( __CLASS__, 'register' ) );
		}
	}

	static function register( $elemntor ) {
		foreach ( self::$widgets as $widget ) {
			$class = '\\TURNERPLUGIN\\Element\\' . ucwords( $widget );
			if ( class_exists( $class ) ) {
				$elemntor->register_widget_type( new $class );
			}
		}
	}
	
	static function register_cats( $elements_manager ) {
		$elements_manager->add_category(
			'turner',
			[
				'title' => esc_html__( 'Turner', 'turner' ),
				'icon'  => 'fa fa-plug',
			]
		);
		$elements_manager->add_category(
			'templatepath',
			[
				'title' => esc_html__( 'Template Path', 'turner' ),
				'icon'  => 'fa fa-plug',
			]
		);
	}
}

Elementor::init();