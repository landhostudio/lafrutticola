<?php

  if (!function_exists('lafrutticola_setup')) {

    function lafrutticola_setup() {
      
      // Let WordPress manage the document title -------------------------------
			
      add_theme_support('title-tag');

			// Enable support for Post Thumbnails on posts and pages -----------------

      add_theme_support('post-thumbnails');
      the_post_thumbnail('thumbnail');
      set_post_thumbnail_size(640, 640, array('center', 'center'));
      the_post_thumbnail('medium', 960, 540, array('center', 'center'));
      the_post_thumbnail('large', 1920, 1080, array('center', 'center'));

			// Enables dynamic navigation --------------------------------------------

      register_nav_menus( array(
				'menu' => 'Menu'
			));

      // Load the assets -------------------------------------------------------
			
			function init_assets() {
        wp_enqueue_style('css', get_template_directory_uri() . '/dist/css/all.css', array(), '1.0.0');
        wp_enqueue_script('plugins', get_template_directory_uri() . '/dist/js/plugins.js', array('jquery'), '1.0.0', true);
        
        if (is_page_template('template-pages/contact.php')) {
          wp_enqueue_script('google-maps-api', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBqnhs5JiLTCagZgD96mTe8y4HXMJmkIpE', array(), '1.0.0', true);
        }
        
        wp_enqueue_script('scripts', get_template_directory_uri() . '/dist/js/scripts.js', array('jquery'), '1.0.0', true);
			}
			add_action('wp_enqueue_scripts', 'init_assets');
      
      // Content Width ---------------------------------------------------------
      
      if (!isset($content_width)) $content_width = 1280;

      // Soil ------------------------------------------------------------------
      
      get_template_part('inc/soil');
      
      // Enabled Custom Post Type ----------------------------------------------

      get_template_part('inc/cpt');

      // Advanced Custom Fields ------------------------------------------------

      get_template_part('inc/acf');

      // Remove WPML front-end assets ------------------------------------------

      define('ICL_DONT_LOAD_NAVIGATION_CSS', true);
      define('ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true);
      define('ICL_DONT_LOAD_LANGUAGES_JS', true);
      define('ICL_DONT_PROMOTE', true);
      global $sitepress;
      remove_action('wp_head', array($sitepress, 'meta_generator_tag'));
      
      // Tools -----------------------------------------------------------------

      function get_url_by_slug($slug) {
        $page_url_id = get_page_by_path($slug);
        $page_url_link = get_permalink($page_url_id);
        return $page_url_link;
      }

    }

  }
  add_action('after_setup_theme', 'lafrutticola_setup');
