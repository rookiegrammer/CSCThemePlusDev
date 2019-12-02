<?php get_header(); ?>
<?php
		if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<main class="main-content">
			<article class="post">
				<header class="parallax entry-header">
					<h1 class="entry-title"><?php the_title(); ?></h1>
					<h2 class="entry-date"><span style="font-size: <?= get_theme_mod('display_post_date_scale', '1.0')?>em"><?php the_date(); ?></span></h2>
				</header>
				<style type="text/css">
					.post > .entry-header {
<?php
							if ( has_post_thumbnail() ):
								$image_id = get_post_thumbnail_id();
								$image_url_array = wp_get_attachment_image_src($image_id, false); ?>
								background-image: url(<?= $image_url_array[0]; ?>);
<?php 
							else: ?>
								height: auto;
								padding-top: 1em; }
							.post .entry-title, .post .entry-date {
								text-shadow: none; 
								color: black }
							.post > .entry-header::after {
								content: none;
<?php
							endif; ?>
					}
				</style>
				<div class="entry-content" style="padding: 1em 10% 4em 10%;">
					<?php the_content(); ?>
					<?php edit_post_link( 'Edit this post', '<div>', '<a href="'.get_bloginfo('url').'" class="button bordered">Return Front Page</a></div>', '', 'button bordered' ) ?>
				</div>
			</article>
		</main>
		<?php
			$next_post = get_adjacent_post(false, '', false); 
			if ( !empty($next_post) ) : ?>
			<section class="posts preview">
				<h3 class="">Up next</h3>
					<a class="post-link" href="<?= get_permalink($next_post->ID) ?>">
						<article class="post-preview">
							<div class="flt">
								<div class="flt-wrap">&#9658;</div>
								<div class="flt-bg">
<?php 							$thumb_id = get_post_thumbnail_id( $next_post->ID );
								if ( !empty($thumb_id) ):
									$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'medium', false); ?>
									<img class="fill" src=" <?= $thumb_url_array[0]; ?> ">
<?php 							endif; ?>
								</div>
							</div>
							<div class="info">
								<header>
									<h1 class="entry-title"><?= $next_post->post_title; ?></h1>
									<h2 class="entry-date"><?= get_the_date( 'F j, Y', $next_post->ID); ?></h2>
								</header>
								<div class="entry-content">
									<?= wp_trim_words( wp_html_excerpt( strip_shortcodes(get_post($next_post->ID)->post_content)),55,'...') ?>
								</div>
							</div>
						</article>
					</a>
			</section>
<?php
		endif;
		endwhile;
		endif;
		wp_reset_postdata();
		?>
		<section id="tsBox" class="mini" data-tsscatch="false" style="padding-top: 2em;">
			<div class="headline-slider" data-tsswidth="100" data-tssspeed="200" data-tssjump="2">
				<div class="tslider tsLeft" onclick="tsScrollLeft(this)">
				</div>
<?php
				$walker = new Menu_With_Description;
				wp_nav_menu( array( 'theme_location' => 'thumbnail-menu', 'menu_class' => 'slides', 'walker' => $walker , 'fallback_cb' => '__return_false', 'container' => false, 'depth' => 1)); ?>
				<div class="tslider tsRight" onclick="tsScrollRight(this)">
				</div>
			</div>
		</section>
<?php get_footer(); ?>