<?php get_header();
$csc = get_template_directory_uri();
?>
		<section id="tsBox" class="mini" data-tsscatch="false">
			<div class="headline-slider" data-tssspeed="200" data-tssjump="2">
				<div class="tslider tsLeft" onclick="tsScrollLeft(this)">
				</div>

				<?php
					$settings_mwd = array(
						'theme_location' => 'thumbnail-menu',
						'menu_class' => 'slides',
						'walker' => (new Menu_With_Description),
						'fallback_cb' => '__return_false',
						'container' => false,
						'depth' => 1);
					wp_nav_menu($settings_mwd);
				?>

				<div class="tslider tsRight" onclick="tsScrollRight(this)">
				</div>
			</div>
		</section>
		<main class="feature-content">
			<?php get_template_part('content', 'feature'); ?>
			<?php get_template_part('content', 'speaker'); ?>
		</main>
		<section class="posts">
			<h3 class="">Latest Posts</h3>
<?php 			$counter = 1;
				if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<a class="post-link" href="<?php the_permalink(); ?>">
					<article class="post-preview">
						<div class="flt">
							<div class="flt-wrap"><?= $counter++ ?></div>
							<div class="flt-bg">
<?php 						if ( has_post_thumbnail() ):
								$thumb_id = get_post_thumbnail_id();
								$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'medium', false); ?>
								<img class="fill" src=" <?= $thumb_url_array[0]; ?> ">
<?php 						endif; ?>
							</div>
						</div>
						<div class="info">
							<header>
								<h1 class="entry-title"><?php the_title(); ?></h1>
								<h2 class="entry-date"><?php the_time('F j, Y'); ?></h2>
							</header>
							<div class="entry-content">
								<?php the_excerpt(); ?>
							</div>
						</div>
					</article>
					</a>
			<?php
				endwhile;
				else: ?>
					<p>
						<?php _e( 'Nothing to show you.' );?>
					</p>
			<?php 
				endif; ?>
		</section>
		<?php if (get_theme_mod('display_alert_enable', 'checked')=='checked') : ?>
		<aside class="alert-bar">
			<a class="fa fa-close" href="#" onclick="closeMe(this)"></a>
			<?= get_theme_mod('display_alert_text', 'Papers are still accepted! Send one?') ?>
			<a class="button csc bordered white tpadding" href="<?= get_theme_mod('display_alert_link', '#') ?>"><?= get_theme_mod('display_alert_link_text', 'Send') ?></a>
		</aside>
		<?php endif; ?>
<?php get_footer(); ?>