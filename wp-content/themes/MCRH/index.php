<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package starter_theme
 */

get_header(); ?>
	<div class="main-content">	
		<div class="slide-down row">
			<div class="close-btn"></div>
			<div class="about-info col-md-12">
				<div class="info col-md-8">
					<h3 class="info-title">about the project</h3>
					<h1 class="info-bar"></h1>
					<p class="info-text">
						Every day has an impact on the course of history, whether it be a personal protest or a national decision. This is a collection of those moments - the ones that have shaped the American civil rights movement. Every week, a new video hosted by Judge D'Army Bailey will be published to recount that week's significance. From education to activism, from segregation to integration, Moments in Civil Rights History captures the events that have written the nation's narrative on civil rights in the past, and carries the mission for equality and justice into the future.
					</p>
				</div>

			</div>
			<div class="bio-info col-md-12">
				<div class="info col-md-8">
					<h3 class="info-title">host bio</h3>
					<h1 class="info-bar"></h1>
					<div class="bio-img">
						<img src="<?php bloginfo('template_url'); ?>/img/host.jpg">
					</div>
					<p class="info-text">D'Army Bailey is a circuit court judge, civil rights activist, author and film actor born in Memphis, Tennessee. He also served on the City Council in Berkeley, California, from 1971-73.
					<br><br/>
					Bailey is founder of the National Civil Rights Museum which opened in 1991 at Memphis’ Lorraine Motel, where Dr. Martin Luther King, Jr., was slain in 1968. His 1993 book, Mine Eyes Have Seen: Dr. Martin Luther King’s Final Journey, focused on that period. A later book, The Education of a Black Radical, published in October 2009 by LSU Press, recalls Bailey’s own history in the civil rights movement. 
					<br><br/>
					From 1967 to 1968 Bailey worked in New York as National Director of the Law Students Civil Rights Research Council, providing hundreds of volunteer law students to assist civil rights lawyers primarily in the South.
					<br><br/>
					His interest in civil liberties issues also led Bailey to film, where he portrayed a judge in the 1999 film The People vs. Larry Flynt. He’s also had roles in seven other movies, including portrayals ranging from a minister to a street-hustling pool player. He is a member of the Screen Actors Guild.
					<br><br/>
					As a lawyer, Bailey practiced law for 16 years in Memphis before being elected as a judge on the Circuit Court of Tennessee's Thirtieth Judicial District in 1990. He presided over a nationally-recognized trial lasting four months in 1999 in which three major tobacco firms were acquitted of wrongdoing in contributing to the deaths of smokers. He also has been twice nominated to serve on the Tennessee Supreme Court. 
					<br><br/>
					Bailey has lectured at law schools, including Harvard, Loyola in California, Washington and Lee, Washington University in St. Louis, Vanderbilt, and Notre Dame University. He also has published legal articles at the law schools at Harvard University, the University of Toledo, Washington and Lee, and Howard University. Bailey has served on the executive committee of the Tennessee Judicial Conference. He received his law degree from Yale University in 1967. On May 23, 2010, he received an honorary Doctor of Laws degree from Clark University in Worcester, Mass.
					<br><br/>
					Bailey is married to the former Adrienne Marie Leslie, and the couple has two adult sons, Justin and Merritt. He is also a licensed lawyer in California, Pennsylvania and Arkansas.
					</p>
				</div>
			</div>
			<div class="video-play-wrap col-md-10">
							<?php
							$args = array( 'posts_per_page' => 1 );
							$myposts = get_posts( $args );
							foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
		
		  <video id="vid1" src="" class="video-js vjs-default-skin" controls preload="auto" width="640" height="360" data-setup='{ "techOrder": ["youtube"], "src": "http://www.youtube.com/watch?v=<?php the_field('youtube_id'); ?>" }'></video>	
		
					<div class="post-content">
						<h1><?php the_title(); ?></h1>
						<?php the_content(); ?>
					</div><!-- .post-content -->
			<?php endforeach; wp_reset_postdata();?>
				
			</div>
		</div>
		<div class="row">
			<ul id="container" class="js-isotope vids col-md-12">
			<?php $myposts = get_posts(); foreach($myposts as $post) : setup_postdata($post);?>
			<?php get_template_part('content');?>
			<?php endforeach; wp_reset_postdata();?>
			</ul>	
		</div>
	</div>
<?php get_footer(); ?>