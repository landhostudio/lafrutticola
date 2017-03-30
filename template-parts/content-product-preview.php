<article class="products__item"<?php $product_terms = wp_get_object_terms($post->ID, 'tipologia'); $product_count = count($product_terms); if ($product_count > 0) { $term_list = []; echo ' data-category="'; foreach ($product_terms as $product_term) { $term_list[] = esc_html($product_term->slug); }; echo implode(' ', $term_list); echo '"'; } ?>>
  <a href="<?php the_permalink(); ?>" rel="bookmark">
    <?php the_post_thumbnail('thumbnail'); ?>

    <h2><?php the_title(); ?></h2>

    <?php
      $product_terms = wp_get_object_terms($post->ID, 'tipologia');
      $product_count = count($product_terms);
      if ($product_count > 0):
    ?>
      <ul class="inline-list">
        <?php foreach ($product_terms as $product_term): ?>
          <li><?php echo  $product_term->name; ?></li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>
  </a>
</article>
