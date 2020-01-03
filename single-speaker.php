<?php
get_header();
wp_enqueue_style('speaker_css', get_template_directory_uri() . '/css/style-speaker.css');
?>
		<main class="main-content">
				<style>			
					.profiles .prf-wrap {
						width: <?=csc_get_mod('display_speaker_thumb_size', '80')*2?>px;
						height: <?=csc_get_mod('display_speaker_thumb_size', '80')*2?>px;
						margin-bottom: 50px;
					}
				</style>
			<?php
				if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<article class="post">
					<header class="entry-header">
					<?php
				    if ( has_post_thumbnail() ):
				        $image_id = get_post_thumbnail_id();
				        $image_url_array = wp_get_attachment_image_src($image_id, false); ?>
				        <div class="profiles"><div class="prf-wrap">
				          <div class="diag-clip">
				            <?php the_post_thumbnail(); ?>
				          </div>
				        </div></div>
				    <?php
				    endif; ?>
						<h1 class="entry-title"><?php the_title(); ?></h1>
						<h4><?php the_field('short_description'); ?></h4>
					</header>
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