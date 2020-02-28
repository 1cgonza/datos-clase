<?php

function datosCustomTaxonomies() {
  $labels = array(
    'name' => _x( 'Estudiantes', 'taxonomy general name' ),
    'singular_name' => _x( 'Estudiante', 'taxonomy singular name' ),
    'search_items' =>  __( 'Buscar estudiantes' ),
    'all_items' => __( 'Todos los estudiantes' ),
    'parent_item' => __( 'Parent estudiante' ),
    'parent_item_colon' => __( 'Parent estudiante:' ),
    'edit_item' => __( 'Editar estudiante' ),
    'update_item' => __( 'Actualizar estudiante' ),
    'add_new_item' => __( 'Agregar nuevo estudiante' ),
    'new_item_name' => __( 'Nuevo nombre de estudiante' ),
    'menu_name' => __( 'Estudiantes' ),
  );

  register_taxonomy('estudiantes', array('post', 'page'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'show_in_rest' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'estudiante' ),
  ));
}
add_action( 'init', 'datosCustomTaxonomies', 0 );