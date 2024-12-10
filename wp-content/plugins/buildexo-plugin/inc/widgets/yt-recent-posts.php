<?php

// Control core classes for avoid errors


//
// Create a widget 1
//
CSF::createWidget('yt_recent_posts', array(
    'title'       => esc_html__('YT - Recent Posts', 'buildexo-plugin'),
    'classname'   => 'yt-recent-posts',
    'description' => esc_html__('Show recent posts', 'buildexo-plugin'),
    'fields'      => array(
        array(
            'id'      => 'title',
            'type'    => 'text',
            'title'   => esc_html__('Title', 'buildexo-plugin')
        ),

        array(
            'id'      => 'numbers',
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
if ( ! function_exists('yt_recent_posts') ) {
    function yt_recent_posts($args, $instance) {

        include TURNERPLUGIN_PLUGIN_PATH . 'templates/widgets/recent-posts.php';
    }
}
