<?php if (get_field('options_cookies_text', option) || get_field('options_cookies_link', option)): ?>
  <div class="cookies">
    <div class="container">
      <?php if (get_field('options_cookies_text', option)): ?>
        <p><?php the_field('options_cookies_text', option); ?></p>
      <?php endif; ?>

      <?php if (get_field('options_cookies_link', option)): ?>
        <div class="btn-group">
          <a href="<?php the_field('options_cookies_link', option); ?>" class="btn"><?php esc_html_e('Approfondisci', 'lafrutticola'); ?></a>
          <button type="button" class="btn btn--active"><?php esc_html_e('Accetta', 'lafrutticola'); ?></button>
        </div>
      <?php endif; ?>
    </div>
  </div>
<?php endif; ?>
