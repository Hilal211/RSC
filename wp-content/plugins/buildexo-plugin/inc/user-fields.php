<?php

//
// Set a unique slug-like ID
$prefix = 'my_profile_options';

//
// Create profile options
CSF::createProfileOptions($prefix, array(
    'data_type' => 'serialize', // The type of the database save options. `serialize` or `unserialize`
));

//
// Create a section
CSF::createSection($prefix, array(
    'fields' => array(

        array(
            'id'    => 'opt-text',
            'type'  => 'text',
            'title' => 'CS Custom Text',
        ),

        array(
            'id'    => 'opt-textarea',
            'type'  => 'textarea',
            'title' => 'CS Custom Textarea',
        ),

    )
));
