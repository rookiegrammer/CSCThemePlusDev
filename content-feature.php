<?php 

  $num_posts = -1;

  $args = array(
    'post_type' => 'feature',
    'posts_per_page' => $num_posts,
    'order' => 'ASC'
  );
  $query = new WP_Query( $args );
?>
  
<?php if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post();
  $type = get_field('style');
?>

  <section class="<?php the_field('style') ?><?php if ($type=='photo') echo ' parallax" data-dir="up" style="background-image: url('.get_field('use_photo').')'; if ($type=='patterned') echo ' parallax" data-dir="up';?>">
    <?php if( $type=='patterned' ) echo '<div class="shp-diam">' ?>
    <h3><?php the_title(); ?></h3>
    <p><?php the_content(); ?></p>
    <div class="btn-group"><?php the_field('buttons'); ?></div>
    <?php edit_post_link( 'Edit Feature', '', '', '', 'button csc square tiny btn-group'); ?> 
    <?php if( $type=='patterned' ) echo '</div>' ?>
  </section>

<?php endwhile; endif; wp_reset_postdata(); ?>