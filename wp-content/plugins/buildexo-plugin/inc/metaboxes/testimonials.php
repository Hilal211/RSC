<?php
//
// Set a unique slug-like ID
$prefix = 'turner_meta_testimonials';
//
// Create a metabox
CSF::createMetabox( $prefix, array(
	'title'      	=> 'Turner Testimonial Setting',
	'icon'       	=> 'el el-cogs',
	'position'   	=> 'normal',
	'priority'   	=> 'core',
	'post_type' 	=> array( 'testimonials' ),
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
			'id'    => 'test_designation',
			'type'  => 'text',
			'title' => esc_html__( 'Author Designation', 'buildexo-plugin' ),
		),
		array(
			'id'    => 'testi_author_name',
			'type'  => 'text',
			'title' => esc_html__( 'Author Name', 'buildexo-plugin' ),
		),
		array(
			'id'    => 'testimonial_rating',
			'type'  => 'select',
			'title' => esc_html__( 'Choose the Rating', 'buildexo-plugin' ),
			'options'  => array(
				'1' => '1',
				'2' => '2',
				'3' => '3',
				'4' => '4',
				'5' => '5',
			),
		),		
	)
));
