<?php
/**
 * @package starter_theme
 */
?>
	<!-- FEATURED VIDEO IMAGES -->
	<li style="background-image: url('<?php the_field('featured_image'); ?>');"class="vid col-md-3 <?php echo year_tag(); ?> <?php echo topic_tag(); ?> <?php echo people_tag(); ?> <?php echo state_tag(); ?>">
		<a class="post-link" rel="<?php the_ID(); ?>" href="<?php the_permalink(); ?>">
		<div class=".item vid-wrap" style="background-image: url('<?php the_field('featured_image'); ?>');"></div>
		<div class="vid-overlay">
			<h5 class="vid-title"><?php the_title(); ?></h5>
			<h1 class="title-bar"></h1>
			<div class="play-lbl">play</div>
			<ul class="vid-tags">
				<li><?php echo get_the_term_list( $post->ID, 'year', ' ', ' ', '' );?></li>
				<li><?php echo get_the_term_list( $post->ID, 'topic', ' ', ' ', '' );?></li>
				<li><?php echo get_the_term_list( $post->ID, 'people', ' ', ' ', '' );?></li>
				<li><?php echo get_the_term_list( $post->ID, 'state', ' ', ' ', '' );?></li>
			</ul>	
		</div>
		<span class="youtube-id" style="display: none;"><?php the_field('youtube_id');?></span>
		</a>
	</li>
	

	