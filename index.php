<?php get_header(); ?>

<?php if (have_posts()): ?>

  <section class="index">

    <div class="heading">
      <div class="container">
        <?php if (is_category()): ?>
          <h2 itemprop="headline"><?php single_cat_title(); ?></h2>
        <?php elseif (is_tag()): ?>
          <h2 itemprop="headline"><?php single_tag_title(); ?></h2>
        <?php elseif (is_search()): ?>
          <h2 itemprop="headline"><?php printf( __('Risultati di ricerca per: %s', 'lafrutticola'), get_search_query() ); ?></h2>
        <?php else: ?>

          <?php if (get_field('news_headings_title', get_option('page_for_posts'))): ?>
            <h2 itemprop="headline"><?php the_field('news_headings_title', get_option('page_for_posts')); ?></h2>
          <?php endif; ?>
          
          <?php if (get_field('news_headings_text', get_option('page_for_posts'))): ?>
            <p><?php the_field('news_headings_text', get_option('page_for_posts')); ?></p>
          <?php endif; ?>

        <?php endif; ?>
      </div>
    </div>

    <div class="body">
      <div class="container">
        <?php while (have_posts()): the_post(); ?>
          <?php get_template_part('template-parts/content', 'preview'); ?>
        <?php endwhile; ?>
      </div>
    </div>

  </section>
        
<?php else: ?>
  <?php get_template_part('template-parts/content', 'none'); ?>
<?php endif; ?>


<?php get_footer(); ?>
