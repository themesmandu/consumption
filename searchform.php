<?php
/**
 * Search Form
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package consumption
 */

?>

<form role="search" method="get" class="search-form top-search" action="<?php echo home_url( '/' ); ?>">
    <label>
        <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>"  value="<?php echo get_search_query() ?>" name="s"  title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
    </label>
    <button class="btn btn-md"><i class="fa fa-search"></i></span></button>
</form>