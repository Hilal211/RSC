<?php
if ( ! function_exists( "turner_add_metaboxes_codestar" ) ) {
	function turner_add_metaboxes_codestar() {
		$directories_array = array(
			'page.php',
			'projects.php',
			'service.php',
			'department.php',
			'team.php',
			'testimonials.php',
			'careers.php'
		);
		foreach ( $directories_array as $dir ) {
			require_once TURNERPLUGIN_PLUGIN_PATH . '/inc/metaboxes/' . $dir;
		}
	}
	turner_add_metaboxes_codestar();
}
