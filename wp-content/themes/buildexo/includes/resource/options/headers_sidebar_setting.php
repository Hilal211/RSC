<?php

return  array(
    'title'      => esc_html__( 'Headers Sidebar Setting', 'buildexo' ),
    'id'         => 'headers_sidebar_setting',
    'desc'       => '',
    'icon'       => 'el el-wrench',
    'fields'     => array(
        array(
            'id' => 'show_sidebar_icon_v2',
            'type' => 'switcher',
            'title' => esc_html__('Enable Sidebar Info', 'buildexo'),
            'default' => false,
        ),
		array(
			'id'       => 'sidebar_title_v2',
			'type'     => 'text',
			'title'    => esc_html__( 'Title', 'buildexo' ),
			'desc'     => esc_html__( 'Enter The Title', 'buildexo' ),
			'dependency' => array(
				array( 'show_sidebar_icon_v2', '==', true ),
			),
		),
		array(
			'id'       => 'sidebar_text_v2',
			'type'     => 'textarea',
			'title'    => esc_html__( 'Description', 'buildexo' ),
			'desc'     => esc_html__( 'Enter The Description', 'buildexo' ),
			'dependency' => array(
				array( 'show_sidebar_icon_v2', '==', true ),
			),
		),
		//Social Media
		array(
			'id'       => 'show_social_media_v2',
			'type'     => 'switcher',
			'title'    => esc_html__( 'Enable Social Media', 'buildexo' ),
			'desc'     => esc_html__( 'Enable/Disable Social Media.', 'buildexo' ),
			'default'  => '',
			'dependency' => array(
				array( 'show_sidebar_icon_v2', '==', true ),
			),
		),
		array(
			'id'       => 'sidebar_social_title_v2',
			'type'     => 'text',
			'title'    => esc_html__( 'Social Title', 'buildexo' ),
			'desc'     => esc_html__( 'Enter The Contact Title', 'buildexo' ),
			'dependency' => array(
				array( 'show_social_media_v2', '==', true ),
			),
		),
		array(
			'id'    => 'social_media_v2',
			'type'  => 'repeater',
			'title' => esc_html__( 'Social Media', 'buildexo' ),
			'fields'	=> array(
				array(
					'id'       => 'url',
					'type'     => 'text',
					'title'    => esc_html__( 'URL', 'buildexo' ),
					'desc'     => esc_html__( 'Enter the URL of social Profile', 'buildexo' ),
				),
				array(
					'id'       => 'icon',
					'type'     => 'icon',
					'title'    => esc_html__( 'Icon', 'buildexo' ),
					'desc'     => esc_html__( 'Choose the icon', 'buildexo' ),
				),
				array(
					'id'       => 'color',
					'type'     => 'color',
					'title'    => esc_html__( 'Color', 'buildexo' ),
					'desc'     => esc_html__( 'Choose the color', 'buildexo' ),
				),
				array(
					'id'       => 'background',
					'type'     => 'color',
					'title'    => esc_html__( 'Background Color', 'buildexo' ),
					'desc'     => esc_html__( 'Choose the background color', 'buildexo' ),
				),
			),
			'dependency' => array(
				array( 'show_social_media', '==', true ),
			),
		),
		
		array(
            'id' => 'show_gallery_v2',
            'type' => 'switcher',
            'title' => esc_html__('Enable/Disable Gallery', 'buildexo'),
            'default' => false,
        ),
		array(
			'id'       => 'sidebar_gallery_title',
			'type'     => 'text',
			'title'    => esc_html__( 'Gallery Title', 'buildexo' ),
			'desc'     => esc_html__( 'Enter The Gallery Title', 'buildexo' ),
			'dependency' => array(
				array( 'show_gallery_v2', '==', true ),
			),
		),
		array(
			'id'       => 'gallery_imgs',
			'type'     => 'gallery',
			'url'      => true,
			'title'    => esc_html__('Gallery Image', 'buildexo'),
			'desc'     => esc_html__('Insert Gallery Image URl', 'buildexo'),
			'dependency' => array(
				array( 'show_gallery_v2', '==', true ),
			),
		),
		
	),
);
