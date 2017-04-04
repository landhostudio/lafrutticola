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

  <div class="products">
    <div class="container">

      <?php
        $args = array(
          'post_type' => 'prodotto',
          'orderby' => 'menu_order',
          'nopaging' => true
        );
        $the_query = new WP_Query($args);
        if ($the_query->have_posts()):
      ?>
        <?php
          $products_terms = get_terms('tipologia');
          $products_count = count($products_terms);
          if ($products_count > 0):
        ?>
          <div class="products__filter">
            <h3><?php esc_html_e('Tipologie:', 'lafrutticola'); ?></h3>
            <div class="btn-group">
              <button type="button" class="btn btn--active" data-filter="all"><?php esc_html_e('Tutti i prodotti', 'lafrutticola'); ?></button>
              <?php foreach ($products_terms as $products_term): ?>
                <button type="button" class="btn" data-filter="<?php echo $products_term->slug; ?>"><?php echo $products_term->name; ?></button>
              <?php endforeach; ?>
            </div>
          </div>
        <?php endif; ?>

        <div class="products__items">
          <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
            <?php get_template_part('template-parts/content', 'product-preview'); ?>
          <?php
            endwhile;
            wp_reset_postdata();
          ?>
          </div>
        </div>
      <?php else: ?>
        <?php get_template_part('template-parts/content', 'none'); ?>
      <?php endif; ?>
  </div>

</article>
