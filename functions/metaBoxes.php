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

	$students = get_terms(array(
		'taxonomy' => 'estudiantes',
		'hide_empty' => false,
	));

	$map = new_cmb2_box( array(
		'id'            => $prefix . 'map',
		'title'         => esc_html__( 'Mapa', 'dyr' ),
		'object_types'  => array( 'post' ),
		'closed' => true
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
		'options' => filerStudents($students)
	));

	$map->add_group_field( $points, array(
		'name' => __( 'oEmbed', 'dyr' ),
		'desc' => 'Enter a youtube, twitter, or instagram URL. Supports services listed at <a href="https://wordpress.org/support/article/embeds/" target="_blank">https://wordpress.org/support/article/embeds</a>.',
		'id'   => 'map_embed',
		'type' => 'oembed',
	));

	// ...::: Galería oEmbeds :::... 
	$gallOembeds = new_cmb2_box( array(
		'id'            => $prefix . 'gallery_oembeds',
		'title'         => esc_html__( 'Galería oEmbeds', 'dyr' ),
		'object_types'  => array( 'post' ),
		'closed' => true
	));

	$gallOembedItems = $gallOembeds->add_field( array(
		'id'          => $prefix . 'gallery_oembeds_items',
		'type'        => 'group',
		'name'				=> __('Elementos', 'dyr'),
		'description' => '',
		'options'     => array(
			'group_title'       => __( 'Elemento {#}', 'dyr' ),
			'add_button'        => __( 'Agregar nuevo elemento', 'dyr' ),
			'remove_button'     => __( 'Eleminar elemento', 'dyr' ),
			'sortable'          => true,
			'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'dyr' ), // Performs confirmation before removing group.
		),
	));

	$gallOembeds->add_group_field( $gallOembedItems, array(
		'name' => __( 'Título', 'dyr' ),
		'id'   => 'item_title',
		'type' => 'text',
	));

	$gallOembeds->add_group_field( $gallOembedItems, array(
		'name' => __( 'oEmbed', 'dyr' ),
		'desc' => 'Enter a youtube, twitter, or instagram URL. Supports services listed at <a href="https://wordpress.org/support/article/embeds/" target="_blank">https://wordpress.org/support/article/embeds</a>.',
		'id'   => 'item_embed',
		'type' => 'oembed',
	));

	$gallOembeds->add_group_field( $gallOembedItems, array(
		'name'    => 'Estudiante(s)',
		'id'      => 'item_students',
		'type'    => 'multicheck',
		'options' => filerStudents($students)
	));

	// ...::: Galería archivos :::...
	$gallFiles = new_cmb2_box( array(
		'id'            => $prefix . 'gallery_files',
		'title'         => esc_html__( 'Galería archivos', 'dyr' ),
		'object_types'  => array( 'post' ),
		'closed' => true
	));

	$gallFilesItems = $gallFiles->add_field( array(
		'id'          => $prefix . 'gallery_files_items',
		'type'        => 'group',
		'name'				=> __('Elementos', 'dyr'),
		'description' => '',
		'options'     => array(
			'group_title'       => __( 'Elemento {#}', 'dyr' ),
			'add_button'        => __( 'Agregar nuevo elemento', 'dyr' ),
			'remove_button'     => __( 'Eleminar elemento', 'dyr' ),
			'sortable'          => true,
			'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'dyr' ), // Performs confirmation before removing group.
		),
	));

	$gallFiles->add_group_field( $gallFilesItems, array(
		'name' => __( 'Título', 'dyr' ),
		'id'   => 'item_title',
		'type' => 'text',
	));

	$gallFiles->add_group_field(  $gallFilesItems, array(
		'name' => 'Archivos',
		'desc' => '',
		'id'   => 'item_gallery',
		'type' => 'file_list',
		// 'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
		// 'query_args' => array( 'type' => 'image' ), // Only images attachment
		// Optional, override default text strings
		'text' => array(
			'add_upload_files_text' => 'Agregar archivo',
			'remove_image_text' => 'Eliminar archivo',
			'file_text' => 'Archivo:',
			'file_download_text' => 'Descargar',
			'remove_text' => 'Eliminar',
		),
	));

	$gallFiles->add_group_field( $gallFilesItems, array(
		'name'    => 'Estudiante(s)',
		'id'      => 'item_students',
		'type'    => 'multicheck',
		'options' => filerStudents($students)
	));
}