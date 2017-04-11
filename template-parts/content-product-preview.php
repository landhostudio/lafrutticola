<article class="products__item"<?php $product_terms = wp_get_object_terms($post->ID, 'tipologia'); $product_count = count($product_terms); if ($product_count > 0) { $term_list = []; echo ' data-category="'; foreach ($product_terms as $product_term) { $term_list[] = esc_html($product_term->slug); }; echo implode(' ', $term_list); echo '"'; } ?>>
  <a href="<?php the_permalink(); ?>" rel="bookmark">
    <?php the_post_thumbnail('thumbnail'); ?>

    <h3><?php the_title(); ?></h3>

    <?php
      $product_terms = wp_get_object_terms($post->ID, 'tipologia');
      $product_count = count($product_terms);
      if ($product_count > 0):
    ?>
      <ul class="no-list no-list--tag">
        <?php foreach ($product_terms as $product_term): ?>
          <li><?php echo  $product_term->name; ?></li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>
  </a>
</article>
