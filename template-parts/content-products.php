<article class="products">
  
  <?php if (has_post_thumbnail()): ?>
    <div class="hero">
      <div class="hero__container">
        <div class="hero__image">
          <?php the_post_thumbnail('large'); ?>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <?php if (get_field('products_headings_title') || get_field('products_headings_text')): ?>
    <div class="heading">
      <div class="container">
        <?php if (get_field('products_headings_title')): ?>
          <h2 itemprop="headline"><?php the_field('products_headings_title'); ?></h2>
        <?php endif; ?>

        <?php if (get_field('products_headings_text')): ?>
          <p><?php the_field('products_headings_text'); ?></p>
        <?php endif; ?>
      </div>
    </div>
  <?php endif; ?>

  <div class="body">
    <?php
      $args = array(
        'post_type' => 'prodotto',
        'nopaging' => true
      );
      $the_query = new WP_Query($args);
      if ($the_query->have_posts()):
    ?>
      <div class="container">
        <h3><?php esc_html_e('Tipologie:', 'lafrutticola'); ?></h3>

        <?php
          $products_terms = get_terms('tipologia');
          $products_count = count($products_terms);
          if ($products_count > 0):
        ?>
          <div class="group">
            <?php
              foreach ($products_terms as $products_term):
              $products_term_name = $products_term->name;
              $products_term_name_remove_accents = remove_accents($products_term_name);
              $products_term_name_ignore = array(" ", "’");
            ?>
              <button type="button" data-filter="<?php echo (str_replace($products_term_name_ignore, "-", strtolower($products_term_name_remove_accents))); ?>" tabindex="-1"><?php echo $products_term_name; ?></button>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>

      </div>

      <div class="container">
        <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
          <?php get_template_part('template-parts/content', 'product-preview'); ?>
        <?php
          endwhile;
          wp_reset_postdata();
        ?>
      </div>
    <?php else: ?>
      <?php get_template_part('template-parts/content', 'none'); ?>
    <?php endif; ?>
  </div>

</article>
