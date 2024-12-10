<?php
return array(
	'title'      => esc_html__( 'Footer Setting', 'buildexo' ),
	'id'         => 'footer_setting',
	'desc'       => '',
	'subsection' => false,
	'fields'     => array(		
		array(
			'id'      => 'footer_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Footer Source Type', 'buildexo' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'buildexo' ),
				'e' => esc_html__( 'Elementor', 'buildexo' ),
			),
			'default' => 'd',
		),
		array(
			'id'       => 'footer_elementor_template',
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
			'dependency' => [ 'footer_source_type', '==', 'e' ],
		),
		
		array(
		    'id'       => 'footer_style_settings',
		    'type'     => 'image_select',
		    'title'    => esc_html__( 'Choose Footer Styles', 'buildexo' ),
		    'subtitle' => esc_html__( 'Choose Footer Styles', 'buildexo' ),
		    'options'  => array(
			    'footer_v1'  => get_template_directory_uri() . '/assets/images/redux/footer/footer1.png',
			    'footer_v2'  => get_template_directory_uri() . '/assets/images/redux/footer/footer2.png',
				'footer_v3'  => get_template_directory_uri() . '/assets/images/redux/footer/footer3.png',
			),
			'dependency' => array( 'footer_source_type', '==', 'd' ),
			'default' => 'footer_v1',
	    ),	
			
		/***********************************************************************
								Footer Version 1 Start
		************************************************************************/
		array(
			'id'       => 'footer_v1_settings_section_start',
			'type'     => 'heading',
			'indent'      => true,
			'content'    => esc_html__( 'Footer Style One Settings', 'buildexo' ),
			'dependency' => array( 'footer_source_type|footer_style_settings', '==|==', 'd|footer_v1' ),
		),
		//Footer Gallery
		array(
			'id'       => 'show_footer_gallery_v1',
			'type'     => 'switcher',
			'title'    => esc_html__( 'Enable Gallery', 'buildexo' ),
			'desc'     => esc_html__( 'Enable/Disable Gallery.', 'buildexo' ),
			'default'  => 'false',
			'dependency' => array( 'footer_source_type|footer_style_settings', '==|==', 'd|footer_v1' ),
		),
		array(
            'id' => 'query_number',
            'type'    => 'number',
            'title' => esc_html__('Number of post', 'buildexo'),
			'desc'     => esc_html__( 'Enter The Number of post', 'buildexo' ),
            'dependency' => array( 'show_footer_gallery_v1|footer_style_settings', '==', 'true|footer_v1' ),
        ),
		array(
            'id' => 'query_category',
            'type' => 'select',
            'title' => esc_html__('Category', 'buildexo'),
			'desc'     => esc_html__( 'Select The Category', 'buildexo' ),
            'dependency' => array( 'show_footer_gallery_v1|footer_style_settings', '==', 'true|footer_v1' ),
			'options' => get_project_categories()
        ),
		//Footer Contact Info
		array(
			'id'       => 'show_footer_info_section_v1',
			'type'     => 'switcher',
			'title'    => esc_html__( 'Enable Contact Info', 'buildexo' ),
			'desc'     => esc_html__( 'Enable/Disable Contact Info.', 'buildexo' ),
			'default'  => 'false',
			'dependency' => array( 'footer_source_type|footer_style_settings', '==|==', 'd|footer_v1' ),
		),
		array(
			'id'      => 'footer_phone_title_v1',
			'type'    => 'text',
			'title'   => __( 'Phone Title', 'buildexo' ),
			'desc'    => esc_html__( 'Enter the Phone Title', 'buildexo' ),
			'dependency' => array( 'show_footer_info_section_v1|footer_style_settings', '==', 'true|footer_v1' ),
		),
		array(
			'id'      => 'footer_phone_no_v1',
			'type'    => 'text',
			'title'   => __( 'Phone Number', 'buildexo' ),
			'desc'    => esc_html__( 'Enter the Phone Number', 'buildexo' ),
			'dependency' => array( 'show_footer_info_section_v1|footer_style_settings', '==', 'true|footer_v1' ),
		),
		//Social Media
		array(
			'id'       => 'show_footer_social_media_v1',
			'type'     => 'switcher',
			'title'    => esc_html__( 'Enable Social Media', 'buildexo' ),
			'desc'     => esc_html__( 'Enable/Disable Social Media.', 'buildexo' ),
			'default'  => 'false',
			'dependency' => array( 'show_footer_info_section_v1|footer_style_settings', '==', 'true|footer_v1' ),
		),
		array(
			'id'    => 'footer_social_media_v1',
			'type'  => 'repeater',
			'title' => esc_html__( 'Social Media', 'buildexo' ),
			'fields'	=> array(
				array(
					'id'       => 'socail_title',
					'type'     => 'text',
					'title'    => esc_html__( 'Title', 'buildexo' ),
					'desc'     => esc_html__( 'Enter the title of social Profile', 'buildexo' ),
				),
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
			'dependency' => array( 'show_footer_social_media_v1|footer_style_settings', '==', 'true|footer_v1' ),
		),
		array(
			'id'      => 'footer_form_title_v1',
			'type'    => 'text',

			'title'   => __( 'MailChimp Form Title', 'buildexo' ),
			'desc'    => esc_html__( 'Enter the MailChimp Form Title', 'buildexo' ),
			'dependency' => array( 'show_footer_info_section_v1|footer_style_settings', '==', 'true|footer_v1' ),
		),
		array(
			'id'      => 'footer_form_url_v1',
			'type'    => 'text',
			'title'   => __( 'MailChimp Form Url', 'buildexo' ),
			'desc'    => esc_html__( 'Enter the MailChimp Form Url', 'buildexo' ),
			'dependency' => array( 'show_footer_info_section_v1|footer_style_settings', '==', 'true|footer_v1' ),
		),		
		
		//Copy Rights Text
		array(
			'id'      => 'copyright_text1',
			'type'    => 'text',
			'title'   => __( 'Copyright Text', 'buildexo' ),
			'desc'    => esc_html__( 'Enter the Copyright Text', 'buildexo' ),
			'dependency' => array( 'footer_source_type|footer_style_settings', '==|==', 'd|footer_v1' ),
		),
		/***********************************************************************
								Footer Version 2 Start
		************************************************************************/
		array(
			'id'       => 'footer_v2_settings_section_start',
			'type'     => 'heading',
			'indent'      => true,
			'content'    => esc_html__( 'Footer Style Two Settings', 'buildexo' ),
			'dependency' => array( 'footer_source_type|footer_style_settings', '==|==', 'd|footer_v2' ),
		),
		array(
			'id'       => 'footer_bg_img_v2',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Footer Background Image', 'buildexo' ),
			'subtitle' => esc_html__( 'Insert Footer Background Image', 'buildexo' ),
			'dependency' => array( 'footer_source_type|footer_style_settings', '==|==', 'd|footer_v2' ),
		),
		array(
			'id'       => 'footer_cta_bg_img_v2',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Footer CTA BG Image', 'buildexo' ),
			'subtitle' => esc_html__( 'Insert Footer CTA BG Image', 'buildexo' ),
			'dependency' => array( 'footer_source_type|footer_style_settings', '==|==', 'd|footer_v2' ),
		),		
		//Call To Action Text
		array(
			'id'      => 'footer_newsletter_text_v2',
			'type'    => 'text',
			'title'   => __( 'CTA Description', 'buildexo' ),
			'desc'    => esc_html__( 'Enter the CTA Description', 'buildexo' ),
			'dependency' => array( 'footer_source_type|footer_style_settings', '==|==', 'd|footer_v2' ),
		),
		//About Us Button Info
		array(
			'id'      => 'footer_btn_title_v2',
			'type'    => 'text',
			'title'   => __( 'Button Title', 'buildexo' ),
			'desc'    => esc_html__( 'Enter the Button Title', 'buildexo' ),
			'dependency' => array( 'footer_source_type|footer_style_settings', '==|==', 'd|footer_v2' ),
		),
		array(
			'id'      => 'footer_btn_link_v2',
			'type'    => 'text',
			'title'   => __( 'Button Link', 'buildexo' ),
			'desc'    => esc_html__( 'Enter the Button Link', 'buildexo' ),
			'dependency' => array( 'footer_source_type|footer_style_settings', '==|==', 'd|footer_v2' ),
		),		
		//Copy Rights Text
		array(
			'id'      => 'copyright_text2',
			'type'    => 'text',
			'title'   => __( 'Copyright Text', 'buildexo' ),
			'desc'    => esc_html__( 'Enter the Copyright Text', 'buildexo' ),
			'dependency' => array( 'footer_source_type|footer_style_settings', '==|==', 'd|footer_v2' ),
		),
		
		/***********************************************************************
								Footer Version 3 Start
		************************************************************************/
		array(
			'id'       => 'footer_v3_settings_section_start',
			'type'     => 'heading',
			'indent'      => true,
			'content'    => esc_html__( 'Footer Style Three Settings', 'buildexo' ),
			'dependency' => array( 'footer_source_type|footer_style_settings', '==|==', 'd|footer_v3' ),
		),
		array(
			'id'       => 'footer_bg_img_v3',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Footer Background Image', 'buildexo' ),
			'subtitle' => esc_html__( 'Insert Footer Background Image', 'buildexo' ),
			'dependency' => array( 'footer_source_type|footer_style_settings', '==|==', 'd|footer_v3' ),
		),
		//Copy Rights Text
		array(
			'id'      => 'copyright_text3',
			'type'    => 'text',
			'title'   => __( 'Copyright Text', 'buildexo' ),
			'desc'    => esc_html__( 'Enter the Copyright Text', 'buildexo' ),
			'dependency' => array( 'footer_source_type|footer_style_settings', '==|==', 'd|footer_v3' ),
		),		
				
	),
);
