'use strict';

const form = document.forms[0],
      urlField = form.querySelector('.url-field'),
      hiddenField = form.querySelector('.hidden-field'),
      previewArea = form.querySelector('.preview-area'),
      imgTag = previewArea.querySelector('.thumbnail'),
      btn = form.querySelector('.download-btn');

urlField.onkeyup = () =>{
  previewArea.classList.add('active');
  btn.style.pointerEvents = 'auto';
  let url = urlField.value;

  if(url.indexOf('https://www.youtube.com/watch?v=') != -1){
    let vidId = url.split('v=')[1].substring(0, 11),
        ytImgUrl = `https://img.youtube.com/vi/${vidId}/maxresdefault.jpg`;
    imgTag.src = ytImgUrl;
  }else if(url.indexOf('https://youtu.be/') != -1){
    let vidId = url.split('be/')[1].substring(0, 11),
        ytImgUrl = `https://img.youtube.com/vi/${vidId}/maxresdefault.jpg`;
    imgTag.src = ytImgUrl;
  }else if(url.match(/\.(jpe?g|png|gif|bmp|webp)$/i)){
    imgTag.src = url;
  }else{
    imgTag.src = '';
    btn.style.pointerEvents = 'none';
    previewArea.classList.remove('active');
  }

  hiddenField.value = imgTag.src;
};

form.onsubmit = event => event.preventDefault();