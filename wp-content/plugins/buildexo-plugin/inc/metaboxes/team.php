<?php


//
// Set a unique slug-like ID
$prefix = 'turner_meta_team';
//
// Create a metabox
CSF::createMetabox( $prefix, array(
	'title'      	=> 'Turner Team Setting',
	'icon'       	=> 'el el-cogs',
	'position'   	=> 'normal',
	'priority'   	=> 'core',
	'post_type' 	=> array( 'team' ),
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
			'id'    => 'team_designation',
			'type'  => 'text',
			'title' => esc_html__( 'Designation', 'turner' ),
		),
		//Team Contact Details
		array(
			'id'    => 'team_contact_info',
			'type'  => 'group',			
			'title' => esc_html__( 'Contact Details', 'turner' ),
			'fields'	=> array(
				array(
					'id'    => 'team_contact_title',
					'type'  => 'text',
					'title' => esc_html__( 'Title', 'turner' ),
					'desc'  => esc_html__( 'Enter the Contact Title', 'turner' ),
				),
				array(
					'id'    => 'team_contact_detail',
					'type'  => 'text',
					'title' => esc_html__( 'Contact Info', 'turner' ),
					'desc'  => esc_html__( 'Enter the Contact Info', 'turner' ),
				),
			),
		),
		//Social Media
		array(
			'id'    => 'team_social_title',
			'type'  => 'text',
			'title' => esc_html__( 'Social Title', 'turner' ),
		),
		array(
			'id'    => 'social_profile',
			'type'  => 'group',
			'title' => esc_html__( 'Social Profiles', 'turner' ),
			'fields'	=> array(
				array(
					'id'    => 'url',
					'type'  => 'text',
					'title' => esc_html__( 'URL', 'turner' ),
				),
				array(
					'id'    => 'icon',
					'type'  => 'icon',
					'title' => esc_html__( 'Icon', 'turner' ),
				),
				array(
					'id'    => 'background',
					'type'  => 'color',
					'title' => esc_html__( 'Background Color', 'turner' ),
				),
				array(
					'id'    => 'color',
					'type'  => 'color',
					'title' => esc_html__( 'Color', 'turner' ),
				),
			)
		),
		//Personal Info
		array(
			'id' => 'show_personal_info',
			'type' => 'switcher',
			'title' => esc_html__('Show/Hide Personal Information', 'turner'),
			'desc' => esc_html__('Enable to Show Personal Information', 'turner'),
			'default'  => false,
		),
		array(
			'id'    => 'team_personal_info_title',
			'type'  => 'text',
			'title' => esc_html__( 'Personal Info Title', 'turner' ),
			'dependency' => array('show_personal_info', '==', true),
		),
		array(
			'id'    => 'team_personal_info_description',
			'type'  => 'textarea',
			'title' => esc_html__( 'Personal Info Description', 'turner' ),
			'dependency' => array('show_personal_info', '==', true),
		),
		//Contact with Me Section
		array(
			'id' => 'show_contact_me',
			'type' => 'switcher',
			'title' => esc_html__('Show/Hide Contact with Me Section', 'turner'),
			'desc' => esc_html__('Enable to Show Contact with Me Section', 'turner'),
			'default'  => false,
		),		
		array(
			'id'    => 'team_form_title',
			'type'  => 'text',
			'title' => esc_html__( 'Contact Form Title', 'turner' ),
			'dependency' => array('show_contact_me', '==', true),
		),
		array(
			'id'    => 'team_form_text',
			'type'  => 'textarea',
			'title' => esc_html__( 'Contact Form Description', 'turner' ),
			'dependency' => array('show_contact_me', '==', true),
		),
		array(
			'id'    => 'team_form_url',
			'type'  => 'text',
			'title' => esc_html__( 'Contact Form Url', 'turner' ),
			'dependency' => array('show_contact_me', '==', true),
		),	
	)
));
