/**
 * @author 5 tech <usis0160188@ugb.edu.sv>
 * @file informacion.js funcionamiento del menu en el sitio web de informacion
 */

$(document).ready(function() {

    var numItems = $('li.fancyTab').length;
	
	/**@function document funcion global para el menu
	  *@param {string} numItems funcionamiento para que el menu en informacion tenga una media paareja*/ 
	
			    if (numItems == 12){
					$("li.fancyTab").width('8.3%');
				}
			    if (numItems == 11){
					$("li.fancyTab").width('9%');
				}
			    if (numItems == 10){
					$("li.fancyTab").width('10%');
				}
			    if (numItems == 9){
					$("li.fancyTab").width('11.1%');
				}
			    if (numItems == 8){
					$("li.fancyTab").width('12.5%');
				}
			    if (numItems == 7){
					$("li.fancyTab").width('14.2%');
				}
			    if (numItems == 6){
					$("li.fancyTab").width('16.666666666666667%');
				}
			    if (numItems == 5){
					$("li.fancyTab").width('20%');
				}
			    if (numItems == 4){
					$("li.fancyTab").width('25%');
				}
			    if (numItems == 3){
					$("li.fancyTab").width('33.3%');
				}
			    if (numItems == 2){
					$("li.fancyTab").width('50%');
				}
		});
		/** objeto finalizado */

		/**@param window funcionamiento para que se pueda mostrar el panel que se elige */
$(window).load(function() {

    $('.fancyTabs').each(function() {

    var highestBox = 0;
    $('.fancyTab a', this).each(function() {

        if ($(this).height() > highestBox)
        highestBox = $(this).height();
    });

    $('.fancyTab a', this).height(highestBox);

});
});
let ubicacionPrincipal = window.pageYOffset;
window.addEventListener("scroll", function(){
    let desplazamientoActual = window.pageYOffset; //180
    if(ubicacionPrincipal >= desplazamientoActual){ // 200 > 180
        document.getElementsByTagName("nav")[0].style.top = "0px"
    }else{
        document.getElementsByTagName("nav")[0].style.top = "-100px"
    }
    ubicacionPrincipal= desplazamientoActual; //200

})


 //0

  AOS.init();

/**animaciones del nav  cuando el scroll se mueve */


// Menu

let enlacesHeader = document.querySelectorAll(".enlaces-header")[0];
let semaforo = true;
/**animaciones de todas las imagenes */
document.querySelectorAll(".hamburguer")[0].addEventListener("click", function(){
    if(semaforo){
        document.querySelectorAll(".hamburguer")[0].style.color ="#fff";
        semaforo= false;
    }else{
        document.querySelectorAll(".hamburguer")[0].style.color ="#000";
        semaforo= true;
    }

    enlacesHeader.classList.toggle("menudos")
})
/**
 * funsion del boton arriba que cuando este arriba se oculte y mediante valla bajando se muestre
 */
window.onscroll = function(){
    if(document.documentElement.scrollTop > 100){
        document.querySelector('.go-top-container')
        .classList.add('show');
    }else{
        document.querySelector('.go-top-container')
        .classList.remove('show');
    }
}

/**
 * que al presionar el boton suba todo el scroll
 */
document.querySelector('.go-top-container')
    .addEventListener('click',() => {
window.scrollTo({
 top: 0,
 behavior:'smooth'
});
});