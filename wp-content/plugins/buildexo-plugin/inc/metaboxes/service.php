<?php

//
// Set a unique slug-like ID
$prefix = 'turner_meta_service';

//
// Create a metabox
CSF::createMetabox( $prefix, array(
	'title'      	=> 'Turner Service Setting',
	'icon'       	=> 'el el-cogs',
	'position'   	=> 'normal',
	'priority'   	=> 'core',
	'post_type' 	=> array( 'service' ),
	'show_restore'       => false,
	'context'            => 'advanced',
	'nav'                => 'normal',
	'theme'              => 'dark',
	'class'              => '',
) );

//
// Create a section
CSF::createSection($prefix, array(
	'fields' => array(
		array(
			'id'    => 'service_detail_image',
			'type'  => 'media',
			'url'      => true,
			'title' => esc_html__( 'Detail Image', 'buildexo-plugin' ),						
		),
		array(
			'id'       => 'service_icon',
			'type'     => 'select',
			'title'    => esc_html__( 'Service Icons', 'buildexo-plugin' ),
			'options'  => get_fontawesome_icons(),
		),
		array(
			'id'    => 'customer_Steps_title',
			'type'  => 'text',
			'default' => esc_html__( 'Simple Steps to Process', 'buildexo-plugin' ),
			'title' => esc_html__( 'Enter Process Title', 'buildexo-plugin' ),
		),
		array(
			'id'    => 'customer_Steps_text',
			'type'  => 'textarea',
			'default' => esc_html__( 'Pellentesque aliquet est massa, sit amet tempor mi auctor nec. Mauris a nibh sed libero fermentum aliquet. Quisque sit amet faucibus magna. Donec purus mi, commodo id commodo vel, imperdiet ut mauris. Ut ultricies arcu risus, malesuada efficitur orci euismod in. Proin eleifend est risus, ac sodales nulla mollis vel.', 'buildexo-plugin' ),
			'title' => esc_html__( 'Enter Desciption', 'buildexo-plugin' ),
		),
		array(
			'id'    => 'service_feature_image',
			'type'  => 'media',
			'url'      => true,
			'title' => esc_html__( 'Feature Image', 'buildexo-plugin' ),
			'default'  => array(
				'url' => get_template_directory_uri() . '/assets/images/services/single_video.jpg',
			),			
		),
		array(
			'id'    => 'service_feature_list_v2',
			'type'  => 'textarea',
			'title' => esc_html__( 'Enter Features List', 'buildexo-plugin' ),
		),
		array(
			'id'    => 'customer_benefits_title',
			'type'  => 'text',
			'default' => esc_html__( 'Customer Benefits​', 'buildexo-plugin' ),
			'title' => esc_html__( 'Enter Customer Benefits​ Title', 'buildexo-plugin' ),
		),
		array(
			'id'    => 'customer_benefits_text',
			'type'  => 'textarea',
			'default' => esc_html__( 'Mauris a nibh sed libero fermentum aliquet. Quisque sit amet faucibus magna. Donec purus mi, commodo id commodo vel, imperdiet ut mauris. Ut ultricies arcu risus, malesuada efficitur orci euismod in. Proin eleifend est risus, ac sodales nulla mollis vel. Etiam condimentum placerat mi, sed cursus augue dignissim sit amet. Vivamus ac dolor dapibus, pharetra lorem ac, tristique metus. Quisque leo ante, tempor in quam in, vestibulum vulputate enim.', 'buildexo-plugin' ),
			'title' => esc_html__( 'Enter Customer Benefits​ Desciption', 'buildexo-plugin' ),
		),
		array(
			'id'    => 'service_feature_list',
			'type'  => 'textarea',
			'title' => esc_html__( 'Enter Features List', 'buildexo-plugin' ),
		),
		array(
			'id'    => 'customer_benefits_text2',
			'type'  => 'textarea',
			'default' => esc_html__( 'Quisque sit amet faucibus magna. Donec purus mi, commodo id commodo vel, imperdiet ut mauris. Ut ultricies arcu risus, malesuada efficitur orci euismod in. Proin eleifend est risus, ac sodales nulla mollis vel.', 'buildexo-plugin' ),
			'title' => esc_html__( 'Enter Customer Benefits​ Desciption Bottom', 'buildexo-plugin' ),
		),	
		
		array(
			'id'    => 'ext_url',
			'type'  => 'text',
			'title' => esc_html__( 'Enter Read More Link', 'buildexo-plugin' ),
		),
	)
));