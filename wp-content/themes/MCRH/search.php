<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package starter_theme
 */

get_header(); ?>

	<?php if ( have_posts() ) : ?>
	
		<h1><?php printf( __( 'Search Results for: %s', 'starter_theme' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
	
		<?php while ( have_posts() ) : the_post(); ?>
	
			<?php get_template_part( 'content', 'search' ); ?>
	
		<?php endwhile; ?>
	
	<?php else : ?>
	
		<?php get_template_part( 'no-results', 'search' ); ?>
	
	<?php endif; ?>

<?php get_footer(); ?>