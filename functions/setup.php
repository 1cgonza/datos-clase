  
<?php

function datosPrincipalSetup() {
  add_theme_support('post-thumbnails');

  register_nav_menus( array(
    'main' => __( 'Main Menu', 'datos-principal' ),
    'footer'  => __( 'Footer Menu', 'datos-principal' ),
) );
}

add_action('after_setup_theme', 'datosPrincipalSetup');