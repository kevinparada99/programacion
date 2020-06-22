/**
 * @author 5 tech <usis016018@ugb.edu.sv>
 * @file  buscar-medicamentos.js < donde se hace la consulta a procesos.php para llamar los datos
 */

var appBuscarMedicamentos = new Vue({
    el: '#frm-buscar-medicamentos', /**conexion al html para saber donde se mostrara */
    data:{
        mismedicamentos:[],
        valor:''
    },
    methods:{
        buscarMedicamento: function () {/**obtencion de datos */
            fetch(`../medicamentos/procesos.php?proceso=buscarMedicamento&medicamento=${this.valor}`).then(resp => resp.json()).then(resp => {
                this.mismedicamentos = resp;
            });
        },
        modificarMedicamento: function (medicamento) {/**modificar los datos */
            appmedicamento.medicamento = medicamento;
            appmedicamento.medicamento.accion = 'modificar';
        },
        eliminarMedicamento: function (idMedicamento) {/**delete datos */
            alertify.confirm("Control De Productos ","Esta seguro de eliminar",
            ()=>{
                fetch(`../medicamentos/procesos.php?proceso=eliminarMedicamento&medicamento=${idMedicamento}`).then(resp=>resp.json()).then(resp=>{
                    this.buscarMedicamento();
            });
                alertify.success('Registro Eliminado correctamente.'); /**mensaje de satisfaccion */
            },
            ()=>{
                alertify.error('Cancelado....'); /**mensaje de error */
            });
    }
},
    created:function(){
        this.buscarMedicamento(); /**asignacion de funcion */
    }
});