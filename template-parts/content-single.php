<article class="single">
  <?php if (has_post_thumbnail()): ?>
    <div class="hero">
      <div class="hero__container">
        <div class="hero__image">
          <?php the_post_thumbnail('large'); ?>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <div class="heading">
    <div class="container">
      <h2><?php the_title(); ?></h2>
      <p class="date"><?php the_date(); ?></p>
    </div>
  </div>

  <div class="body">
    <div class="container">
      <?php the_content(); ?>
      <?php $page_for_posts = get_option('page_for_posts'); ?>
      <a href="<?php echo get_permalink($page_for_posts); ?>" rel="bookmark" class="btn"><?php esc_html_e('Ritorna alle news', 'lafrutticola'); ?></a>
    </div>
  </div>

</article>
