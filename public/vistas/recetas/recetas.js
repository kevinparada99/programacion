/**
 * @author 5 tech <usis003118@ugb.edu.sv>
 * @file  recetas.js < donde se hace la consulta a procesos.php para llamar los datos
 */
var appreceta = new Vue({
    el: '#frm-recetas', /**conexion al html para saber donde se mostrara */
    /**data hace la conexion de todos los input por medio de Vue */
    data:{
        receta:{
            idReceta    :     0,
            accion      :     'nuevo',
            codigo      :     '',
            nombres     :     '',
            ingrediente :     '',
            informacion :     '',
            registro    :     '',
            msg         :     ''
        }
    },
    methods:{
        guardarReceta: function () {/**Guarda los datos  */
            fetch(`../recetas/procesos.php?proceso=recibirDatos&receta=${JSON.stringify(this.receta)}`).then( resp=>resp.json() ).then(resp=>{
                if( resp.msg.indexOf("correctamente")>=0 ){
                    alertify.success(resp.msg);
                }
                else if(resp.msg.indexOf("ingrese")>=0){
                    alertify.warning(resp.msg);
                } 
            });
        },
                limpiarRecetas:function(){
                this.receta.idReceta    = 0;
                this.receta.codigo      = '';
                this.receta.nombres     = '';
                this.receta.ingrediente = '';
                this.receta.informacion = '';
                this.receta.registro    = '';
                this.receta.accion      = 'nuevo';
                appBuscarRecetas.buscarReceta();
        }
    }
});