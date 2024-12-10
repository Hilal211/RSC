<?php

return array(

	'title'      => esc_html__( 'Header 1 Setting', 'buildexo' ),

	'id'         => 'header_setting',

	'desc'       => '',

	'subsection' => true,

	'fields'     => array(

		array(

			'id'      => 'logo_type',

			'type'    => 'button_set',

			'title'   => esc_html__( 'Logo Style', 'buildexo' ),

			'desc'    => esc_html__( 'Select anyone logo style to show in header', 'buildexo' ),

			'options' => array(

				'image' => esc_html__( 'Image Logo', 'buildexo' ),

				'text'  => esc_html__( 'Text Logo', 'buildexo' ),

			),

			'default' => 'image',

		),

		array(

			'id'       => 'image_logo',

			'type'     => 'media',

			'url'      => true,

			'title'    => esc_html__( 'Logo', 'buildexo' ),

			'subtitle' => esc_html__( 'Insert site logo image with adjustable size for the logo section', 'buildexo' ),

			'default'  => array( 'url' => get_template_directory_uri() . '/assets/images/logo-2.png' ),

			'dependency' => array( array( 'logo_type', 'equals', 'image' ) ),

		),

		array(

			'id'       => 'logo_dimension',

			'type'     => 'dimensions',

			'title'    => esc_html__( 'Logo Dimentions', 'buildexo' ),

			'subtitle' => esc_html__( 'Select Logo Dimentions', 'buildexo' ),

			'units'    => array( 'em', 'px', '%' ),

			'default'  => array( 'Width' => '', 'Height' => '' ),

			'dependency' => array(

				array( 'logo_type', 'equals', 'image' ),

			),

		),

		array(

			'id'       => 'logo_text',

			'type'     => 'text',

			'title'    => esc_html__( 'Logo Text', 'buildexo' ),

			'subtitle' => esc_html__( 'Enter Logo Text', 'buildexo' ),

			'dependency' => array(

				array( 'logo_type', 'equals', 'text' ),

			),

		),

		array(

			'id'          => 'logo_typography',

			'type'        => 'typography',

			'title'       => esc_html__( 'Typography', 'buildexo' ),

			'google'      => true,

			'font-backup' => false,

			'text-align'  => false,

			'line-height' => false,

			'output'      => array( 'h2.site-description' ),

			'units'       => 'px',

			'subtitle'    => esc_html__( 'Select Styles for text logo', 'buildexo' ),

			'default'     => array(

				'color'       => '#333',

				'font-style'  => '700',

				'font-family' => 'Abel',

				'google'      => true,

				'font-size'   => '33px',

			),

			'required'    => array(

				array( 'logo_type', 'equals', 'text' ),

			),

		),



		array(

			'id'    => 'header_social_share',

			'type'  => 'social_media',

			'title' => esc_html__( 'Social Profiles', 'buildexo' ),

			'desc'  => esc_html__( 'Click an icon to activate social profile icons in header.', 'buildexo' ),

		),

	),

);

