<?php
$prefix = 'dyr_';
$postID = get_the_ID();
// Mapa
$token = get_post_meta( $postID, $prefix . 'map_access_token', true );

$gallFiles = get_post_meta( $postID, $prefix . 'gallery_files_items', true);
$gallEmbeds = get_post_meta( $postID, $prefix . 'gallery_oembeds_items', true);

if (!empty($token)) :
  $style = get_post_meta( $postID, $prefix . 'map_style_id', true );
  $zoom = get_post_meta( $postID, $prefix . 'map_zoom', true );
  $center = get_post_meta( $postID, $prefix . 'map_center', true );
  ?>
  <script>
    var mapToken = "<?php echo $token; ?>";
    var mapStyle = "<?php echo $style; ?>";
    var mapZoom = <?php echo $zoom; ?>;
    var mapCenter = <?php echo $center; ?>;

  </script>
  <div id="map"></div>
<?php elseif(!empty($gallFiles) || !empty($gallEmbeds)) :

?>
<?php endif;