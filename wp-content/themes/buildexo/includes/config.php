<?php

/**

 * Theme config file.

 *

 * @package TURNER

 * @author  TheGenious

 * @version 1.0

 * changed

 */



if ( ! defined( 'ABSPATH' ) ) {

	die( 'Restricted' );

}



$config = array();



$config['default']['buildexo_main_header'][] 	= array( 'buildexo_main_header_area', 99 );

$config['default']['turner_main_footer'][] 	= array( 'turner_main_footer_area', 99 );



$config['default']['turner_sidebar'][] 	    = array( 'turner_sidebar', 99 );



$config['default']['turner_banner'][] 	    = array( 'turner_banner', 99 );





return $config;

