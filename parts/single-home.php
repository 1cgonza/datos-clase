<?php while ( have_posts() ) : the_post(); ?>
  <div class="pageContent"><?php the_content(); ?></div>
<?php endwhile;