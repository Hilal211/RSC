<?php



return array(
    'title'         => esc_html__( 'Typography Settings', 'buildexo' ),
    'id'            => 'typography_setting',
    'desc'          => '',
    'icon'          => 'el el-edit',
    'fields' => [
        [
            'type'    => 'subheading',
            'content' => '<h3>' . esc_html__( 'Typography Settings', 'buildexo' ) . '</h3>',
        ],
        [
            'id'     => 'body-typography',
            'type'   => 'typography',
            'output' => 'body',
            'title'  => esc_html__( 'Body Typography', 'buildexo' ),
        ],
        [
            'id'     => 'heading-gl-typo',
            'type'   => 'typography',
            'output' => 'h1, h2, h3, h4, h5, h6',
            'title'  => esc_html__( 'Heading Typography', 'buildexo' ),
        ],
        // menu typography
        [
            'id'     => 'menu-typography',
            'type'   => 'typography',
            'output' => 'header nav a',
            'title'  => esc_html__( 'Menu Typography', 'buildexo' ),
            'output_important' => true,
        ],
    ],
);