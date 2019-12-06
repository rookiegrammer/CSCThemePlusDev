<!DOCTYPE html>
<html>
<head>
	<title><?php wp_title('&rang;', true, 'right'); bloginfo('name') ?></title>
	<link href="https://fonts.googleapis.com/css?family=Libre+Baskerville:400,700|Libre+Franklin:400,700,900" rel="stylesheet">
	<style type="text/css">
		@font-face {
		    font-family: 'Selima';
		    src:url('<?= get_template_directory_uri() ?>/fonts/Selima.ttf.woff') format('woff'),
		        url('<?= get_template_directory_uri() ?>/fonts/Selima.ttf.svg#Selima') format('svg'),
		        url('<?= get_template_directory_uri() ?>/fonts/Selima.ttf.eot'),
		        url('<?= get_template_directory_uri() ?>/fonts/Selima.ttf.eot?#iefix') format('embedded-opentype');
		    font-weight: normal;
		    font-style: normal;
		}
	</style>
	<?php wp_head(); ?>

	<style type="text/css">
		.feature-content > section {
			padding: 4em <?=get_theme_mod('display_feature_padding', '20')?>%;
		}

		.entry-content {
			line-height: <?=get_theme_mod('display_line_height', '1.5')?>;
		}
		.entry-content p, .entry-content ul, .entry-content ol, .entry-content dl, .entry-content blockquote p, .entry-content blockquote {
			line-height: <?=get_theme_mod('display_line_height', '1.5')*1.066667?>;
		}

		.profiles .prf-wrap {
			width: <?=get_theme_mod('display_speaker_thumb_size', '80')?>px;
			height: <?=get_theme_mod('display_speaker_thumb_size', '80')?>px;
		}

		.profiles .prf-wrap::after {
			top: <?=get_theme_mod('display_speaker_thumb_size', '80')/2?>px;
		}

		.profiles h4 {
			font-size: <?=get_theme_mod('display_speaker_scale_size', '1.0')*1.25?>rem;
		}
		.profiles p {
			font-size: <?=get_theme_mod('display_speaker_scale_size', '1.0')?>rem;
		}
<?php
		if (get_theme_mod('display_speaker_round_enable', 'checked')=='checked') : ?>
			.profiles .diag-clip, .profiles .diag-clip img {
				-webkit-transform: rotate(0deg);
				transform: rotate(0deg);
			}
			.profiles .diag-clip img {
				width: 100%;
			}
			.profiles .diag-clip, .profiles .diag-clip::after {
				border-radius: 9999px;
			}
			.profiles h4 {
				margin-top: 1em;
			}
<?php
		else: ?>
			.profiles h4 {
				margin-top: <?=get_theme_mod('display_speaker_thumb_size', '80')*0.21+get_theme_mod('display_font_size', '16')*get_theme_mod('display_speaker_scale_size', '1.0')*2?>px;
			}
<?php
		endif ?>

<?php
		if (is_single()) : ?>
			.logo {
				font-size: 1rem;}
			.site-title {
				font-size: <?=get_theme_mod('display_banner_mobile_size', '1.5')?>em;
				margin-bottom: 0.5em; }
			@media print, screen and (min-width: 40em) {
	  			.site-title {
	    			font-size: <?=get_theme_mod('display_banner_desktop_size', '3.0')?>em; } }
<?php
		endif ?>
<?php
		if (get_theme_mod('display_speaker_border_enable', 'checked')!='checked') : ?>
			.profiles .diag-clip::after {
			    content: none }

<?php
		endif ?>
<?php
		if ( is_home() ) : ?>
			#masthead {
				background-image: url(<?= get_theme_mod('display_image', get_template_directory_uri().'/img/hero.jpg'); ?>); }
			#masthead::after {
				background-image: url(<?= get_theme_mod('display_image_overlay', get_template_directory_uri().'/img/feature.png'); ?>); }
<?php
		endif ?>
		html {
			font-size: <?= get_theme_mod('display_font_size', '16'); ?>px;
		}
	</style>
</head>
<body <?php body_class(); ?>>
	<div id="csctop">
		<header id="masthead" data-dir="up" class="<?php if (!is_home()) echo "mini-header"; else echo "main-header parallax".(get_theme_mod('display_header_filter_enable', 'checked')=='checked' ? " filtered" : "") ?>">
			<a href="<?php bloginfo('url'); ?>">
				<div class="logo" style="">
					<h1 class="site-title serif" <?php if (is_home()) echo "style=\"color: ".get_theme_mod('title_text_color', '#fff')."\"" ?> ><?= get_theme_mod('display_title_prefix', '2nd International Conference on') ?><span class="highlight"><?= get_theme_mod('display_title', 'Cordillera Studies') ?></span></h1>
<?php				if (is_home() && get_theme_mod('enable_conf_details', 'checked')=='checked'): ?>
					<h2 class="site-subtitle"><span><?= get_theme_mod('display_date', 'July 16-17, 2017') ?></span><span><?= get_theme_mod('display_place', 'UP Baguio') ?></span></h2>
<?php 				endif; ?>

				</div>
			</a>
			<nav id="cscmenu" class="nav-wrap <?php if (!is_home()) echo "overlap"; ?>">
				<?php
										$walker = new Menu_With_Link_Classes;

										$defaults = array(
											'container' => false,
											'menu_class' => 'nav-menu',
											'theme_location' => 'primary-menu',
											'depth' => 1,
											'fallback_cb' => '__return_false',
											'walker' => $walker
										);
										wp_nav_menu( $defaults ); ?>
			</nav>
		</header>
		<script type="text/javascript">
			jQuery('.main-header').height(jQuery(window).height());
		</script>
