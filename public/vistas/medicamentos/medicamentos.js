/**
 * @author 5 tech <usis003118@ugb.edu.sv>
 * @file  medicamentos.js < donde se hace la consulta a procesos.php para llamar los datos
 */


var appmedicamento = new Vue({
    el: '#frm-medicamentos', /**conexion al html para saber donde se mostrara */
    /**data hace la conexion de todos los input por medio de Vue */
    data:{
        medicamento:{
            idMedicamento  : 0,
            accion    : 'nuevo',
            codigom    : '',
            nombrem    : '',
            cantidad  : '',
            tipo  : '',
            ingreso: '',
            fecha  : '',
            registro  : '',
            msg       : ''
        }
    },
    methods:{
        guardarMedicamento: function () {/**Guarda los datos  */
            fetch(`../medicamentos/procesos.php?proceso=recibirDatos&medicamento=${JSON.stringify(this.medicamento)}`).then( resp=>resp.json() ).then(resp=>{
                if (resp.msg.indexOf("correctamente") >= 0) {/**mensaje de satisfaccion */
                    alertify.success(resp.msg);
                }
                else if (resp.msg.indexOf("ingrese") >= 0) {/**mensaje de advertencia */
                    alertify.warning(resp.msg);
                } 
            });
        },
            limpiarMedicamento: function () {/**deja en blanco los campos del imput */
                this.medicamento.idProducto = 0;
                this.medicamento.codigo = '';
                this.medicamento.nombre = '';
                this.medicamento.cantidad = '';
                this.medicamento.tipo = '';
                this.medicamento.ingreso = '';
                this.medicamento.fecha = '';
                this.medicamento.registro = '';
                this.medicamento.accion = 'nuevo';
                appBuscarMedicamentos.buscarMedicamento();
            }       
        }
});
