/**
 * @author 5 tech <usis003118@ugb.edu.sv>
 * @file script.js -> este es la animacion del login y registrar.
 */
/**
 * este accion es cuando el los input del login y registrar se enfoque cambien de clase y asi de estilo
 */

const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");


sign_up_btn.addEventListener("click", () => {
    container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});


/** crear variables con el boton de mostrar contraseña y el input de la contraceña */ 
var ojo = document.querySelector("#ojo");
var cont = 0;
var contraseña = document.querySelector("#contraseña");


  function mostrar(){
if(cont == 0 ){
contraseña.type ="text";
cont = 1;
ojo.className ="fas fa-eye-slash";

}else{
  contraseña.type ="password";
  cont =0;
  ojo.className ="fas fa-eye";
}
}
ojo.addEventListener('click',mostrar,true);