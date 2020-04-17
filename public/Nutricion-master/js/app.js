function init() {
    $("[class*='mostrar']").click(function(e){
            let modulo = $(this).data("modulo"),
                form = $(this).data("form");
          //  fetch(`public/vistas/${modulo}/${form}.html`).then(resp => resp.text()).then(resp => {
                $(`#vistas-${form}`).load(`public/vistas/${modulo}/${form}.html`, function () {
                 $(`#btn-close-${form}`).click(()=>{
                    $(`#vistas-${form}`).html("");
                });
                //import(`../vistas/${modulo}/${form}.js`).then(module => {
                    //module.modulo();
                //});
                init();
            }).draggable();
        });
}
init();