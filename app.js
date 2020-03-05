document.addEventListener("DOMContentLoaded",e=>{
    document.addEventListener("submit",event=>{
        event.preventDefault();

        let de = document.querySelector("#cboDe").value,
        a = document.querySelector("#cboA").value,
        cantidad = document.querySelector("#txtCantidadConversores").value,
        $res = document.querySelector("#lblRespuesta");
    let monedas={
        'libras':1.5,
        'toneladas':0.0004535923,
        'honsas':16, 
    };
    $res.innerHTML = `Respuesta: ${ monedas[a] / monedas[de] * cantidad }`;
});
});