<?php

// Control core classes for avoid errors


//
// Create a widget 1
//
CSF::createWidget('yt_about_company_three', array(
    'title'       => esc_html__('YT About Company Three', 'buildexo-plugin'),
    'classname'   => 'yt-about-company-three',
    'description' => esc_html__('Show about the company three', 'buildexo-plugins'),
    'fields'      => array(
        array(
            'id'      => 'widget_logo_img3',
            'type'    => 'media',
            'title'   => esc_html__( 'Logo', 'buildexo-plugin'),
        ),
        array(
            'id'      => 'content3',
            'type'    => 'textarea',
            'title'   => esc_html__( 'Content', 'buildexo-plugin'),
        ),
		array(
			'id'      => 'social_links_group',
			'type'    => 'group',
			'title'   => 'Group',
			'fields'    => array(
				array(
					'id'      => 'social_title',
					'type'    => 'text',
					'title'   => esc_html__('Social Title', 'acrepair'),
				),
				array(
					'id'	=> 'social_icon',
					'type'  => 'icon',
					'title' => esc_html__('Social Icon', 'acrepair'),
				),
				array(
					'id'	=> 'social_link',
					'type'  => 'text',
					'title' => esc_html__('Social URL', 'acrepair'),
				),
			
			)
		  ),
	)
));

//
// Front-end display of widget example 1
// Attention: This function named considering above widget base id.
//
if ( ! function_exists('yt_about_company_three') ) {
    function yt_about_company_three($args, $instance) {

        include TURNERPLUGIN_PLUGIN_PATH . 'templates/widgets/about-company-3.php';
    }
}
