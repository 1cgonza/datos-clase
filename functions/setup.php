  <?php

function datosPrincipalSetup() {
  add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));
  add_theme_support('post-thumbnails');
  add_theme_support('title-tag');
  add_theme_support('automatic-feed-links');

  register_nav_menus( array(
    'main' => __('Main Menu', 'datos-principal'),
    'footer'  => __('Footer Menu', 'datos-principal'),
) );
}

add_action('after_setup_theme', 'datosPrincipalSetup');