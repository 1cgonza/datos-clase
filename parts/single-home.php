<?php

while ( have_posts() ) : the_post(); 
  $link = get_permalink();
  // $defaultImgID = get_post_thumbnail_id(get_the_ID());
  // $srcset = wp_get_attachment_image_srcset($defaultImgID, 'large');
  // $sizes = wp_get_attachment_image_sizes($defaultImgID, 'large');
  $img = get_the_post_thumbnail( get_the_ID(), 'thumbnail');
  // var_dump($sizes);
?>
  <div <?php post_class('homePost'); ?>>
    <h2>
      <a href="<?php echo $link; ?>" title="<?php the_title_attribute(); ?>">
        <?php the_title(); ?>
      </a>
    </h2>

    <a class="postThumbnail" href="<?php echo $link; ?>" title="<?php the_title_attribute(); ?>">
      <?php echo $img; ?>
    </a>
    
    <div class="pageContent"><?php the_content(); ?></div>
  </div>
<?php endwhile;