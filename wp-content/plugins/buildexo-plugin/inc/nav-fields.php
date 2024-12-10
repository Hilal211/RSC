<?php

//
// Set a unique slug-like ID
$prefix = '_prefix_menu_options';

//
// Create profile options
CSF::createNavMenuOptions($prefix, array(
    'data_type' => 'serialize', // The type of the database save options. `serialize` or `unserialize`
));

//
// Create a section
CSF::createSection($prefix, array(
    'fields' => array(

        array(
            'id'    => 'icon',
            'type'  => 'icon',
            'title' => 'Custom Field Icon',
        ),

        array(
            'id'    => 'text',
            'type'  => 'text',
            'title' => 'Custom Field Text',
        ),

    )
));
