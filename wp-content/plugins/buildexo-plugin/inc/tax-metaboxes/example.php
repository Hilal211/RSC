<?php


//
// Set a unique slug-like ID
$prefix = 'my_taxonomy_options';

//
// Create taxonomy options
CSF::createTaxonomyOptions($prefix, array(
    'taxonomy'  => array('category'),
    'data_type' => 'serialize', // The type of the database save options. `serialize` or `unserialize`
));

//
// Create a section
CSF::createSection($prefix, array(
    'fields' => array(

        array(
            'id'    => 'opt-text',
            'type'  => 'text',
            'title' => 'Text',
        ),

        array(
            'id'    => 'opt-textarea',
            'type'  => 'textarea',
            'title' => 'Textarea',
        ),

    )
));
