<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Red_Camel_Auto
 */
 $address = get_field('address', 'option');
 $phone_number = get_field('phone_number', 'option');
 $location = get_field('location', 'option');
?>
	<footer class="footer">
		<div class="footer__content">
			<div class="footer__content-wrapper container-lg d-md-flex justify-content-md-between">
				<div class="bucket col-md-3">
					<div class="logo">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php include('img/rc-logo-2.svg');?></a>
					</div>
					<?php if(!empty($address || $phone_number)):?>
						<div class="bucket__content">
							<p><?php echo $address;?></p>
							<p><?php echo 'P:&nbsp;'.$phone_number.'';?></p>
						</div>	
					<?php endif;?>
				</div>
				<?php if(!empty($location)):?>
					<div class="bucket col-md-4">
						<h4 class="bucket__title">Location</h4>
						<div class="bucket__container bucket__container--media">
							<div class="acf-map" data-zoom="<?php echo $location['zoom'];?>">
								<div class="marker" data-lat="<?php echo esc_attr($location['lat']); ?>" data-lng="<?php echo esc_attr($location['lng']); ?>"></div>
							</div>
						</div>
					</div>
					<?php else:?>
						<div class="bucket col-md-4">
							<h4 class="bucket__title">Location</h4>
							<div class="bucket__container bucket__container--media-none">
							</div>
						</div>
				<?php endif;?>
				<?php if(have_rows('business_hours', 'option')):?>
					<div class="bucket col-md-4">
						<h4 class="bucket__title">Hours</h4>
						<ul>
							<?php while(have_rows('business_hours', 'option')): the_row('business_hours', 'option');
								$hours = get_sub_field('hours');
							?>
							<li class="d-flex justify-content-between"><span><?php echo $hours['day'];?></span><span><?php echo $hours['time'];?></span></li>
							<?php endwhile;?>
						</ul>
					</div>
				<?php endif;?>
			</div>
		</div>
		<div class="footer__bottom container-lg d-flex justify-content-between">
			<div class="footer__bottom-credit">
				<span>&copy; <?php echo date('Y');?> Red Camel Auto</span>
			</div>
			<div class="footer__bottom-credit">
				<span>Site by Tyler Jordan Perry</span>
			</div>
		</div>
	</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
