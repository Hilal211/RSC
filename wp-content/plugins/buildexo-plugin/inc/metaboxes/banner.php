<?php

//
// Create a section
CSF::createSection($prefix, array(
	'title'  => esc_html__("Turner Banner Settings", "konia"),
	'fields' => array(
		array(
			'id'      => 'banner_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__('Banner Source Type', 'buildexo-plugin'),
			'options' => array(
				'd' => esc_html__('Default', 'buildexo-plugin'),
				'e' => esc_html__('Elementor', 'buildexo-plugin'),
			),
			'default' => '',
		),
		array(
			'id'       => 'banner_elementor_template',
			'type'     => 'select',
			'title'    => __('Template', 'viral-buzz'),
			'options'     => 'posts',
			'query_args'     => [
				'post_type' => ['elementor_library'],
				'posts_per_page' => -1,
			],
			'dependency' => ['banner_source_type', '==', 'e'],
		),
		array(
			'id'       => 'banner_page_banner',
			'type'     => 'switcher',
			'title'    => esc_html__('Show Banner', 'buildexo-plugin'),
			'default'  => false,
			'dependency' => ['banner_source_type', '==', 'd'],
		),
		array(
			'id'       => 'banner_banner_title',
			'type'     => 'text',
			'title'    => esc_html__('Banner Section Title', 'buildexo-plugin'),
			'desc'     => esc_html__('Enter the title to show in banner section', 'buildexo-plugin'),
			'dependency' => array('banner_page_banner', '==', true),
		),
		array(
			'id'       => 'banner_page_background',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__('Background Image', 'buildexo-plugin'),
			'desc'     => esc_html__('Insert background image for banner', 'buildexo-plugin'),
			'default'  => '',
			'dependency' => array('banner_page_banner', '==', true),
		),
	)
));

