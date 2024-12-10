<?php

// Control core classes for avoid errors


//
// Create a widget 1
//
CSF::createWidget('yt_gallery_posts', array(
    'title'       => esc_html__('YT - Gallery Posts', 'buildexo-plugin'),
    'classname'   => 'yt-gallery-posts',
    'description' => esc_html__('Show gallery posts', 'buildexo-plugin'),
    'fields'      => array(
        array(
            'id'      => 'title',
            'type'    => 'text',
            'title'   => esc_html__('Title', 'buildexo-plugin')
        ),

        array(
            'id'      => 'number',
            'type'    => 'number',
            'title'   => esc_html__('Number', 'buildexo-plugin')
        ),

        array(
            'id'      => 'cat',
            'type'    => 'select',
            'title'   => esc_html__('Categories', 'buildexo-plugin'),
            'options'   => 'categories',
            'query_args'    => array(
                 'taxonomy'  => 'category'
            )
        ),
    )
));

//
// Front-end display of widget example 1
// Attention: This function named considering above widget base id.
//
if ( ! function_exists('yt_gallery_posts') ) {
    function yt_gallery_posts($args, $instance) {

        include TURNERPLUGIN_PLUGIN_PATH . 'templates/widgets/gallery-posts.php';
    }
}
