var appBuscarProducto = new Vue({
    el:'#frm-buscar-productos',
    data:{
        misproductos:[],
        valor:''
    },
    methods:{
        buscarProducto:function(){
            fetch(`../productos/procesos.php?proceso=buscarProducto&producto=${this.valor}`).then(resp=>resp.json()).then(resp=>{
                this.misproductos = resp;
            });
        },
        modificarProducto:function(producto){
            appproducto.producto = producto;
            appproducto.producto.accion = 'modificar';
        },
        eliminarProducto:function(idProducto){
            alertify.confirm("Control De Productos ","Esta seguro de eliminar",
            ()=>{
                fetch(`../productos/procesos.php?proceso=eliminarProducto&producto=${idProducto}`).then(resp=>resp.json()).then(resp=>{
                    this.buscarProducto();
             });
                alertify.success('Registro Eliminado correctamente.');
            },
            ()=>{
                alertify.error('Cancelado....');
            });
    }
},
    created:function(){
        this.buscarProducto();
    }
});