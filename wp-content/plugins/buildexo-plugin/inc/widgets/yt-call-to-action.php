<?php

// Control core classes for avoid errors


//
// Create a widget 1
//
CSF::createWidget('yt_call_to_action', array(
    'title'       => esc_html__('YT Call To Action', 'buildexo-plugin'),
    'classname'   => 'yt-call-to-action',
    'description' => esc_html__('Show Call To Action', 'buildexo-plugin'),
    'fields'      => array(
        array(
            'id'      => 'cta_bg_image',
            'type'    => 'media',
            'title'   => esc_html__( 'BG Image', 'buildexo-plugin'),
        ),
		array(
            'id'      => 'cta_icon_image',
            'type'    => 'media',
            'title'   => esc_html__( 'Icon Image', 'buildexo-plugin'),
        ),
		array(
            'id'      => 'cta_title',
            'type'    => 'text',
            'title'   => esc_html__( 'Phone Number', 'buildexo-plugin'),
        ),
		array(
            'id'      => 'cta_address',
            'type'    => 'textarea',
            'title'   => esc_html__( 'Adress', 'buildexo-plugin'),			
        ),	
		array(
            'id'      => 'banner_image',
            'type'    => 'media',
            'title'   => esc_html__( 'Banner Image', 'buildexo-plugin'),
        ),
		array(
            'id'      => 'cta_url',
            'type'    => 'text',
            'title'   => esc_html__( 'Link', 'buildexo-plugin'),
        ),
    )
));

//
// Front-end display of widget example 1
// Attention: This function named considering above widget base id.
//
if ( ! function_exists('yt_call_to_action') ) {
    function yt_call_to_action($args, $instance) {

        include TURNERPLUGIN_PLUGIN_PATH . 'templates/widgets/call-to-action.php';
    }
}
