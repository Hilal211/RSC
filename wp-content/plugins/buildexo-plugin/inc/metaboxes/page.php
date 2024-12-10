<?php

//
// Set a unique slug-like ID
$prefix = 'turner_meta';
//
// Create a metabox
CSF::createMetabox( $prefix, array(
	'title'      => 'Turner Setting',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_type' => array( 'page', 'post', 'service', 'team', 'project', 'product', 'career' ),
	'show_restore'       => false,
	'context'            => 'advanced',
	'nav'                => 'normal',
	'theme'              => 'dark',
	'class'              => '',
) );
require TURNERPLUGIN_PLUGIN_PATH . '/inc/metaboxes/header.php';
require TURNERPLUGIN_PLUGIN_PATH . '/inc/metaboxes/banner.php';
require TURNERPLUGIN_PLUGIN_PATH . '/inc/metaboxes/sidebar.php';
require TURNERPLUGIN_PLUGIN_PATH . '/inc/metaboxes/footer.php';
