$('input').focusin(function(){
    
    $(this).parent('div').addClass("border-input");
    
})

$('input').focusout(function(){
    
    $(this).parent('div').removeClass("border-input");
    
})
var contra = document.getElementById("contraseña"),
    btn = document.getElementById("btnojo"),
    contador = 0;
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
btn.addEventListener('click',mostrar,true)
