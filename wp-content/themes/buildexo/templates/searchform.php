<?php

/**

 * Search Form template

 *

 * @package TURNER

 * @author The Genious

 * @version 1.0

 */

if ( ! defined( 'ABSPATH' ) ) {

	die( 'Restricted' );

}

?>

<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>"> 
    <input type="text" value="<?php echo get_search_query(); ?>" placeholder="<?php echo esc_attr__( 'Search Keywords …', 'buildexo' ); ?>"> 
    <button type="submit"><i class="ti-search"></i></button>
</form>

