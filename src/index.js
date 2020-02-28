import './scss/styles.scss';
import mapbox from 'mapbox-gl';

mapbox.accessToken = mapToken;
var map = new mapbox.Map({
  container: 'map',
  style: mapStyle,
  zoom: mapZoom,
  center: mapCenter
});
