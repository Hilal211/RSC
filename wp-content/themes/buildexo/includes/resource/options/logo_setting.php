<?php
return array(
	'title'      => esc_html__( 'Logo Setting', 'buildexo' ),
	'id'         => 'logo_setting',
	'desc'       => '',
	'subsection' => false,
	'fields'     => array(
		array(
			'id'       => 'image_favicon',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Favicon', 'buildexo' ),
			'subtitle' => esc_html__( 'Insert site favicon image', 'buildexo' ),
			'default'  => array( 'url' => get_template_directory_uri() . '/assets/images/favicon.ico' ),
			//'dependency' => array( array( 'logo_type', 'equals', 'image' ) ),
		),
		array(
            'id' => 'normal_logo_show',
            'type' => 'switcher',
            'title' => esc_html__('Enable Light Color Logo V1', 'buildexo'),
            'default' => true,
        ),
		array(
			'id'       => 'light_image_logo',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Light Color Logo V1', 'buildexo' ),
			'subtitle' => esc_html__( 'Insert site Light Color Logo image V1', 'buildexo' ),
			'default'  => array( 'url' => get_template_directory_uri() . '/assets/images/logo.png' ),
			'dependency' => array( 'normal_logo_show', '==', true ),
		),
		array(
			'id'       => 'light_logo_dimension',
			'type'     => 'dimensions',
			'title'    => esc_html__( 'Light Color Logo Dimentions V1', 'buildexo' ),
			'subtitle' => esc_html__( 'Select Light Color Logo Dimentions V1', 'buildexo' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
			'dependency' => array( 'normal_logo_show', '==', true ),
		),
		array(
            'id' => 'normal_logo_show2',
            'type' => 'switcher',
            'title' => esc_html__('Enable Dark Color Logo', 'buildexo'),
            'default' => true,
        ),
		array(
			'id'       => 'dark_image_logo',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Dark Color Logo', 'buildexo' ),
			'subtitle' => esc_html__( 'Insert site Dark Color logo image', 'buildexo' ),
			'default'  => array( 'url' => get_template_directory_uri() . '/assets/images/logo-2.png' ),
			'dependency' => array( 'normal_logo_show2', '==', true ),
		),
		array(
			'id'       => 'dark_logo_dimension',
			'type'     => 'dimensions',
			'title'    => esc_html__( 'Dark Color Logo Dimentions', 'buildexo' ),
			'subtitle' => esc_html__( 'Select Dark Color Logo Dimentions', 'buildexo' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
			'dependency' => array( 'normal_logo_show2', '==', true ),
		),
	),
);
