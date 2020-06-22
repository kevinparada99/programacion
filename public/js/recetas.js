/**
 * @author 5 tech <usis016018@ugb.edu.sv>
 * @file recetas.js funcionamiento del menu en el sitio web
 */

/**
  * @function jQuery extiende de la APi de notificaciones, para mostrar notificaciones
  * @param {string} document que se pueda mostrar el slider con todas las recetas
  */
jQuery(document).ready(function ($) {
    "use strict";
    $('#customers-testimonials').owlCarousel({
        /**Ajustes de posiciones en el Slider */
        loop: true,
        center: true,
        items: 3,
        margin: 30,
        autoplay: true,
        dots: true,
        nav: true,
        autoplayTimeout: 4100,/** tiempo en el que se mueve solo  el Slider*/
        smartSpeed: 450,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        responsive: {/**como responde */
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            1170: {
                items: 3
            }
        }
    });
});

/**
 * @function onscroll boton subir 
 * @param {string} classList que te mande a la variable que esta en el top
 */
/** funsion del scrol al estar ariba no se muestre */
window.onscroll = function(){
    if(document.documentElement.scrollTop > 100){
        document.querySelector('.go-top-container')
        .classList.add('show');
    }else{
        document.querySelector('.go-top-container')
        .classList.remove('show');
    }
}

document.querySelector('.go-top-container')/** al dar clic se mueve hacia arriba en el top */
    .addEventListener('click',() => {
window.scrollTo({
top: 0,
behavior:'smooth'
});
});