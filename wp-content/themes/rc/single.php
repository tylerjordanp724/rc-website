<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Red_Camel_Auto
 */

get_header();
?>
	<main id="primary" class="site-main">
		<?php while (have_posts()): the_post();
			$post_type = get_post_type();
		?>
			<?php if($post_type === 'rc_vehicle'):?>
				<?php get_template_part('template-parts/content', 'vehicle');?>
			<?php else:?>
				<?php get_template_part('template-parts/content', get_post_type());?>
			<?php endif;?>
		<?php endwhile;?>
	</main><!-- #main -->
<?php
get_footer();
