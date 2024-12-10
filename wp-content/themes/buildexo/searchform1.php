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

<div class="header-search-container">
    <form  class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <input type="search"  class="search-field" name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php echo esc_attr__( 'Search …', 'buildexo' ); ?>">
    <button type="submit" class="search-submit"><i class="flaticon-magnifying-glass"></i></button>
    </form>
</div>

