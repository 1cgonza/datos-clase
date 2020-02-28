<?php
/**
* Template Name: Mapa
**/
$prefix = 'dyr_';

get_header();

while ( have_posts() ) : the_post();
$token = get_post_meta( get_the_ID(), $prefix . 'map_access_token', true );
$style = get_post_meta( get_the_ID(), $prefix . 'map_style_id', true );
$zoom = get_post_meta( get_the_ID(), $prefix . 'map_zoom', true );
$center = get_post_meta( get_the_ID(), $prefix . 'map_center', true );

?>
<script>
  var mapToken = "<?php echo $token; ?>";
  var mapStyle = "<?php echo $style; ?>";
  var mapZoom = <?php echo $zoom; ?>;
  var mapCenter = <?php echo $center; ?>;

</script>
<div id="map"></div>
<?php endwhile;
get_footer();
