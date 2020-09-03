(function($, document, window){
	
	$(document).ready(function(){

		// Cloning main navigation for mobile menu
		$(".mobile-navigation").append($(".main-navigation .menu").clone());

		// Mobile menu toggle 
		$(".menu-toggle").click(function(){
			$(".mobile-navigation").slideToggle();
		});

		$("[data-bg-color]").each(function(){
			var color = $(this).data("bg-color");
			$(this).css("background-color",color);
		});

		if( $(".map").length ){
			$('.map').gmap3({
				map: {
					options: {
						maxZoom: 17 
					}  
				},
				marker:{
					address: "ebais, escazú",
					options: {
						icon: new google.maps.MarkerImage(
							"images/map-marker.png",
							new google.maps.Size(43, 53, "px", "px")
						)
					}
				}
			},
			"autofit" );
	    }
	    
	});

	$(window).load(function(){

	});

})(jQuery, document, window);


let ubicacionPrincipal = window.pageYOffset; //0

  AOS.init();

/**animaciones del nav  cuando el scroll se mueve */
  window.addEventListener("scroll", function(){
    let desplazamientoActual = window.pageYOffset; //180
    if(ubicacionPrincipal >= desplazamientoActual){ // 200 > 180
        document.getElementsByTagName("nav")[0].style.top = "0px"
    }else{
        document.getElementsByTagName("nav")[0].style.top = "-100px"
    }
    ubicacionPrincipal= desplazamientoActual; //200

})

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