<?php
//
// Create a section
CSF::createSection($prefix, array(
	'title'  => esc_html__("Turner Sidebar Settings", "buildexo-plugin"),
	'fields' => array(
		array(
			'id'      => 'sidebar_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__('Sidebar Source Type', 'buildexo-plugin'),
			'options' => array(
				'd' => esc_html__('Default', 'buildexo-plugin'),
				'e' => esc_html__('Elementor', 'buildexo-plugin'),
			),
			'default' => '',
		),
		array(
			'id'       => 'sidebar_elementor_template',
			'type'     => 'select',
			'title'    => __('Template', 'viral-buzz'),
			'options'     => 'posts',
			'query_args'     => [
				'post_type' => ['elementor_library'],
				'posts_per_page' => -1,
			],
			'dependency' => ['sidebar_source_type', '==', 'e'],
		),
		array(
			'id'       => 'sidebar_sidebar_layout',
			'type'     => 'image_select',
			'title'    => esc_html__('Layout', 'buildexo-plugin'),
			'subtitle' => esc_html__('Select main content and sidebar alignment.', 'buildexo-plugin'),
			'options'  => array(
				'left'  => get_template_directory_uri() . '/assets/images/redux/2cl.png',
				'full'  => get_template_directory_uri() . '/assets/images/redux/1col.png',
				'right' => get_template_directory_uri() . '/assets/images/redux/2cr.png',
			),
			'dependency' => ['sidebar_source_type', '==', 'd'],
		),
		array(
			'id'       => 'sidebar_page_sidebar',
			'type'     => 'select',
			'chosen'      => true,
			'ajax'        => true,
			'multiple'    => true,
			'sortable'    => true,
			'title'    => esc_html__('Sidebar', 'buildexo-plugin'),
			'dependency' => array(
				array('sidebar_sidebar_layout', 'any', 'left,right'),
				array('sidebar_source_type', '==', 'd'),
			),
			'options'  => 'sidebars',
		),
	)
));
