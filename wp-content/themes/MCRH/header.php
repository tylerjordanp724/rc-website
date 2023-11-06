<?php
/**
 * The Header for our theme.
 *
 * @package starter_theme
 */
?><!DOCTYPE html>
<html class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">

	<title><?php wp_title( '|', true, 'right' ); ?></title>

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	
	<link rel="shortcut icon" href="/favicon.png">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/styles.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/fonts.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/plugins.css">
	<link href="//vjs.zencdn.net/4.11/video-js.css" rel="stylesheet">

	<!--[if lt IE 9]>
		<script src="<?php bloginfo('template_url'); ?>/js/respond.js"></script>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<?php wp_head(); ?>
</head>

<body <?php body_class('loading'); ?>>
	<header class="fixed container-fluid">
		<div class="row">
			<div class="menu-btn" style="display: none;"></div>
			<div class="close-menu-btn" style="display: none;"></div>
			<div class="col-md-12">
				<div class="logo">
					<img src="<?php bloginfo('template_url'); ?>/img/mcrh-logo.png">
				</div>
				<nav class="main-nav">
					<ul>
						<li class="about-btn">about</li>
						<li class="bio-btn">host bio</li>
						<li><a href="" target="_blank">his dream,<br>our stories</li></a>
						<li><a href="" target="_blank">share your<br>stories</li></a>
						<li><a href="" target="_blank">a history of<br>racial injustice<br>timeline</li></a>
					</ul>
				</nav>
			</div>
		</div>
		<div class="vid-sort row">
			<div class="col-md-12">
				<h4 class="sort-label"><span data-filter="*" class="filter-button">view all </span>/ filter by:</h4>
				<ul class="sort-categories">
					<li class="sort-list sort-year col-md-2">
						<h4 class="category-label">years</h4>
						<ul class="category-list year-list">
							<li data-filter=".1600s" class="filter-button">1600s</li>
							<li data-filter=".1700s" class="filter-button">1700s</li>
							<li data-filter=".1800s" class="filter-button">1800s</li>
							<li data-filter=".1900-1950" class="filter-button">1900 - 1950</li>
							<li data-filter=".1951-1951" class="filter-button">1951 - 1999</li>
							<li data-filter=".2000-present" class="filter-button">2000 - Present</li>
						</ul>
					</li>

					<li class="sort-list sort-year col-md-2">
						<h4 class="category-label">topic</h4>
						<ul class="category-list topic-list">
							<li data-filter=".slavery" class="filter-button">slavery</li>
							<li data-filter=".education" class="filter-button">education</li>
							<li data-filter=".segregation" class="filter-button">segregation</li>
							<li data-filter=".integration" class="filter-button">integration</li>
							<li data-filter=".march-on-wash" class="filter-button">march on washington</li>
							<li data-filter=".student-move" class="filter-button">student movement</li>
							<li data-filter=".other-marches" class="filter-button">other marches/events</li>
							<li data-filter=".discrimination" class="filter-button">discrimination</li>
							<li data-filter=".legacy" class="filter-button">the legacy</li>
						</ul>
					</li>

					<li class="sort-list sort-year col-md-2">
						<h4 class="category-label">people</h4>
						<ul class="category-list people-list">
							<li data-filter=".elected" class="filter-button">elected officials</li>
							<li data-filter=".religious" class="filter-button">religious leaders</li>
							<li data-filter=".civil-leaders" class="filter-button">civil rights leaders</li>
							<li data-filter=".activists" class="filter-button">activists</li>
							<li data-filter=".music-media" class="filter-button">in music &amp; media</li>
							<li data-filter=".students" class="filter-button">students</li>
							<li data-filter=".participants" class="filter-button">participants</li>
						</ul>
					</li>

					<li class="sort-list sort-year col-md-2">
						<h4 class="category-label">state</h4>
						<ul class="category-list state-list" style="text-transform: uppercase;">
							<li data-filter=".al" class="filter-button">al</li>
							<li data-filter=".ar" class="filter-button">ar</li>
							<li data-filter=".ca" class="filter-button">ca</li>
							<li data-filter=".co" class="filter-button">co</li>
							<li data-filter=".dc" class="filter-button">dc</li>
							<li data-filter=".fl" class="filter-button">fl</li>
							<li data-filter=".ga" class="filter-button">ga</li>
							<li data-filter=".il" class="filter-button">il</li>
							<li data-filter=".ks" class="filter-button">ks</li>
							<li data-filter=".la" class="filter-button">la</li>
							<li data-filter=".ma" class="filter-button">ma</li>
							<li data-filter=".md" class="filter-button">md</li>
							<li data-filter=".mi" class="filter-button">mi</li>
							<li data-filter=".mo" class="filter-button">mo</li>
							<li data-filter=".ms" class="filter-button">ms</li>
							<li data-filter=".nc" class="filter-button">nc</li>
							<li data-filter=".nj" class="filter-button">nj</li>
							<li data-filter=".ny" class="filter-button">ny</li>
							<li data-filter=".oh" class="filter-button">oh</li>
							<li data-filter=".ok" class="filter-button">ok</li>
							<li data-filter=".pa" class="filter-button">pa</li>
							<li data-filter=".sc" class="filter-button">sc</li>
							<li data-filter=".tn" class="filter-button">tn</li>
							<li data-filter=".tx" class="filter-button">tx</li>
							<li data-filter=".va" class="filter-button">va</li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</header>