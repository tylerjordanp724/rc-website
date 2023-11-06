<?php
/**
 * The Template for displaying all single posts.
 *
 * @package starter_theme
 */
?>

	<div id="single-post post-<?php the_ID(); ?>">
	<?php while (have_posts()) : the_post(); ?>
		<?php get_template_part( 'content', 'single' ); ?>
	<?php endwhile;?> 
	</div>