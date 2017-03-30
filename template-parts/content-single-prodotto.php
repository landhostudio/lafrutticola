<article class="single single--product">

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

      <?php
        $product_terms = get_the_terms($post->ID, 'tipologia');
        $product_count = count($product_terms);
        if ($product_count > 0):
      ?>
        <ul class="inline-list">
          <?php foreach ($product_terms as $product_term): ?>
            <li><?php echo $product_term->name; ?></li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>
    </div>
  </div>

  <div class="body">
    <div class="container">
      <?php the_content(); ?>
    </div>
  </div>
</article>
