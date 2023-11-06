<?php
/**
 * The template for displaying search forms in starter_theme
 *
 * @package starter_theme
 */
?>
	<form method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
		<label for="s" class="screen-reader-text"><?php _ex( 'Search', 'assistive text', 'starter_theme' ); ?></label>
		<input type="search" class="field" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" id="s" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'starter_theme' ); ?>" />
		<input type="submit" class="submit" id="searchsubmit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'starter_theme' ); ?>" />
	</form>