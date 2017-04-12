<?php

function landho_dashboard_widget() {
  wp_add_dashboard_widget(
    'landho_dashboard_widget',         // Widget slug.
    'Land Ho',         // Title.
    'landho_dashboard_widget_function' // Display function.
  );
}
add_action('wp_dashboard_setup', 'landho_dashboard_widget');

/**
 * Create the function to output the contents of our Dashboard Widget.
 */

function landho_dashboard_widget_function() {

  echo
    '<ul>',
      '<li><a href="mailto:roman@landhostudio.com">Assistenza tecnica</a></li>',
      '<li><a href="mailto:danielbedusa@landhostudio.com">Assistenza commerciale</a></li>',
    '</ul>';

}