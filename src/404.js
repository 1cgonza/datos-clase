import { random } from './utils/helpers';
const key = 't8YgnQtOmuDXT3JZaQJnvr821NyAXZrw';
const searchFor = '404+error';
const url = `//api.giphy.com/v1/gifs/search?api_key=${key}&q=${searchFor}&limit=25&offset=0&rating=G&lang=en`;

var oReq = new XMLHttpRequest();
oReq.addEventListener('load', onLoad);
oReq.open('GET', url);
oReq.send();

function onLoad() {
  const res = JSON.parse(this.response);

  if (res.meta.status == '200') {
    const d = res.data[random(0, res.data.length - 1)];
    const img = new Image();
    img.onload = () => {
      document.getElementById('gifContainer').appendChild(img);
    };
    img.src = d.images.downsized_large.url;
  }
}
