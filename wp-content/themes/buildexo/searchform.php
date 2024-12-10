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

<div class="widget__inner">
    <form class="widget__search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <input type="text" name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php echo esc_attr__( 'Search...', 'buildexo' ); ?>">
        <button><i class="far fa-search"></i></button>
    </form>
</div>

