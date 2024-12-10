<?php
//
// Create a section
CSF::createSection($prefix, array(
	'title'  => esc_html__("Turner Header Settings", "buildexo-plugin"),
	'fields' => array(
		array(
			'id'      => 'header_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__('Header Source Type', 'buildexo-plugin'),
			'options' => array(
				'd' => esc_html__('Default', 'buildexo-plugin'),
				'e' => esc_html__('Elementor', 'buildexo-plugin'),
			),
			'default' => '',
		),
		array(
			'id'       => 'header_new_elementor_template',
			'type'     => 'select',
			'title'    => __('Template', 'buildexo-plugin'),
			'options'     => 'posts',
			'query_args'     => [
				'post_type' => ['elementor_library'],
				'posts_per_page' => -1,
				'orderby'  => 'title',
				'order'     => 'DESC'
			],
			'dependency' => ['header_source_type', '==', 'e'],
		),
		array(
			'id'       => 'header_style_settings',
			'type'     => 'image_select',
			'title'    => esc_html__('Choose Header Styles', 'buildexo-plugin'),
			'options'  => array(
				'header_v1' => get_template_directory_uri() . '/assets/images/redux/header/header1.png',
				'header_v2' => get_template_directory_uri() . '/assets/images/redux/header/header2.png',
				'header_v3'  => get_template_directory_uri() . '/assets/images/redux/header/header3.png',
				'header_v4'  => get_template_directory_uri() . '/assets/images/redux/header/header4.png',
				'header_v5'  => get_template_directory_uri() . '/assets/images/redux/header/header5.png',
			),
			'dependency' => array(array('header_source_type', '==', 'd')),
		),
		array(
			'id'      => 'onepagemenu',
			'type'    => 'switcher',
			'title'   => 'Onepage Menu',
			'label'   => 'Do you want activate Onepage Menu ?',
			'default' => false
		),
		array(
			'id'      => 'enable_boxed_layout',
			'type'    => 'switcher',
			'title'   => 'Enable Boxed Layout',
			'label'   => 'Do you want Enable Boxed Layout ?',
			'default' => false
		),
		array(
			'id'    => 'box_bg_image',
			'type'  => 'media',
			'title' => 'Media',
			'dependency' => array( 'enable_boxed_layout', '==', 'true' ),
		),
		
	)
));
