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
    </div>
  </div>

  <div class="body">
    <div class="container">
      <?php the_content(); ?>
    </div>
  </div>

</article>
