<?php

function datosPrincipalGoogleFonts() {
  $url = '';
  $fonts = array();
  $fonts[] = 'Share+Tech+Mono';
  // $fonts[] = 'otra fuente';

  if (!empty($fonts)) {
    $url = add_query_arg(
      array(
        'family' => implode('|', $fonts),
        'display' => 'swap'
      ), 'https://fonts.googleapis.com/css');

  }
  return $url;
}

function datosPrincipalEnqueueScripts() {
  if (!is_admin()) {
    wp_deregister_script('jquery');
    wp_enqueue_script('theme-bundle-js', get_template_directory_uri() . '/dist/app.js', array(), null, true);

    wp_enqueue_style('google-fonts', datosPrincipalGoogleFonts(), array(), null);
    wp_enqueue_style('theme-bundle-css', get_template_directory_uri() . '/dist/app.css', array(), null, 'all');

    $templateUrl = array('templateUrl' => get_stylesheet_directory_uri());
    wp_localize_script('theme-bundle-js', 'basePath', $templateUrl);
  }
}
add_action('wp_enqueue_scripts', 'datosPrincipalEnqueueScripts', 999);
