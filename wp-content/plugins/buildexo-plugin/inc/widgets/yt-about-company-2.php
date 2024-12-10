<?php

// Control core classes for avoid errors


//
// Create a widget 1
//
CSF::createWidget('yt_about_company_two', array(
    'title'       => esc_html__('YT About Company Two', 'buildexo-plugin'),
    'classname'   => 'yt-about-company-two',
    'description' => esc_html__('Show about the company two', 'buildexo-plugins'),
    'fields'      => array(
        array(
            'id'      => 'widget_logo_img2',
            'type'    => 'media',
            'title'   => esc_html__( 'Logo', 'buildexo-plugin'),
        ),
        array(
            'id'      => 'content2',
            'type'    => 'textarea',
            'title'   => esc_html__( 'Content', 'buildexo-plugin'),
        ),
		array(
            'id'      => 'address',
            'type'    => 'text',
            'title'   => esc_html__( 'Address', 'buildexo-plugin'),
        ),
		array(
            'id'      => 'email_address',
            'type'    => 'text',
            'title'   => esc_html__( 'Email Address', 'buildexo-plugin'),
        ),
		array(
            'id'      => 'phone_no',
            'type'    => 'text',
            'title'   => esc_html__( 'Phone Number', 'buildexo-plugin'),
        ),	
	)
));

//
// Front-end display of widget example 1
// Attention: This function named considering above widget base id.
//
if ( ! function_exists('yt_about_company_two') ) {
    function yt_about_company_two($args, $instance) {

        include TURNERPLUGIN_PLUGIN_PATH . 'templates/widgets/about-company-2.php';
    }
}
