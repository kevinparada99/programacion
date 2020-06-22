/**
 * @author 5 tech <usis003118@ugb.edu.sv>
 * @file  buscar-controles.js < donde se hace la consulta a procesos.php para llamar los datos
 */


var appbuscar_controles = new Vue({
    el: '#frm-buscar-controles',/**conexion al html para saber donde se mostrara */
    data:{
        mis_controles:[],
        valor:''
    },
    methods:{
        buscarControles(){/**obtencion de datos */
            fetch(`../controles/procesos.php?proceso=buscarControl&control=${this.valor}`).then( resp=>resp.json() ).then(resp=>{ 
                this.mis_controles = resp;
            });
        },
        modificarControl(control){/**modificar los datos */
            appcontroles.control = control;
            appcontroles.control.accion = 'modificar';
        },
        eliminarControl(idControl){/**delete datos */
            alertify.confirm("Control De Controles ","Esta seguro de eliminar",
            ()=>{
                fetch(`../controles/procesos.php?proceso=eliminarControl&control=${idControl}`).then(resp=>resp.json()).then(resp=>{
                    this.buscarControles();
            });
                alertify.success('Registro Eliminado correctamente.');/**mensaje de satisfaccion */
            },
            ()=>{
                alertify.error('Cancelado....');/**mensaje de error */
            });
    }
},
    created(){
        this.buscarControles();/**asignacion de funcion */
    }
});