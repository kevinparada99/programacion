var appproducto = new Vue({
    el:'#frm-productos',
    data:{
        producto:{
            idProducto  : 0,
            accion    : 'nuevo',
            codigo    : '',
            nombre    : '',
            cantidad  : '',
            tipo  : '',
            fecha  : '',
            registro  : '',
            msg       : ''
        }
    },
    methods:{
        guardarProducto:function(){
            fetch(`../productos/procesos.php?proceso=recibirDatos&producto=${JSON.stringify(this.producto)}`).then( resp=>resp.json() ).then(resp=>{
                if( resp.msg.indexOf("correctamente")>=0 ){
                    alertify.success(resp.msg);
                }
                else if(resp.msg.indexOf("ingrese")>=0){
                    alertify.warning(resp.msg);
                } 
            });
        },
            limpiarProducto:function(){
                this.producto.idProducto = 0;
                this.producto.codigo = '';
                this.producto.nombre = '';
                this.producto.cantidad = '';
                this.producto.tipo = '';
                this.producto.fecha = '';
                this.producto.registro = '';
                this.producto.accion = 'nuevo';
                appBuscarProductos.buscarProducto();
            }       
        }
});
