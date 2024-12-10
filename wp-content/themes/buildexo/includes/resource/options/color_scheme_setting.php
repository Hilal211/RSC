<?php
$styles = [];
foreach(range(1, 28) as $val) {
    $styles[$val] = sprintf(esc_html__('Style %s', 'buildexo'), $val);
}

return  array(
    'title'      => esc_html__( 'Color Scheme Setting', 'buildexo' ),
    'id'         => 'color_scheme_setting',
    'desc'       => '',
    'fields'     => array(
		array(
            'id' => 'rtl_switcher',
            'type' => 'switcher',
            'title' => esc_html__('Enable RTL Support', 'buildexo'),
            'default' => false,
        ),
		array(
            'id' => 'layout_switcher',
            'type' => 'switcher',
            'title' => esc_html__('Enable Layout Switcher', 'buildexo'),
            'default' => false,
        ),
        array(
			'id'       => 'color_primary',
			'type'     => 'color',
			'title'    => esc_html__( 'Theme Color 1', 'buildexo' ),
			'subtitle' => esc_html__( 'Choose the Custom color scheme for the theme', 'buildexo' ),
            'default' => '#ff6600',
		),
		array(
			'id'       => 'color_primary_2',
			'type'     => 'color',
			'title'    => esc_html__( 'Theme Color 2', 'buildexo' ),
			'subtitle' => esc_html__( 'Choose the Custom color scheme for the theme', 'buildexo' ),
            'default' => '#fa4318',
		),
		array(
			'id'       => 'color_secondary',
			'type'     => 'color',
			'title'    => esc_html__( 'Theme Color 3', 'buildexo' ),
			'subtitle' => esc_html__( 'Choose the Custom color scheme for the theme', 'buildexo' ),
            'default' => '#dc4e11',
		),
	),
);
