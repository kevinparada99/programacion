/**
 * @author 5 tech <usis016018@ugb.edu.sv>
 * @file app.js -> Mostrar los formularios de los formularios
 */
function init(){
    $("[class*='mostrar']").click(function(e){
        let modulo = $(this).data("modulo"),
            form   = $(this).data("form");
        /**
         * @function 'mostrar' se muestra el formulario escogido
         * @param {string} modulo modulo escogido
         * @param {string} form formulario a escoger
         * **/
        $(`#vista-${form}`).load(`../../../public/vistas/${modulo}/${form}.html`, function(){/**direccion de los formularios */
            $(`#btn-close-${form}`).click(()=>{/**cerrar formulario */
                $(`#vista-${form}`).html("");/**se muestra el formulario */
            });
            
            init();
        }).draggable();
    });
}
init();
/**formulario ya mostrado */

