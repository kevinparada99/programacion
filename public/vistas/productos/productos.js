/**
 * @author 5 tech <usis016018@ugb.edu.sv>
 * @file  productod.js < donde se hace la consulta a procesos.php para llamar los datos
 */

var appproducto = new Vue({
    el: '#frm-productos', /**conexion al html para saber donde se mostrara */
    /**data hace la conexion de todos los input por medio de Vue */
    data:{
        producto:{
            idProducto  : 0,
            accion    : 'nuevo',
            nombre    : '',
            cantidad  : '',
            tipo      : '',
            fecha     : '',
            registro  : '',
            msg       : ''
        }
    },
    methods:{
        guardarProducto: function () {/**Guarda los datos  */
            fetch(`../productos/procesos.php?proceso=recibirDatos&producto=${JSON.stringify(this.producto)}`).then( resp=>resp.json() ).then(resp=>{
                if (resp.msg.indexOf("correctamente") >= 0) {/**mensaje de satisfaccion */
                    alertify.success(resp.msg);
                }
                else if (resp.msg.indexOf("ingrese") >= 0) {/**mensaje de advertencia */
                    alertify.warning(resp.msg);
                } 
            });
        },
            limpiarProducto: function () {/**deja en blanco los campos del imput */
                this.producto.idProducto = 0;
                this.producto.nombre     = '';
                this.producto.cantidad   = '';
                this.producto.tipo       = '';
                this.producto.fecha      = '';
                this.producto.registro   = '';
                this.producto.accion     = 'nuevo';
                appBuscarProductos.buscarProducto();
            }       
        }
});
