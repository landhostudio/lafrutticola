<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="pinterest" content="nopin">
    <?php wp_head(); ?>
  </head>
  <body>

    <header role="banner" class="header">
      <div class="container">

        <h1 class="header__title">
          <a rel="home" href="<?php echo esc_url(home_url('/')); ?>">
            <span class="hidden"><?php bloginfo('name'); ?></span>
            <img src="<?php bloginfo('template_url'); ?>/dist/img/logo.png" alt="">
          </a>
        </h1>

        <?php if (has_nav_menu('menu')): ?>
          <div class="header__toggle">
            <button type="button" class="btn btn--toggle" aria-label="<?php esc_html_e('Menu', 'lafrutticola'); ?>">
              <span class="hidden"><?php esc_html_e('Menu', 'lafrutticola'); ?></span>
              <span class="btn__bar" aria-hidden="true"></span>
              <span class="btn__bar" aria-hidden="true"></span>
              <span class="btn__bar" aria-hidden="true"></span>
            </button>
          </div>
        <?php endif; ?>

        <?php if (has_nav_menu('menu')): ?>
          <nav role="navigation" class="header__navigation">
            <h2 class="hidden"><?php esc_html_e('Menu', 'lafrutticola'); ?></h2>

            <ul class="no-list">
              <?php wp_nav_menu(array(
                'theme_location' => 'menu',
                'items_wrap' => '%3$s'
              )); ?>
            </ul>
          </nav>
        <?php endif; ?>

        <?php
          $languages = icl_get_languages('skip_missing=0');
          if (!empty($languages)):
        ?>
          <div class="header__languages">
            <div class="btn-group">
              <button type="button" class="btn btn--dropdown">
                <?php foreach($languages as $language): ?>
                  <?php if ($language['active']): ?>
                    <?php echo $language['native_name']; ?>
                  <?php endif; ?>
                <?php endforeach; ?>
                <span class="btn__caret" aria-hidden="true"></span>
              </button>
              <ul class="btn__dropdown" aria-labelledby="<?php esc_html_e('Lingue', 'lafrutticola'); ?>">
                <?php foreach($languages as $language): ?>
                  <?php if (!$language['active']): ?>
                    <li><a href="<?php echo $language['url']; ?>" rel="bookmark"><?php echo $language['native_name']; ?></a></li>
                  <?php endif; ?>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </header>
