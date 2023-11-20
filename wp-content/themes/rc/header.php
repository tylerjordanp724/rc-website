<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Red_Camel_Auto
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://use.typekit.net/ugw8uup.css">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader" href="#primary"><?php esc_html_e( 'Skip to content', 'rc' ); ?></a>
	<header class="header">
		<div class="header__nav--mobile d-md-none">
			<div class="header__nav-controls">
				<div class="logo">
					<h1 class="screen-reader"><?php bloginfo( 'name' ); ?></h1>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php include('img/rc-logo.svg');?></a>
				</div>	
				<div class="nav-btn"></div>
			</div>
			<nav class="header__nav-menu">
				<?php wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					)
				);
				?>
			</nav>
		</div>
		<div class="header__nav--desktop d-none d-md-block">
			<div class="header__nav-wrapper container flex">
				<div class="logo"></div>
				<div class="header__nav-menu"></div>
			</div>
		</div>
	</header>
