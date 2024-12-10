<?php
//
// Create a section
CSF::createSection($prefix, array(
	'title'  => esc_html__("Turner footer Settings", "buildexo-plugin"),
	'fields' => array(
		array(
			'id'      => 'footer_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__('Footer Source Type', 'buildexo-plugin'),
			'options' => array(
				'd'    => esc_html__('Default', 'buildexo-plugin'),
				'e'    => esc_html__('Elementor', 'buildexo-plugin'),
			),
			'default' => '',
		),
		array(
			'id'       => 'footer_elementor_template',
			'type'     => 'select',
			'title'    => __('Template', 'viral-buzz'),
			'options'     => 'posts',
			'query_args'     => [
				'post_type' => ['elementor_library'],
				'posts_per_page' => -1,
				'orderby'  => 'title',
				'order'     => 'DESC'
			],
			'dependency' => ['footer_source_type', '==', 'e'],
		),
		array(
			'id'       => 'footer_style_settings',
			'type'     => 'image_select',
			'title'    => esc_html__('Choose Footer Styles', 'buildexo-plugin'),
			'options'  => array(
				'footer_v1' => get_template_directory_uri() . '/assets/images/redux/footer/footer1.png',
				'footer_v2' => get_template_directory_uri() . '/assets/images/redux/footer/footer2.png',
				'footer_v3' => get_template_directory_uri() . '/assets/images/redux/footer/footer3.png',				
			),
			'dependency' => array(array('footer_source_type', '==', 'd')),
		),
	)
));
