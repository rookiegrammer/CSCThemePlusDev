<?php

get_header();
wp_enqueue_style('mfp-lightbox-css', 'https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.1/css/lightbox.min.css');
?>
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
      <div class="entry-content" style="padding: 1em 10% 0 10%;">
        <?php the_content(); ?>
        <?php edit_post_link( 'Edit info', '<div>', '<a href="'.get_bloginfo('url').'" class="button bordered">Return Front Page</a></div>', '', 'button bordered' ) ?>
      </div>
      <div class="entry-gallery" style="padding: 0 12% 4em 12%; box-sizing: border-box">
        <?php $images = acf_photo_gallery('gallery', get_the_ID() );
          if ( count($images) ) : ?>
        <h2 class="text-center" style="padding: 2em 0 0.5em; font-weight: normal">Conference Gallery</h1>
        <div class="event-grid-loading"><span class="secondary label" style="font-weight: bold">Loading...</span></div>
        <div class="event-grid">
          <?php
              foreach ($images as $image) :
                $id = $image['id']; // The attachment id of the media
                $title = $image['title']; //The title
                $caption= $image['caption']; //The caption
                $full_image_url= $image['full_image_url']; //Full size image url
                $resize_image_url = wp_get_attachment_image_src($id, 'medium');
                $resize_image_url = ! empty($resize_image_url) ? $resize_image_url[0] : '';
                $url= $image['url']; //Goto any link when clicked
                $target= $image['target']; //Open normal or new tab
                $alt = get_field('photo_gallery_alt', $id); //Get the alt which is a extra field (See below how to add extra fields)
                $class = get_field('photo_gallery_class', $id); //Get the class which is a extra field (See below how to add extra fields)
              ?>
              <a class="event-grid-item" href="<?= $full_image_url ?>" data-lightbox="gallery" data-title="<?php echo $caption; ?>">
                  <img class="no-style" src="<?= $full_image_url ?>" alt="<?= $alt ?>">
              </a>
          <?php
            endforeach;
          ?>
        </div>
        <?php endif; ?>
      </div>


    </article>
  <?php
    endwhile;
    endif; ?>

</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.1/js/lightbox.min.js"></script>
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
<script>
(function($) {
  $( window ).on( "load", function() {
    $('.event-grid').masonry({
      itemSelector: '.event-grid-item',
      gutter: 0
    }).css('opacity', 1);
    $('.event-grid-loading').css('display', 'none');
  });
})(jQuery);
</script>
<?php get_footer(); ?>
