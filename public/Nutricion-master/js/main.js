/**
 * @author 5 tech <usis003118@ugb.edu.sv>
 * @file main.js -> sirve para las animaciones de imagenes etc del index.
 */

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