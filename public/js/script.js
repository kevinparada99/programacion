/**
 * @author 5 tech <usis003118@ugb.edu.sv>
 * @file script.js -> este es la animacion del login y registrar.
 */
/**
 * este accion es cuando el los input del login y registrar se enfoque cambien de clase y asi de estilo
 */

$('input').focusin(function(){
    
    $(this).parent('div').addClass("border-input");
    
})

$('input').focusout(function(){
    
    $(this).parent('div').removeClass("border-input");
    
})

/** crear variables con el boton de mostrar contraseña y el input de la contraceña */ 
var contra = document.getElementById("contraseña"),
    btn = document.getElementById("btnojo"),
    contador = 0;
    /**@function mostrar funcion para cambiar de type el input de contraseña de type passaword a type text
     * tambien cambiar la imagen y el estilo
    */
    function mostrar() {
    if(contador == 0){
    contra.type="text";
    btn.src="../../public/image/cerrado.png";
    btn.style="width: 7%;";
    contador=1;
    }else if(contador == 1){
        contra.type="password";
        btn.src="../../public/image/ojo.jpg";
        btn.style="width: 10%;";
        contador=0;
    }
}
/**se asigna la funcion al boton de el ojo */
btn.addEventListener('click',mostrar,true)

/** crear variables con el boton de mostrar contraseña y el input de la contraceña */
var contra2 = document.getElementById("contraseña2"),
    btn2 = document.getElementById("btnojo2"),
    contador2 = 0;
/**@function mostrar funcion para cambiar de type el input de contraseña de type passaword a type text
 * tambien cambiar la imagen y el estilo
 */
function mostrar2() {
    if (contador2 == 0) {
        contra2.type = "text";
        btn2.src = "../../public/image/cerrado.png";
        btn2.style = "width: 7%;";
        contador2 = 1;
    } else if (contador2 == 1) {
        contra2.type = "password";
        btn2.src = "../../public/image/ojo.jpg";
        btn2.style = "width: 10%;";
        contador2 = 0;
    }
}
/**se asigna la funcion al boton de el ojo */
btn2.addEventListener('click', mostrar2, true)
