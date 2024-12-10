<?php

$styles = [];
foreach(range(1, 28) as $val) {
    $styles[$val] = sprintf(esc_html__('Style %s', 'buildexo'), $val);
}
return  array(
    'title'      => esc_html__( 'General Setting', 'buildexo' ),
    'id'         => 'general_setting',
    'desc'       => '',
    'icon'       => 'el el-wrench',
    'fields'     => array(
        array(
            'id' => 'theme_preloader',
            'type' => 'switcher',
            'title' => esc_html__('Enable Preloader', 'buildexo'),
            'default' => false,
        ),
    ),

);

