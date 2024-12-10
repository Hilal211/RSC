<?php
/**
 * All Elementor widget init
 * @package Turner
 * @since 1.0.0
 */

if ( !defined('ABSPATH') ){
	exit(); // exit if access directly
}

if ( !class_exists('Turner_Elementor_Widget_Init') ){

	class Turner_Elementor_Widget_Init{
		/*
		* $instance
		* @since 1.0.0
		* */
		private static $instance;
		/*
		* construct()
		* @since 1.0.0
		* */
		public function __construct() {
			add_action('elementor/documents/register_controls',array($this,'register_Turner_page_controls'));
		}
		/*
	   * getInstance()
	   * @since 1.0.0
	   * */
		public static function getInstance(){
			if ( null == self::$instance ){
				self::$instance = new self();
			}
			return self::$instance;
		}
		
		/**
		 * Register additional document controls.
		 *
		 * @param \Elementor\Core\DocumentTypes\PageBase $document The PageBase document instance.
		 */
		public function register_Turner_page_controls( $document ) {

			if ( ! $document instanceof \Elementor\Core\DocumentTypes\PageBase || ! $document::get_property( 'has_elements' ) ) {
				return;
			}

			$document->start_controls_section(
				'body_Turner_style',
				[
					'label' => esc_html__( 'Body Style', 'Turner-plugin' ),
					'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				]
			);
			$document->add_control(
				'body_color',
				[
					'label' => esc_html__( 'Body Color', 'textdomain' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}}' => 'color: {{VALUE}}',
					],
				]
			);
			$document->add_control(
				'heading_color',
				[
					'label' => esc_html__( 'heading Color', 'textdomain' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} h1, h2, h3, h4, h5, h6' => 'color: {{VALUE}}',
					],
				]
			);

			$document->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'label' => esc_html__( 'Page Body Font', 'textdomain' ),
					'name' => 'page_body_font',
					'selector' => '{{WRAPPER}}',
				]
			);
			
			$document->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'label' => esc_html__( 'Page Heading Font', 'textdomain' ),
					'name' => 'page_heading_font',
					'selector' => '{{WRAPPER}} h1, h2, h3, h4, h5, h6',
				]
			);

			$document->end_controls_section();
		}


	}

	if ( class_exists('Turner_Elementor_Widget_Init') ){
		Turner_Elementor_Widget_Init::getInstance();
	}

}//end if