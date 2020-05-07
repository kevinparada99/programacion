var appBuscarRecetas = new Vue({
    el:'#frm-buscar-recetas',
    data:{
        misrecetas:[],
        valor:''
    },
    methods:{
        buscarReceta:function(){
            fetch(`../recetas/procesos.php?proceso=buscarReceta&receta=${this.valor}`).then(resp=>resp.json()).then(resp=>{
                this.misrecetas = resp;
            });
        },
        modificarReceta:function(receta){
            appreceta.receta = receta;
            appreceta.receta.accion = 'modificar';
        },
        eliminarReceta:function(idReceta){
            alertify.confirm("Control De Recetas ","Esta seguro de eliminar",
            ()=>{
                fetch(`../recetas/procesos.php?proceso=eliminarReceta&receta=${idReceta}`).then(resp=>resp.json()).then(resp=>{
                    this.buscarReceta();
             });
                alertify.success('Registro Eliminado correctamente.');
            },
            ()=>{
                alertify.error('Cancelado....');
            });
    }
},
    
    created:function(){
        this.buscarReceta();
    }
});