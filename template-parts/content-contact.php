<article class="contact">

  <?php
    $location = get_field('contact_map');
    if ($location):
  ?>
    <div class="map">
      <div class="map__object">
        <div class="map__canvas">
          <div class="map__marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
        </div>
      </div>
    </div>
  <?php elseif (has_post_thumbnail()): ?>
    <div class="hero">
      <div class="hero__container">
        <div class="hero__image">
          <?php the_post_thumbnail('large'); ?>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <?php if (get_field('contact_headings_title') || get_field('contact_headings_text')): ?>
    <div class="heading">
      <div class="container">
        <?php if (get_field('contact_headings_title')): ?>
          <h2 itemprop="headline"><?php the_field('contact_headings_title'); ?></h2>
        <?php endif; ?>

        <?php if (get_field('contact_headings_text')): ?>
          <p><?php the_field('contact_headings_text'); ?></p>
        <?php endif; ?>
      </div>
    </div>
  <?php endif; ?>

  <?php if (get_field('contact_body')): ?>
    <div class="body">
      <div class="container">
        <?php the_field('contact_body'); ?>
      </div>
    </div>
  <?php endif; ?>

</article>
