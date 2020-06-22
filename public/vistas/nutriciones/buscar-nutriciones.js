/**
 * @author 5 tech <usis003118@ugb.edu.sv>
 * @file  buscar-nutricion.js < donde se hace la consulta a procesos.php para llamar los datos
 */

var appbuscar_nutriciones = new Vue({
    el: '#frm-buscar-nutriciones', /**conexion al html para saber donde se mostrara */
    data:{
        mis_nutriciones:[],
        valor:''
    },
    methods:{
        buscarNutriciones() {/**obtencion de datos */
            fetch(`../nutriciones/procesos.php?proceso=buscarNutricion&nutricion=${this.valor}`).then( resp=>resp.json() ).then(resp=>{ 
                this.mis_nutriciones = resp;
            });
        },
        modificarNutricion(nutricion) {/**modificar los datos */
            appnutriciones.nutricion = nutricion;
            appnutriciones.nutricion.accion = 'modificar';
        },
        eliminarNutricion(idNutricion) {/**delete datos */
            alertify.confirm("Control De Nutricion ","Esta seguro de eliminar",
            ()=>{
                fetch(`../nutriciones/procesos.php?proceso=eliminarNutricion&nutricion=${idNutricion}`).then( resp=>resp.json() ).then(resp=>{
                    this.buscarNutriciones();
            });
                alertify.success('Registro Eliminado correctamente.'); /**mensaje de satisfaccion */
            },
            ()=>{
                alertify.error('Cancelado....'); /**mensaje de error */
            });
    }
},
    created(){
        this.buscarNutriciones(); /**asignacion de funcion */
    }
});