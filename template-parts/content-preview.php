<article class="body__item">
  <a rel="bookmark" href="<?php the_permalink(); ?>">
    <?php the_post_thumbnail('thumbnail'); ?>
    <h3><?php the_title(); ?></h3>
    <?php the_excerpt(); ?>
  </a>
</article>
