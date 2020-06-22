/**
 * @author 5 tech <usis003118@ugb.edu.sv>
 * @file  buscar-productos.js < donde se hace la consulta a procesos.php para llamar los datos
 */
var appBuscarProducto = new Vue({
    el: '#frm-buscar-productos', /**conexion al html para saber donde se mostrara */
    data:{
        misproductos:[],
        valor:''
    },
    methods:{
        buscarProducto: function () {/**obtencion de datos */
            fetch(`../productos/procesos.php?proceso=buscarProducto&producto=${this.valor}`).then(resp=>resp.json()).then(resp=>{
                this.misproductos = resp;
            });
        },
        modificarProducto: function (producto) {/**modificar los datos */
            appproducto.producto = producto;
            appproducto.producto.accion = 'modificar';
        },
        eliminarProducto: function (idProducto) {/**delete datos */
            alertify.confirm("Control De Productos ","Esta seguro de eliminar",
            ()=>{
                fetch(`../productos/procesos.php?proceso=eliminarProducto&producto=${idProducto}`).then(resp=>resp.json()).then(resp=>{
                    this.buscarProducto();
            });
                alertify.success('Registro Eliminado correctamente.'); /**mensaje de satisfaccion */
            },
            ()=>{
                alertify.error('Cancelado....'); /**mensaje de error */
            });
    }
},
    created:function(){
        this.buscarProducto(); /**asignacion de funcion */
    }
});