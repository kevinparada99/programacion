document.addEventListener("DOMContentLoaded",e=>{
    document.addEventListener("submit",event=>{
        event.preventDefault();

        let de = document.querySelector("#cboDe").value,
        cantidad = document.querySelector("#txtCantidadConversores").value,
        a = document.querySelector("#cboA").value,
        $res = document.querySelector("#lblRespuesta");
    let peso={
        'libras':1.5,
        'toneladas':0.0004535923,
        'honsas':16, 

    };
    $res.innerHTML = `Respuesta: ${ peso[a] / peso[de] * cantidad }`;
});
});

