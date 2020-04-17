var appBuscarRecetas = new Vue({
    el:'#frm-buscar-recetas',
    data:{
        misrecetas:[],
        valor:''
    },
    methods:{
        buscarReceta:function(){
            fetch(`private/modulos/recetas/procesos.php?proceso=buscarReceta&receta=${this.valor}`).then(resp=>resp.json()).then(resp=>{
                this.misrecetas = resp;
            });
        },
        modificarReceta:function(receta){
            appreceta.receta = receta;
            appreceta.receta.accion = 'modificar';
        },
        eliminarReceta:function(idReceta){
                var confirmacion = confirm("¿estas seguro de eliminar el registro?..");
                if (confirmacion){
                  alert(" El registro se elimino corretamente....");
                  fetch(`private/modulos/recetas/procesos.php?proceso=eliminarReceta&receta=${idReceta}`).then(resp=>resp.json()).then(resp=>{
                    this.buscarReceta();
                });
                }
        }
    },
    created:function(){
        this.buscarReceta();
    }
});