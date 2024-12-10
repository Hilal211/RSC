<?php



return  array(

    'title'      => esc_html__( 'Category Page Settings', 'buildexo' ),

    'id'         => 'category_setting',

    'desc'       => '', 

    'subsection' => true,

    'fields'     => array(

	    array(

		    'id'      => 'category_source_type',

		    'type'    => 'button_set',

		    'title'   => esc_html__( 'Category Source Type', 'buildexo' ),

		    'options' => array(

			    'd' => esc_html__( 'Default', 'buildexo' ),

			    'e' => esc_html__( 'Elementor', 'buildexo' ),

		    ),

		    'default' => 'd',

	    ),

	    array(

		    'id'       => 'category_elementor_template',

		    'type'     => 'select',

		    'title'    => __( 'Template', 'buildexo' ),

		    'options'     => 'posts',

		    'query_args'     => [

			    'post_type' => [ 'elementor_library' ],

				'posts_per_page'=> -1,

		    ],

		    'dependency' => [ 'category_source_type', '==', 'e' ],

	    ),



	    array(

		    'id'       => 'category_default_st',

		    'type'     => 'heading',

		    'content'    => esc_html__( 'Category Default', 'buildexo' ),

		    'dependency' => [ 'category_source_type', '==', 'd' ],

	    ),

	    array(

		    'id'      => 'category_page_banner',

		    'type'    => 'switcher',

		    'title'   => esc_html__( 'Show Banner', 'buildexo' ),

		    'desc'    => esc_html__( 'Enable to show banner on blog', 'buildexo' ),

		    'default' => true,

			'dependency' => [ 'category_source_type', '==', 'd' ],

	    ),

	    array(

		    'id'       => 'category_banner_title',

		    'type'     => 'text',

		    'title'    => esc_html__( 'Banner Section Title', 'buildexo' ),

		    'desc'     => esc_html__( 'Enter the title to show in banner section', 'buildexo' ),

		    'dependency' => [

				array( 'category_page_banner', '==', true ),

				array( 'category_source_type', '==', 'd' ),

			],

	    ),

	    array(

		    'id'       => 'category_page_background',

		    'type'     => 'media',

		    'url'      => true,

		    'title'    => esc_html__( 'Background Image', 'buildexo' ),

		    'desc'     => esc_html__( 'Insert background image for banner', 'buildexo' ),

		    'default'  => array(

				'url' => TURNER_URI . 'assets/images/background/1.jpg',

			),

		    'dependency' => array(

				array( 'category_page_banner', '==', true ),

				array( 'category_source_type', '==', 'd' ),

			),

	    ),



	    array(

		    'id'       => 'category_sidebar_layout',

		    'type'     => 'image_select',

		    'title'    => esc_html__( 'Layout', 'buildexo' ),

		    'subtitle' => esc_html__( 'Select main content and sidebar alignment.', 'buildexo' ),

		    'options'  => array(

				'left'  => get_template_directory_uri() . '/assets/images/redux/2cl.png',

				'full' => get_template_directory_uri() . '/assets/images/redux/1col.png',

				'right' => get_template_directory_uri() . '/assets/images/redux/2cr.png',

		    ),



		    'default' => 'right',

			'dependency'	=> array(

				array( 'category_source_type', '==', 'd' ),

			)

	    ),



	    array(

		    'id'       => 'category_page_sidebar',

		    'type'     => 'select',

		    'title'    => esc_html__( 'Sidebar', 'buildexo' ),

		    'desc'     => esc_html__( 'Select sidebar to show at blog listing page', 'buildexo' ),

		    'dependency' => array(

			    array( 'category_sidebar_layout', '!=', 'full' ),

				array( 'category_source_type', '==', 'd' ),

		    ),

		    'options'  => 'sidebars',

	    ),

    ),

);











