var appreceta = new Vue({
    el:'#frm-recetas',
    data:{
        receta:{
            idReceta  : 0,
            accion    : 'nuevo',
            codigo    : '',
            nombres    : '',
            ingrediente : '',
            informacion : '',
            msg       : ''
        }
    },
    methods:{
        guardarReceta:function(){
            fetch(`../recetas/procesos.php?proceso=recibirDatos&receta=${JSON.stringify(this.receta)}`).then( resp=>resp.json() ).then(resp=>{
                this.receta.msg = resp.msg;
                this.receta.idReceta = 0;
                this.receta.codigo = '';
                this.receta.nombres = '';
                this.receta.ingrediente = '';
                this.receta.informacion = '';
                this.receta.accion = 'nuevo';
                appBuscarRecetas.buscarReceta();
            });
        }
    }
});