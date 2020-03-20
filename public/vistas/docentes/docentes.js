var $ = el => document.querySelector(el),
    frmdocente = $("#frmDocentes");
    frmdocente.addEventListener("submit",e=>{
    e.preventDefault();
    e.stopPropagation();
    
    let docente = {
        accion    : 'nuevo',
        codigo    : $("#txtCodigoDocente").value,
        nombre    : $("#txtNombreDocente").value,
        correo : $("#txtCorreoDocente").value,
        telefono  : $("#txtTelefonoDodente").value
    };
    fetch(`private/modulos/docentes/procesosDOC.php?proceso=recibirDatos&docente=${JSON.stringify(docente)}`).then( resp=>resp.json() ).then(resp=>{
        $("#respuestaDocente").innerHTML = `
            <div class="alert alert-success" role="alert">
                ${resp.msg}
            </div>
        `;
    });
});