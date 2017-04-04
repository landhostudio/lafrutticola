<article class="page">
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

      <?php if (get_field('page_headings_title')): ?>
        <h2 itemprop="headline"><?php the_field('page_headings_title'); ?></h2>
      <?php else: ?>
        <h2 itemprop="headline"><?php the_title(); ?></h2>
      <?php endif; ?>

      <?php if (get_field('page_headings_text')): ?>
        <p><?php the_field('page_headings_text'); ?></p>
      <?php endif; ?>
      
    </div>
  </div>

  <div class="body">
    <div class="container">
      <?php the_content(); ?>
    </div>
  </div>
</article>
