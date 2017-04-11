<article class="index__item">
  <a rel="bookmark" href="<?php the_permalink(); ?>">
    <?php the_post_thumbnail('thumbnail'); ?>
    <h3><?php the_title(); ?></h3>
    <p class="date"><?php the_date(); ?></p>
  </a>
</article>
