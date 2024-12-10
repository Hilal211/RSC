<?php



return array(

	'title'      => esc_html__( 'Author Page Settings', 'buildexo' ),

	'id'         => 'author_setting',

	'desc'       => '',

	'subsection' => true,

	'fields'     => array(

		array(

			'id'      => 'author_source_type',

			'type'    => 'button_set',

			'title'   => esc_html__( 'Author Source Type', 'buildexo' ),

			'options' => array(

				'd' => esc_html__( 'Default', 'buildexo' ),

				'e' => esc_html__( 'Elementor', 'buildexo' ),

			),

			'default' => 'd',

		),

		array(

			'id'       => 'author_elementor_template',

			'type'     => 'select',

			'title'    => __( 'Template', 'buildexo' ),

			'options'     => 'posts',

			'query_args'     => [

				'post_type' => [ 'elementor_library' ],

				'posts_per_page'=> -1,

			],

			'dependency' => [ 'author_source_type', '==', 'e' ],

		),



		array(

			'id'       => 'author_default_st',

			'type'     => 'heading',

			'content'    => esc_html__( 'Author Default', 'buildexo' ),

			'indent'   => true,

			'dependency' => [

				[ 'author_source_type', '==', 'd' ]

			],

		),

		array(

			'id'      => 'author_page_banner',

			'type'    => 'switcher',

			'title'   => esc_html__( 'Show Banner', 'buildexo' ),

			'desc'    => esc_html__( 'Enable to show banner on blog', 'buildexo' ),

			'default' => true,

			'dependency' => [

				[ 'author_source_type', '==', 'd' ]

			],

		),

		array(

			'id'       => 'author_banner_title',

			'type'     => 'text',

			'title'    => esc_html__( 'Banner Section Title', 'buildexo' ),

			'desc'     => esc_html__( 'Enter the title to show in banner section', 'buildexo' ),

			'dependency' => [

				array( 'author_page_banner', '==', true ),

				[ 'author_source_type', '==', 'd' ]

			],

		),

		array(

			'id'       => 'author_page_background',

			'type'     => 'media',

			'url'      => true,

			'title'    => esc_html__( 'Background Image', 'buildexo' ),

			'desc'     => esc_html__( 'Insert background image for banner', 'buildexo' ),

			'default'  => array(

				'url' => TURNER_URI . 'assets/images/background/1.jpg',

			),

			'dependency' => [

				array( 'author_page_banner', '==', true ),

				[ 'author_source_type', '==', 'd' ]

			],

		),



		array(

			'id'       => 'author_sidebar_layout',

			'type'     => 'image_select',

			'title'    => esc_html__( 'Layout', 'buildexo' ),

			'subtitle' => esc_html__( 'Select main content and sidebar alignment.', 'buildexo' ),

			'options'  => array(

				'left'  => get_template_directory_uri() . '/assets/images/redux/2cl.png',

				'full' => get_template_directory_uri() . '/assets/images/redux/1col.png',

				'right' => get_template_directory_uri() . '/assets/images/redux/2cr.png',

			),



			'default' => 'right',

			'dependency' => [

				[ 'author_source_type', '==', 'd' ]

			],

		),



		array(

			'id'       => 'author_page_sidebar',

			'type'     => 'select',

			'title'    => esc_html__( 'Sidebar', 'buildexo' ),

			'desc'     => esc_html__( 'Select sidebar to show at blog listing page', 'buildexo' ),

			'dependency' => array(

				array( 'author_sidebar_layout', '!=', 'full' ),

				[ 'author_source_type', '==', 'd' ]

			),

			'options'  => 'sidebars',

		),

	),

);











