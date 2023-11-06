<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package starter_theme
 */
?>
<footer>
	<div class="container">
		<div class="row">
			<div class="footer-content col-md-12">
				<div class="contact-logos">
					<a href="" target="_blank"><div class="comcast-logo">
						<img src="<?php bloginfo('template_url'); ?>/img/comcast-logo.png">
					</div></a>
					<a href="" target="_blank"><div class="eji-logo">
						<img src="<?php bloginfo('template_url'); ?>/img/eji-logo.png">
					</div></a>
				</div>
				<ul class="resources col-md-6">
					<li><a href="" target="_blank">contact</a></li>
					<li><a href="" target="_blank">terms of service</a></li>
					<li><a href="" target="_blank">privacy policy</a></li>
					<li><a href="" target="_blank">community policy</a></li>
				</ul>
			</div>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>

</body>
</html>