<?php
return array(
	'title'      => esc_html__( '404 Page Settings', 'buildexo' ),
	'id'         => '404_setting',
	'desc'       => '',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'      => '404_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( '404 Source Type', 'buildexo' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'buildexo' ),
				'e' => esc_html__( 'Elementor', 'buildexo' ),
			),
			'default' => 'd',
		),
		array(
			'id'       => '404_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'buildexo' ),
			'options'     => 'posts',
			'query_args'     => [
				'post_type' => [ 'elementor_library' ],
			],
			'dependency' => array( '404_source_type', '==', 'e' ),
		),
		array(
			'id'       => '404_default_st',
			'type'     => 'heading',
			'content'    => esc_html__( '404 Default', 'buildexo' ),
			'dependency' => [ '404_source_type', '==', 'd' ],
		),
		array(
			'id'      => '404_page_banner',
			'type'    => 'switcher',
			'title'   => esc_html__( 'Show Banner', 'buildexo' ),
			'desc'    => esc_html__( 'Enable to show banner on blog', 'buildexo' ),
			'default' => true,
			'dependency' => [ '404_source_type', '==', 'd' ],
		),
		array(
			'id'       => '404_banner_title',
			'type'     => 'text',
			'title'    => esc_html__( 'Banner Section Title', 'buildexo' ),
			'desc'     => esc_html__( 'Enter the title to show in banner section', 'buildexo' ),
			'dependency' => [
				array( '404_page_banner', '==', true ),
				[ '404_source_type', '==', 'd' ],
			],
		),
		array(
			'id'       => '404_page_background',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Background Image', 'buildexo' ),
			'desc'     => esc_html__( 'Insert background image for banner', 'buildexo' ),
			'default'  => array(
				'url' => TURNER_URI . 'assets/images/background/1.jpg',
			),
			'dependency' => [
				array( '404_page_banner', '==', true ),
				[ '404_source_type', '==', 'd' ],
			],
		),
		array(
			'id'       => 'error_page_image',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Error Image', 'buildexo' ),
			'desc'     => esc_html__( 'Insert error image', 'buildexo' ),
			'default'  => '',
			'dependency' => array( '404_source_type', '==', 'd' ),
		),
		array(
			'id'    => '404-page_title',
			'type'  => 'text',
			'title' => esc_html__( '404 Title', 'buildexo' ),
			'desc'  => esc_html__( 'Enter 404 section title that you want to show', 'buildexo' ),
			'dependency'	=> array( '404_source_type', '==', 'd' ),
		),
		array(
			'id'    => 'back_home_btn',
			'type'  => 'switcher',
			'title' => esc_html__( 'Show Button', 'buildexo' ),
			'desc'  => esc_html__( 'Enable to show back to home button.', 'buildexo' ),
			'default'  => true,
			'dependency'	=> array( '404_source_type', '==', 'd' ),
		),
		array(
			'id'       => 'back_home_btn_label',
			'type'     => 'text',
			'title'    => esc_html__( 'Button Label', 'buildexo' ),
			'desc'     => esc_html__( 'Enter back to home button label that you want to show.', 'buildexo' ),
			'default'  => esc_html__( 'Go Back Home', 'buildexo' ),
			'dependency' => array( 
				array( 'back_home_btn', '==', true ),
				array( '404_source_type', '==', 'd' ),
			),
		),
	),
);