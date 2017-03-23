<article class="body__item"<?php $product_terms = wp_get_object_terms($post->ID, 'tipologia'); $product_count = count($product_terms); if ($product_count > 0) { echo ' data-filter="'; foreach ($product_terms as $product_term) { $product_term_name = $product_term->name; $product_term_name_remove_accents = remove_accents($product_term_name); $product_term_name_ignore = array(" ", "’"); echo str_replace($product_term_name_ignore, "-", strtolower($product_term_name_remove_accents)); }; echo '"'; } ?>>

  <?php the_post_thumbnail('thumbnail'); ?>

  <h2>
    <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
  </h2>

  <?php
    $product_terms = wp_get_object_terms($post->ID, 'tipologia');
    $product_count = count($product_terms);
    if ($product_count > 0):
  ?>
    <ul class="categories">
      <?php foreach ($product_terms as $product_term): ?>
        <li><?php echo  $product_term->name; ?></li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>

  <?php the_excerpt(); ?>

</article>
