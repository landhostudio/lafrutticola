<article class="home">
  
  <?php if (has_post_thumbnail()): ?>
    <div class="hero">
      <div class="hero__container">
        <div class="hero__image">
          <?php the_post_thumbnail('large'); ?>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <?php if (get_field('home_headings_title') || get_field('home_headings_text') || get_field('home_headings_btn')): ?>
    <div class="heading">
      <div class="container">
        <?php if (get_field('home_headings_title')): ?>
          <h2 itemprop="headline"><?php the_field('home_headings_title'); ?></h2>
        <?php endif; ?>

        <?php if (get_field('home_headings_text')): ?>
          <p><?php the_field('home_headings_text'); ?></p>
        <?php endif; ?>
        
        <?php
          $page_link_btn = get_field('home_headings_btn', false, false);
          if ($page_link_btn):
        ?>
          <div class="heading__btn">
            <a href="<?php echo get_the_permalink($page_link_btn); ?>" rel="bookmark" class="btn"><?php echo get_the_title($page_link_btn); ?></a>
          </div>
        <?php endif; ?>
      </div>
    </div>
  <?php endif; ?>
</article>
