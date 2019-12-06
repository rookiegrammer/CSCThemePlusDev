<?php get_header(); ?>

		<main class="main-content">
			<?php
				if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<article class="post">
					<header class="parallax entry-header">
						<h1 class="entry-title" style="padding-bottom: 0.5em"><?php the_title(); ?></h1>
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
						<?php edit_post_link( 'Edit this page', '<div>', '<a href="'.get_bloginfo('url').'" class="button bordered">Return Front Page</a></div>', '', 'button bordered' ) ?>
					</div>
				</article>
			<?php
				endwhile;
				endif; ?>

		</main>
		<section id="tsBox" class="mini" data-tsscatch="false" style="padding-top: 2em;">
			<div class="headline-slider" data-tsswidth="100" data-tssspeed="200" data-tssjump="2">
				<div class="tslider tsLeft" onclick="tsScrollLeft(this)">
				</div>
				<?php $walker = new Menu_With_Description; ?>
				<?php wp_nav_menu( array( 'theme_location' => 'thumbnail-menu', 'menu_class' => 'slides', 'walker' => $walker , 'fallback_cb' => '__return_false', 'container' => false, 'depth' => 1)); ?>
				<div class="tslider tsRight" onclick="tsScrollRight(this)">
				</div>
			</div>
		</section>
<?php get_footer(); ?>
