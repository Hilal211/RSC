<?php

// Control core classes for avoid errors


//
// Set a unique slug-like ID
$prefix = 'my_comment_options';

//
// Create a comment metabox
CSF::createCommentMetabox($prefix, array(
    'title' => 'My Comment Options',
));

//
// Create a section
CSF::createSection($prefix, array(

    'fields' => array(

        //
        // A text field
        array(
            'id'      => 'opt-text',
            'type'    => 'text',
            'title'   => 'Text',
        ),

        array(
            'id'      => 'opt-textarea',
            'type'    => 'textarea',
            'title'   => 'Textarea',
        ),

        array(
            'id'      => 'opt-color',
            'type'    => 'color',
            'title'   => 'Color',
        ),

        array(
            'id'      => 'opt-select',
            'type'    => 'select',
            'title'   => 'Select',
            'options' => array(
                'opt-1' => 'Option 1',
                'opt-2' => 'Option 2',
                'opt-3' => 'Option 3',
            )
        ),

    )
));
