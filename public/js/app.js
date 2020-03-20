var $ = el => document.querySelector(el);
document.addEventListener("DOMContentLoaded",event=>{
    let alumnos = Document.getElementById("idalumno");
    let docentes = Document.getElementById("iddocentes");

  docentes.addEventListener("click", e=>{
     e.stopPropagation();
      let vistas = "docentes";
     colocarVista(vistas);
    });

    alumnos.addEventListener("click", e=>{
        e.stopPropagation();
        let vistas = "alumnos";
        colocarVista(vistas);
    });
});
   



function colocarVista(vistas){

    fetch(`public/vistas/${vistas}/${vistas}.html`).then( resp => resp.text()).then( resp => {

        document.getElementById(`vistas-${vistas}`).innerHTML = resp;
        let btnCerrar = $(".close");

        btnCerrar.addEventListener("click", event => {
            $(`#vistas-${vistas}`).innerHTML = "";
        });

        let cuerpo = $("body"), script = document.createElement("script");
        script.src = `public/vistas/${vistas}/${vistas}.js`;
        cuerpo.appendChild(script);
            
    });

 }