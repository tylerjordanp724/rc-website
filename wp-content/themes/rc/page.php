<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Red_Camel_Auto
 */

get_header();
?>

	<main id="primary" class="site-main">
		<?php if(is_page() && !is_front_page()):?>
			<?php get_template_part('template-parts/component', 'page-hero');?>
			<?php if(is_page('inventory')):?>
				<?php get_template_part('template-parts/component', 'inventory');?>
			<?php elseif(is_page('testimonials')):?>
				<?php get_template_part('template-parts/component', 'testimonials');?>
			<?php endif;?>
		<?php endif;?>
		<?php if(have_rows('content_rows')): while(have_rows('content_rows')): the_row(); 
			$content_block = get_row_layout('hero');
		?>
			<?php if($content_block == 'hero'):?>
				<?php get_template_part('template-parts/component','hero');?>
			<?php elseif($content_block == 'featured_content'):?>
				<?php get_template_part('template-parts/component','featured-content');?>
			<?php elseif($content_block == 'featured_testimonial'):?>
				<?php get_template_part('template-parts/component','featured-testimonial');?>
			<?php elseif($content_block == 'content_card'):?>
				<?php get_template_part('template-parts/component','content-card');?>	
			<?php elseif($content_block == 'content_editor'):?>
				<?php get_template_part('template-parts/component','content-editor');?>		
			<?php endif;?>
		<?php endwhile; endif;?>

	</main><!-- #main -->

<?php
get_footer();
