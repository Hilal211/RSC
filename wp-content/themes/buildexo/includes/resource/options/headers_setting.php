<?php
return array(
	'title'      => esc_html__( 'Header Setting', 'buildexo' ),
	'id'         => 'headers_setting',
	'desc'       => '',
	'subsection' => false,
	'fields'     => array(
		array(
			'id'      => 'header_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Header Source Type', 'buildexo' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'buildexo' ),
				'e' => esc_html__( 'Elementor', 'buildexo' ),
			),
			'default' => 'd',
		),
		array(
			'id'       => 'header_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'buildexo' ),
			'options'     => 'posts',
			'query_args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page'	=> -1
			],
			'chosen'	=> true,
			'ajax'	=> true,
			'settings'	=> array(
				'min_length'	=> 1,
			),
			'dependency' => [ 'header_source_type', '==', 'e' ],
		),
		array(
		    'id'       => 'header_style_settings',
		    'type'     => 'image_select',
		    'title'    => esc_html__( 'Choose Header Styles', 'buildexo' ),
		    'subtitle' => esc_html__( 'Choose Header Styles', 'buildexo' ),
		    'options'  => array(
			    'header_v1'  => get_template_directory_uri() . '/assets/images/redux/header/header1.png',
			    'header_v2'  => get_template_directory_uri() . '/assets/images/redux/header/header2.png',
				'header_v3'  => get_template_directory_uri() . '/assets/images/redux/header/header3.png',
				'header_v4'  => get_template_directory_uri() . '/assets/images/redux/header/header4.png',
				'header_v5'  => get_template_directory_uri() . '/assets/images/redux/header/header5.png',
			),
			'dependency' => array( 'header_source_type', '==', 'd' ),
			'default' => 'header_v4',
	    ),	

		/***********************************************************************
								Header Version 1 Start
		************************************************************************/		
		array(
			'id'       => 'header_v1_settings_section_start',
			'type'     => 'heading',
			'indent'      => true,
			'content'    => esc_html__( 'Header Style One Settings', 'buildexo' ),
			'dependency' => array( 'header_source_type|header_style_settings', '==|==', 'd|header_v1' ),
		),
		//Header Top Text
		array(
            'id' => 'show_header_text_v1',
            'type' => 'switcher',
            'title' => esc_html__('Enable Header Text', 'buildexo'),
            'default' => false,
			'dependency' => array( 'header_source_type|header_style_settings', '==|==', 'd|header_v1' ),
        ),
		array(
			'id'       => 'header_text_v1',
			'type'     => 'text',
			'url'      => true,
			'title'    => esc_html__( 'Header Text', 'buildexo' ),
			'subtitle' => esc_html__( 'Insert Header Text', 'buildexo' ),
			'dependency' => array( 'show_header_text_v1|header_style_settings', '==', 'true|header_v1' ),
		),
		//Header Address & Email
		array(
            'id' => 'show_header_address_v1',
            'type' => 'switcher',
            'title' => esc_html__('Enable Header Address', 'buildexo'),
            'default' => false,
			'dependency' => array( 'header_source_type|header_style_settings', '==|==', 'd|header_v1' ),
        ),
		array(
			'id'       => 'header_address_v1',
			'type'     => 'text',
			'url'      => true,
			'title'    => esc_html__( 'Header Address', 'buildexo' ),
			'subtitle' => esc_html__( 'Insert Header Address', 'buildexo' ),
			'dependency' => array( 'show_header_address_v1|header_style_settings', '==', 'true|header_v1' ),
		),
		
		array(
			'id'       => 'header_email_v1',
			'type'     => 'text',
			'url'      => true,
			'title'    => esc_html__( 'Header Email', 'buildexo' ),
			'subtitle' => esc_html__( 'Insert Header Email', 'buildexo' ),
			'dependency' => array( 'show_header_address_v1|header_style_settings', '==', 'true|header_v1' ),
		),
		
		//Button Info
		array(
            'id' => 'show_btn_title_v1',
            'type' => 'switcher',
            'title' => esc_html__('Enable Button Title', 'buildexo'),
            'default' => false,
			'dependency' => array( 'header_source_type|header_style_settings', '==|==', 'd|header_v1' ),
        ),
		array(
			'id'       => 'btn_title_v1',
			'type'     => 'text',
			'url'      => true,
			'title'    => esc_html__( 'Button Title', 'buildexo' ),
			'subtitle' => esc_html__( 'Insert Button Title', 'buildexo' ),
			'dependency' => array( 'show_btn_title_v1|header_style_settings', '==', 'true|header_v1' ),
		),
		
		array(
			'id'       => 'btn_link_v1',
			'type'     => 'text',
			'url'      => true,
			'title'    => esc_html__( 'Button Link', 'buildexo' ),
			'subtitle' => esc_html__( 'Insert Button Link', 'buildexo' ),
			'dependency' => array( 'show_btn_title_v1|header_style_settings', '==', 'true|header_v1' ),
		),
		//Search Icon
		array(
            'id' => 'show_search_icon_v1',
            'type' => 'switcher',
            'title' => esc_html__('Enable Search Icon', 'buildexo'),
            'default' => false,
			'dependency' => array( 'header_source_type|header_style_settings', '==|==', 'd|header_v1' ),
        ),
		//Cart Icon
		array(
            'id' => 'show_shopping_cart_icon_v1',
            'type' => 'switcher',
            'title' => esc_html__('Enable Cart Icon', 'buildexo'),
            'default' => false,
			'dependency' => array( 'header_source_type|header_style_settings', '==|==', 'd|header_v1' ),
        ),
		
		/***********************************************************************
								Header Version 2 Start
		************************************************************************/
		array(
			'id'       => 'header_v2_settings_section_start',
			'type'     => 'heading',
			'indent'      => true,
			'content'    => esc_html__( 'Header Style Two Settings', 'buildexo' ),
			'dependency' => array( 'header_source_type|header_style_settings', '==|==', 'd|header_v2' ),
		),
		//Search Icon
		array(
            'id' => 'show_sidebar_cart_v2',
            'type' => 'switcher',
            'title' => esc_html__('Enable Sidebar Cart', 'buildexo'),
            'default' => false,
			'dependency' => array( 'header_source_type|header_style_settings', '==|==', 'd|header_v2' ),
        ),
		//Search Icon
		array(
            'id' => 'show_search_icon_v2',
            'type' => 'switcher',
            'title' => esc_html__('Enable Search Icon', 'buildexo'),
            'default' => false,
			'dependency' => array( 'header_source_type|header_style_settings', '==|==', 'd|header_v2' ),
        ),
		
		//Button Info
		array(
            'id' => 'show_btn_title_v2',
            'type' => 'switcher',
            'title' => esc_html__('Enable Button Title', 'buildexo'),
            'default' => false,
			'dependency' => array( 'header_source_type|header_style_settings', '==|==', 'd|header_v2' ),
        ),
		array(

			'id'       => 'btn_title_v2',
			'type'     => 'text',
			'title'    => esc_html__( 'Button Title', 'buildexo' ),
			'desc'     => esc_html__( 'Enter The Button Title', 'buildexo' ),
			'dependency' => array( 'show_btn_title_v2|header_style_settings', '==', 'true|header_v2' ),
		),
		array(
			'id'       => 'btn_link_v2',
			'type'     => 'text',
			'title'    => esc_html__( 'Button Link', 'buildexo' ),
			'desc'     => esc_html__( 'Enter The Button Link', 'buildexo' ),
			'dependency' => array( 'show_btn_title_v2|header_style_settings', '==', 'true|header_v2' ),
		),			
		
		/***********************************************************************
								Header Version 3 Start
		************************************************************************/
		array(
			'id'       => 'header_v3_settings_section_start',
			'type'     => 'heading',
			'indent'      => true,
			'content'    => esc_html__( 'Header Style Three Settings', 'buildexo' ),
			'dependency' => array( 'header_source_type|header_style_settings', '==|==', 'd|header_v3' ),
		),
		//Header Top Text
		array(
            'id' => 'show_topheader_v3',
            'type' => 'switcher',
            'title' => esc_html__('Enable Top Header', 'buildexo'),
            'default' => false,
			'dependency' => array( 'header_source_type|header_style_settings', '==|==', 'd|header_v3' ),
        ),
		array(
			'id'       => 'topheader_bg_img_v3',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Top Header Background Image', 'buildexo' ),
			'subtitle' => esc_html__( 'Insert Top Header Background Image', 'buildexo' ),
			'dependency' => array( 'show_topheader_v3|header_style_settings', '==', 'true|header_v3' ),
		),
		//Left Top Header
		array(
            'id' => 'show_topheader_left_v3',
            'type' => 'switcher',
            'title' => esc_html__('Enable Left Top Header', 'buildexo'),
            'default' => false,
			'dependency' => array( 'show_topheader_v3|header_style_settings', '==', 'true|header_v3' ),
        ),
		array(
			'id'       => 'header_text_v3',
			'type'     => 'text',
			'url'      => true,
			'title'    => esc_html__( 'Header Text', 'buildexo' ),
			'subtitle' => esc_html__( 'Insert Header Text', 'buildexo' ),
			'dependency' => array( 'show_topheader_left_v3|header_style_settings', '==', 'true|header_v3' ),
		),
		//Header Address & Email
		array(
            'id' => 'show_topheader_right_v3',
            'type' => 'switcher',
            'title' => esc_html__('Enable Right Top Header', 'buildexo'),
            'default' => false,
			'dependency' => array( 'show_topheader_v3|header_style_settings', '==', 'true|header_v3' ),
        ),
		array(
			'id'       => 'header_address_v3',
			'type'     => 'text',
			'url'      => true,
			'title'    => esc_html__( 'Header Address', 'buildexo' ),
			'subtitle' => esc_html__( 'Insert Header Address', 'buildexo' ),
			'dependency' => array( 'show_topheader_right_v3|header_style_settings', '==', 'true|header_v3' ),
		),
		
		array(
			'id'       => 'header_email_v3',
			'type'     => 'text',
			'url'      => true,
			'title'    => esc_html__( 'Header Email', 'buildexo' ),
			'subtitle' => esc_html__( 'Insert Header Email', 'buildexo' ),
			'dependency' => array( 'show_topheader_right_v3|header_style_settings', '==', 'true|header_v3' ),
		),		
		//Button Info
		array(
            'id' => 'show_btn_title_v3',
            'type' => 'switcher',
            'title' => esc_html__('Enable Button Title', 'buildexo'),
            'default' => false,
			'dependency' => array( 'header_source_type|header_style_settings', '==|==', 'd|header_v3' ),
        ),
		array(
			'id'       => 'btn_title_v3',
			'type'     => 'text',
			'url'      => true,
			'title'    => esc_html__( 'Button Title', 'buildexo' ),
			'subtitle' => esc_html__( 'Insert Button Title', 'buildexo' ),
			'dependency' => array( 'show_btn_title_v3|header_style_settings', '==', 'true|header_v3' ),
		),
		
		array(
			'id'       => 'btn_link_v3',
			'type'     => 'text',
			'url'      => true,
			'title'    => esc_html__( 'Button Link', 'buildexo' ),
			'subtitle' => esc_html__( 'Insert Button Link', 'buildexo' ),
			'dependency' => array( 'show_btn_title_v3|header_style_settings', '==', 'true|header_v3' ),
		),		
		//Search Icon
		array(
            'id' => 'show_search_icon_v3',
            'type' => 'switcher',
            'title' => esc_html__('Enable Search Icon', 'buildexo'),
            'default' => false,
			'dependency' => array( 'header_source_type|header_style_settings', '==|==', 'd|header_v3' ),
        ),
		//Cart Icon
		array(
            'id' => 'show_shopping_cart_icon_v3',
            'type' => 'switcher',
            'title' => esc_html__('Enable Cart Icon', 'buildexo'),
            'default' => false,
			'dependency' => array( 'header_source_type|header_style_settings', '==|==', 'd|header_v3' ),
        ),
	),

);

