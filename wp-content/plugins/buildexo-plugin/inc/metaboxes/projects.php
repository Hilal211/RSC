<?php
//
// Set a unique slug-like ID
$prefix = 'turner_meta_projects';
//
// Create a metabox
CSF::createMetabox( $prefix, array(
	'title'      	=> 'Turner Project Setting',
	'icon'       	=> 'el el-cogs',
	'position'   	=> 'normal',
	'priority'   	=> 'core',
	'post_type' 	=> array( 'project' ),
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
			'id'    => 'project_feature_image',
			'type'  => 'media',
			'url'      => true,
			'title' => esc_html__( 'Feature Image', 'buildexo-plugin' ),					
		),
		array(
			'id'    => 'project_info_title',
			'type'  => 'text',
			'title' => esc_html__( 'Category Title', 'turner' ),
		),
		array(
			'id'    => 'project_title',
			'type'  => 'text',
			'title' => esc_html__( 'Project Title', 'turner' ),
		),
		array(
			'id'    => 'project_name',
			'type'  => 'text',
			'title' => esc_html__( 'Project Name', 'turner' ),
		),
		array(
			'id'    => 'project_cat_title',
			'type'  => 'text',
			'title' => esc_html__( 'Category Title', 'turner' ),
		),		
		array(
			'id'    => 'project_date_title',
			'type'  => 'text',
			'title' => esc_html__( 'Start Date Title', 'turner' ),
		),
		array(
			'id'    => 'project_date',
			'type'  => 'text',
			'title' => esc_html__( 'Start Project Date', 'turner' ),
		),
		array(
			'id'    => 'project_end_date_title',
			'type'  => 'text',
			'title' => esc_html__( 'End Date Title', 'turner' ),
		),
		array(
			'id'    => 'project_end_date',
			'type'  => 'text',
			'title' => esc_html__( 'End Project Date', 'turner' ),
		),
		array(
			'id'    => 'project_tags_title',
			'type'  => 'text',
			'title' => esc_html__( 'Tags Title', 'turner' ),
		),
		array(
			'id'    => 'project_tags',
			'type'  => 'text',
			'title' => esc_html__( 'Tags', 'turner' ),
		),
		array(
			'id'    => 'project_price',
			'type'  => 'text',
			'title' => esc_html__( 'Project Price', 'turner' ),
		),		
		array(
			'id'    => 'project_price_title',
			'type'  => 'text',
			'title' => esc_html__( 'Project Price Title', 'turner' ),
		),
		array(
			'id'    => 'project_location',
			'type'  => 'text',
			'title' => esc_html__( 'Project Location', 'turner' ),
		),
		array(
			'id'    => 'project_builder',
			'type'  => 'text',
			'title' => esc_html__( 'Project Builder Name', 'turner' ),
		),
		array(
			'id'    => 'project_video_link',
			'type'  => 'text',
			'title' => esc_html__( 'Video Url', 'turner' ),
		),
		array(
			'id'    => 'social_profile2',
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
	)
));
