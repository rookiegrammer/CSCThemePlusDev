			<section>
				<h3 class="serif center large">Made possible by</h3>
				<ul class="strip partners">
					<li><a href="http://csc.upb.edu.ph">
						<img src="<?php echo get_template_directory_uri() ?>/img/csc.png">
					</a></li>
					<li><a href="http://upb.edu.ph">
						<img src="<?php echo get_template_directory_uri() ?>/img/up.png">
					</a></li>
				</ul>
			</section>
		</div>
		<footer id="cscbottom">
			<ul class="strip social">
				<?php if (get_theme_mod('social_facebook')) : ?><li class="inline-block"><a class="fa fa-facebook" href="<?= get_theme_mod('social_facebook') ?>"></a></li><?php endif; ?>
				<?php if (get_theme_mod('social_twitter')) : ?><li class="inline-block"><a class="fa fa-twitter" href="<?= get_theme_mod('social_twitter') ?>"></a></li><?php endif; ?>
			</ul>
			<p class="credits">&copy; UPB Cordillera Studies <?php echo date('Y'); ?>. All rights reserved.
			</p>
		</footer>

		<style type="text/css">
			.nav-wrap {
				width: 350px;
				height: 175px;
			}
		</style>
		<script type="text/javascript">
<?php 			
				if ( !is_home() ) : ?>
				jQuery('#cscbottom').css('padding-bottom', jQuery('.navcenter').height()/2+'px'); 
<?php 			
				endif; ?>
		</script>
		<?php wp_footer(); ?>
	</body>
</html>