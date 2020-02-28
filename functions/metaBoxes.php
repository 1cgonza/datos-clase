<?php

function filerStudents($students) {
	$options = array();

	foreach ($students as $student) {
    $options[$student->slug] = $student->name;
	}

	return $options;
}

add_action( 'cmb2_init', 'dyrCustomMeta' );
/**
 * Hook in and add a box to be available in the CMB2 REST API. Can only happen on the 'cmb2_init' hook.
 * More info: https://github.com/CMB2/CMB2/wiki/REST-API
 */
function dyrCustomMeta() {
	$prefix = 'dyr_';

	$map = new_cmb2_box( array(
		'id'            => $prefix . 'map',
		'title'         => esc_html__( 'Mapa', 'dyr' ),
		'object_types'  => array( 'page' ),
	));

	$map->add_field( array(
		'name' => 'Access Token',
		'desc' => 'De Mapbox',
		'type' => 'text',
		'id'   => $prefix . 'map_access_token'
	));

	$map->add_field( array(
		'name' => 'Style ID',
		'desc' => 'De Mapbox - Ejemplo: mapbox://styles/....',
		'type' => 'text',
		'id'   => $prefix . 'map_style_id'
	));

	$map->add_field( array(
		'name' => 'Zoom',
		'desc' => '',
		'type' => 'text_small',
		'id'   => $prefix . 'map_zoom'
	));

	$map->add_field( array(
		'name' => 'Center',
		'desc' => 'Ejemplo: [-74.065, 4.601458]',
		'type' => 'text',
		'id'   => $prefix . 'map_center'
	));

	$points = $map->add_field( array(
		'id'          => $prefix . 'map_points',
		'type'        => 'group',
		'name'				=> __('Puntos', 'dyr'),
		'description' => '',
		'options'     => array(
			'group_title'       => __( 'Punto {#}', 'dyr' ),
			'add_button'        => __( 'Agregar nuevo punto', 'dyr' ),
			'remove_button'     => __( 'Eleminar punto', 'dyr' ),
			'sortable'          => true,
			'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'dyr' ), // Performs confirmation before removing group.
		),
	));

	$map->add_group_field( $points, array(
		'name' => __( 'Título', 'dyr' ),
		'id'   => 'map_title',
		'type' => 'text',
	) );

	$map->add_group_field( $points, array(
		'name' => __( 'Latitud', 'dyr' ),
		'id'   => 'map_lat',
		'type' => 'text_small',
	));

	$map->add_group_field( $points, array(
		'name' => __( 'Longitud', 'dyr' ),
		'id'   => 'map_lon',
		'type' => 'text_small',
	));

	$map->add_group_field( $points, array(
		'name'    => 'Estudiante(s)',
		'id'      => 'map_students',
		'type'    => 'multicheck',
		'options' => filerStudents(get_terms(array(
			'taxonomy' => 'estudiantes',
			'hide_empty' => false,
		)))
	));

	$map->add_group_field( $points, array(
		'name' => __( 'oEmbed', 'dyr' ),
		'desc' => 'Enter a youtube, twitter, or instagram URL. Supports services listed at <a href="https://wordpress.org/support/article/embeds/" target="_blank">https://wordpress.org/support/article/embeds</a>.',
		'id'   => 'map_embed',
		'type' => 'oembed',
	));
}