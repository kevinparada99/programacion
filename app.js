document.addEventListener("DOMContentLoaded", e=>{
    document.querySelector("#frmAlumnos").addEventListener("submit", event=>{
        guardarRegistro();
    });
     document.querySelector("#btnnuevo").addEventListener("click", event=>{
        limpiar();
    });
    document.querySelector("#btnbuscar").addEventListener("click", event=>{
        buscar();
   });
});

function limpiar(){
        document.querySelector("#txtcodigoAlumno").value = "";
        document.querySelector("#txtnombreAlumno").value = "";
        document.querySelector("#txtapellidoAlumno").value = "";
        document.querySelector("#txttelAlumno").value="";
        document.querySelector("#txtdireccionAlumno").value="";
}

function guardarRegistro(e){
    event.preventDefault();

    let codigo=document.querySelector("#txtcodigoAlumno").value,
    nombre=document.querySelector("#txtnombreAlumno").value,
    apellido=document.querySelector("#txtapellidoAlumno").value,
    telefono=document.querySelector("#txttelAlumno").value,
    direccion=document.querySelector("#txtdireccionAlumno").value;

    console.log(nombre, apellido, telefono, direccion);

    if( 'localStorage' in window ){
        window.localStorage.setItem("codigo" + codigo, codigo);
        window.localStorage.setItem("nombre" + codigo, nombre);
        window.localStorage.setItem("apellido" + codigo, apellido);
        window.localStorage.setItem("direccion" + codigo, direccion);
        window.localStorage.setItem("telefono" + codigo, telefono);
    } else {
        alert("Por favor ACTUALIZATE!!!.");
    }
}

function buscar(){
    let codigo=document.querySelector("#txtcodigoAlumno").value;
    document.querySelector("#txtnombreAlumno").value=window.localStorage.getItem("nombre" + codigo);
    document.querySelector("#txtapellidoAlumno").value=window.localStorage.getItem("apellido" + codigo);
    document.querySelector("#txttelAlumno").value=window.localStorage.getItem("telefono" + codigo);
    document.querySelector("#txtdireccionAlumno").value=window.localStorage.getItem("direccion" + codigo);

}