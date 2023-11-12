const views = document.querySelectorAll('.view');
const decs = document.querySelectorAll('.dec');
const incs = document.querySelectorAll('.inc');
let count = 1;

document.querySelector('.small')

const close = () => {
  document.querySelector('.mobile-list').style.maxHeight = "0px";
}

document.querySelector('.navbtn').onclick = e => {
  ls = document.querySelectorAll('.lines');
  for(l of ls) {
    l.classList.toggle('change');
    l.classList.contains('change') ? document.querySelector('.mobile-list').style.maxHeight = "220px" : document.querySelector('.mobile-list').style.maxHeight = "0px";
  }
}

window.onload = e => {
  device1 = matchMedia('(max-width: 320px)').matches && matchMedia('(max-height: 658px)').matches;
  
  menuPage === true || menuBracket === true ? menu() : false ;
  device();
  
  if(window.matchMedia('(max-width: 320px)').matches && window.matchMedia('(max-height: 480px)').matches) {
    
    if(menuPage === true || menuBracket === true) {
      
      window.matchMedia('(orientation: portrait)').onchange = e => {
        document.querySelector('.cbtn').previousElementSibling.style.marginTop = "50px";
      }
      
    }
    if(contactPage === true || contactBracket === true) {
      
      window.matchMedia('(orientation: portrait)').onchange = e => {
        document.querySelector('.contact-wrapper').style.height = "100vh";
      }
      window.matchMedia('(orientation: landscape)').onchange = e => {
        document.querySelector('.contact-wrapper').style.height = "auto";
      }
      
    }
  }
  if(device1 === true) {
    
    if(menuPage === true || menuBracket === true) {
      window.matchMedia('(orientation: portrait)').onchange = e => {
        document.querySelector('.cbtn').previousElementSibling.style.marginTop = "50px";
      }
    }
  } else if(matchMedia('(max-width: 658px)').matches && matchMedia('(max-height: 320px)').matches) {
    
    if(menuPage === true || menuBracket === true) {
      window.matchMedia('(orientation: landscape)').onchange = e => {
        e.target.matches ? false : document.querySelector('.cbtn').previousElementSibling.style.marginTop = "50px";
      }
    }
    
  }

}

const device = e => {
  
  width = matchMedia('(max-width: 320px)').matches;
  height = matchMedia('(max-height: 480px)').matches;
  width2 = matchMedia('(max-width: 480px)').matches;
  height2 = matchMedia('(max-height: 320px)').matches;
  device1 = matchMedia('(max-width: 320px)').matches && matchMedia('(max-height: 658px)').matches;
  
  if(width === true && height === true) {
    
    menuPage === true || menuBracket === true ?document.querySelector('.cbtn').previousElementSibling.style.marginTop = "50px" : false;
    
  } else {
    false;
  };
  if(width2 === true && height2 === true) {
    
    contactPage === true || contactBracket === true ? `${document.querySelector('.contact-wrapper').style.height = "auto"}` : false;
  }
  if(device1 === true) {
    
    menuPage === true || menuBracket === true ? document.querySelector('.cbtn').previousElementSibling.style.marginTop = "50px" : false;
  
  }
}


document.addEventListener('DOMContentLoaded', function () {
    
  var latGite = 44.448968627849204;
  var lonGite = 2.4933195898997336;
  var maCarte = null;
  maCarte = L.map('map').setView([latGite, lonGite], 11);
  L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
      minZoom: 1,
      maxZoom: 25
  }).addTo(maCarte);
  var marker = L.marker([44.448968627849204, 2.4933195898997336]).addTo(maCarte);
});


  /* carousel */

  var slider_img = document.querySelector('.slider-img');
  var i = 0;

  function prev() {
      if (i <= 0) i = images.length;
      i--;
      return setImg();
  }

  function next() {
      if (i >= images.length - 1) i = -1;
      i++;
      return setImg();
  }

  function setImg() {
      return slider_img.setAttribute('src', images[i]);
  }