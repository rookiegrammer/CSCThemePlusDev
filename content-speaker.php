<?php 

  $num_posts = -1;

  $args = array(
    'post_type' => 'speaker',
    'posts_per_page' => $num_posts,
    'order' => 'ASC'
  );
  $query = new WP_Query( $args );
?>
  
<?php if( $query->have_posts() ) : ?>

  <section id="speakers" class="prf-gallery dark">
    <h3 style="padding-bottom: 0.5em">Speakers</h3>
    <ul class="profiles" style="margin-left: 0">

<?php while( $query->have_posts() ) : $query->the_post(); 
    $link = get_the_permalink();
    ?> 
    <li>
      
      <?php
      if ( has_post_thumbnail() ):
        $image_id = get_post_thumbnail_id();
        $image_url_array = wp_get_attachment_image_src($image_id, false); ?>
        <div class="prf-wrap">
          <a style="color: white" href="<?= $link ?>">
          <div class="diag-clip">
            <?php the_post_thumbnail(); ?>
          </div>
          </a>
        </div>
      <?php
      endif; ?>
        <h4><a style="color: white" href="<?= $link ?>"><?php the_title(); ?></a></h4>
        <p style="word-break: break-word; color: white"><?php the_field('short_description'); ?></p>
     
      <?php edit_post_link( 'Edit Speaker', '', '', '', 'button square tiny'); ?> 
    </li>
<?php endwhile; ?>
    </ul>
  </section>

<?php endif; wp_reset_postdata(); ?>
