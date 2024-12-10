<?php



define( 'TURNER_ROOT', get_template_directory() . '/' );



require_once get_template_directory() . '/includes/functions/functions.php';
require_once get_template_directory() . '/demo-import/functions.php';

include_once get_template_directory() . '/includes/classes/base.php';

include_once get_template_directory() . '/includes/classes/dotnotation.php';

include_once get_template_directory() . '/includes/classes/header-enqueue.php';

include_once get_template_directory() . '/includes/classes/options.php';

include_once get_template_directory() . '/includes/classes/options-codestar.php';

include_once get_template_directory() . '/includes/classes/ajax.php';

include_once get_template_directory() . '/includes/classes/common.php';

include_once get_template_directory() . '/includes/classes/bootstrap_walker.php';

include_once get_template_directory() . '/includes/library/class-tgm-plugin-activation.php';

require_once get_template_directory() . '/includes/library/hook.php';




add_action( 'after_setup_theme', 'turner_wp_load', 5 );



function turner_wp_load() {



	defined( 'TURNER_URL' ) or define( 'TURNER_URL', get_template_directory_uri() . '/' );

	define(  'TURNER_KEY','!@#turner');

	define(  'TURNER_URI', get_template_directory_uri() . '/');



	if ( ! defined( 'TURNER_NONCE' ) ) {

		define( 'TURNER_NONCE', 'turner_wp_theme' );

	}



	( new \buildexo\Includes\Classes\Base )->loadDefaults();

	( new \buildexo\Includes\Classes\Ajax )->actions();



}

add_action( 'init', 'turner_bunch_theme_init');

function turner_bunch_theme_init()

{

	$bunch_exlude_hooks = include_once get_template_directory(). '/includes/resource/remove_action.php';

	foreach( $bunch_exlude_hooks as $k => $v )

	{

		foreach( $v as $value )

		remove_action( $k, $value[0], $value[1] );

	}



}

