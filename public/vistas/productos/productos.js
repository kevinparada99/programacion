var appproducto = new Vue({
    el:'#frm-productos',
    data:{
        producto:{
            idProducto  : 0,
            accion    : 'nuevo',
            codigo    : '',
            nombre    : '',
            cantidad  : '',
            fecha  : '',
            msg       : ''
        }
    },
    methods:{
        guardarProducto:function(){
            fetch(`private/modulos/productos/procesos.php?proceso=recibirDatos&producto=${JSON.stringify(this.producto)}`).then( resp=>resp.json() ).then(resp=>{
                this.producto.msg = resp.msg;
                this.producto.idProducto = 0;
                this.producto.codigo = '';
                this.producto.nombre = '';
                this.producto.cantidad = '';
                this.producto.fecha = '';
                this.producto.accion = 'nuevo';
                appBuscarProductos.buscarProducto();
            });
        }
    }
});
