<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->

	<!-- Jquery -->
	<script src="http://code.jquery.com/jquery.js"></script>

	<!-- Twitter boostrap -->
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/bootstrap-responsive.min.css" />
	<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/bootstrap.min.js"></script>

	<?php wp_head(); ?>
</head>

<body>

	<div class="container-fluid wrapper">
		<div class="row-fluid">
			<div class="span4">
				<div class="the-box the-orenge-box the-box-bottom-orenge">
					<h1 class="title"><a href="<?php echo home_url(); ?>">
						<?php bloginfo( 'name' ); ?></a></h1>
					<p class="lead">The Blog written by Jeonghwan Kim</p>
					<?php get_search_form(); ?>
				</div>

				<div class="the-box the-red-box the-box-bottom-red">
					<?php wp_nav_menu( array('before' => '<h3>', 'after' => '</h3>') ); ?>
				</div>
			</div>

			<div class="span8">