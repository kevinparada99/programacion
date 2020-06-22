/**
 * @author 5 tech <usis003118@ugb.edu.sv>
 * @file  buscar-recetas.js < donde se hace la consulta a procesos.php para llamar los datos
 */

var appBuscarRecetas = new Vue({
    el: '#frm-buscar-recetas', /**conexion al html para saber donde se mostrara */
    data:{
        misrecetas:[],
        valor:''
    },
    methods:{
        buscarReceta: function () {/**obtencion de datos */
            fetch(`../recetas/procesos.php?proceso=buscarReceta&receta=${this.valor}`).then(resp=>resp.json()).then(resp=>{
                this.misrecetas = resp;
            });
        },
        modificarReceta: function (receta) {/**modificar los datos */
            appreceta.receta = receta;
            appreceta.receta.accion = 'modificar';
        },
        eliminarReceta: function (idReceta) {/**delete datos */
            alertify.confirm("Control De Recetas ","Esta seguro de eliminar",
            ()=>{
                fetch(`../recetas/procesos.php?proceso=eliminarReceta&receta=${idReceta}`).then(resp=>resp.json()).then(resp=>{
                    this.buscarReceta();
            });
                alertify.success('Registro Eliminado correctamente.'); /**mensaje de satisfaccion */
            },
            ()=>{
                alertify.error('Cancelado....'); /**mensaje de error */
            });
    }
},
    
    created:function(){
        this.buscarReceta(); /**asignacion de funcion */
    }
});