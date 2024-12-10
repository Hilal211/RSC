<?php
//
// Set a unique slug-like ID
$prefix = 'turner_meta_careers';
//
// Create a metabox
CSF::createMetabox( $prefix, array(
	'title'      	=> 'Turner Career Setting',
	'icon'       	=> 'el el-cogs',
	'position'   	=> 'normal',
	'priority'   	=> 'core',
	'post_type' 	=> array( 'career' ),
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
			'id'    => 'career_image',
			'type'  => 'media',
			'url'      => true,
			'title' => esc_html__( 'Thumb Image', 'buildexo-plugin' ),						
		),
		array(
			'id'    => 'career_title',
			'type'  => 'text',
			'title' => esc_html__( 'Title', 'turner' ),
		),
		array(
			'id'    => 'career_feature_list',
			'type'  => 'textarea',
			'title' => esc_html__( 'Feature List', 'turner' ),
		),
		array(
			'id'    => 'career_skills_title',
			'type'  => 'text',
			'title' => esc_html__( 'Skills Title', 'turner' ),
		),
		array(
			'id'    => 'career_feature_list_v2',
			'type'  => 'textarea',
			'title' => esc_html__( 'Feature List', 'turner' ),
		),
		array(
			'id'    => 'career_benifits_title',
			'type'  => 'text',
			'title' => esc_html__( 'Benifits Title', 'turner' ),
		),
		array(
			'id'    => 'career_feature_list_v3',
			'type'  => 'textarea',
			'title' => esc_html__( 'Feature List', 'turner' ),
		),
		array(
			'id'    => 'career_salary_title',
			'type'  => 'text',
			'title' => esc_html__( 'Salary Title', 'turner' ),
		),
		array(
			'id'    => 'career_salary',
			'type'  => 'text',
			'title' => esc_html__( 'Salary', 'turner' ),
		),		
		array(
			'id'    => 'career_info_title',
			'type'  => 'text',
			'title' => esc_html__( 'Info Title', 'turner' ),
		),
		array(
			'id'    => 'career_address_title',
			'type'  => 'text',
			'title' => esc_html__( 'Location Title', 'turner' ),
		),
		array(
			'id'    => 'career_address',
			'type'  => 'text',
			'title' => esc_html__( 'Location', 'turner' ),
		),
		array(
			'id'    => 'career_job',
			'type'  => 'text',
			'title' => esc_html__( 'Job', 'turner' ),
		),		
		array(
			'id'    => 'career_job_title',
			'type'  => 'text',
			'title' => esc_html__( 'Job Title', 'turner' ),
		),		
		array(
			'id'    => 'career_exp',
			'type'  => 'text',
			'title' => esc_html__( 'Experience', 'turner' ),
		),
		array(
			'id'    => 'career_gender',
			'type'  => 'text',
			'title' => esc_html__( 'Gender', 'turner' ),
		),
		array(
			'id'    => 'career_age',
			'type'  => 'text',
			'title' => esc_html__( 'Age Limit', 'turner' ),
		),
		array(
			'id'    => 'career_office_time',
			'type'  => 'text',
			'title' => esc_html__( 'Working Time', 'turner' ),
		),
		array(
			'id'    => 'career_date_title',
			'type'  => 'text',
			'title' => esc_html__( 'Date Title', 'turner' ),
		),
		array(
			'id'    => 'apply_end_date',
			'type'  => 'text',
			'title' => esc_html__( 'Last Date To Apply', 'turner' ),
		),
		array(
			'id'    => 'career_apply_btn_title',
			'type'  => 'text',
			'title' => esc_html__( 'Apply Button Title', 'turner' ),
		),
		array(
			'id'    => 'career_apply_btn_link',
			'type'  => 'text',
			'title' => esc_html__( 'Apply Button Link', 'turner' ),
		),		
	)
));
