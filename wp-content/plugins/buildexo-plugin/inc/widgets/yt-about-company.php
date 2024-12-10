<?php

// Control core classes for avoid errors


//
// Create a widget 1
//
CSF::createWidget('yt_about_company', array(
    'title'       => esc_html__('YT About Company', 'buildexo-plugin'),
    'classname'   => 'yt-about-company',
    'description' => esc_html__('Show about the company', 'buildexo-plugins'),
    'fields'      => array(
        array(
            'id'      => 'widget_logo_img',
            'type'    => 'media',
            'title'   => esc_html__( 'Logo', 'buildexo-plugin'),
        ),
        array(
            'id'      => 'content',
            'type'    => 'textarea',
            'title'   => esc_html__( 'Content', 'buildexo-plugin'),
        ),
		array(
            'id'      => 'widget_card_img',
            'type'    => 'media',
            'title'   => esc_html__( 'Card Image', 'buildexo-plugin'),
        ),
	)
));

//
// Front-end display of widget example 1
// Attention: This function named considering above widget base id.
//
if ( ! function_exists('yt_about_company') ) {
    function yt_about_company($args, $instance) {

        include TURNERPLUGIN_PLUGIN_PATH . 'templates/widgets/about-company.php';
    }
}
