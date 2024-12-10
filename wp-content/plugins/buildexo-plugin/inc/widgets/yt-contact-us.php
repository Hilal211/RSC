<?php

// Control core classes for avoid errors


//
// Create a widget 1
//
CSF::createWidget('yt_contact_us', array(
    'title'       => esc_html__('YT Contact Us', 'buildexo-plugin'),
    'classname'   => 'yt-contact-us',
    'description' => esc_html__('Show contact us', 'buildexo-plugins'),
    'fields'      => array(
       array(
            'id'      => 'title',
            'type'    => 'text',
            'title'   => esc_html__('Title', 'buildexo-plugin')
        ),
        array(
            'id'      => 'address2',
            'type'    => 'text',
            'title'   => esc_html__( 'Address', 'buildexo-plugin'),
        ),
		array(
            'id'      => 'email_address2',
            'type'    => 'text',
            'title'   => esc_html__( 'Email Address', 'buildexo-plugin'),
        ),
		array(
            'id'      => 'phone_no2',
            'type'    => 'text',
            'title'   => esc_html__( 'Phone Number', 'buildexo-plugin'),
        ),
		array(
            'id'      => 'working_title',
            'type'    => 'text',
            'title'   => esc_html__( 'Working Title', 'buildexo-plugin'),
        ),
		array(
            'id'      => 'working_time',
            'type'    => 'text',
            'title'   => esc_html__( 'Working Time', 'buildexo-plugin'),
        ),
		
	)
));

//
// Front-end display of widget example 1
// Attention: This function named considering above widget base id.
//
if ( ! function_exists('yt_contact_us') ) {
    function yt_contact_us($args, $instance) {

        include TURNERPLUGIN_PLUGIN_PATH . 'templates/widgets/contact-us.php';
    }
}
