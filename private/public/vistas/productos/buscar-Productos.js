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
                var comfirmacion = confirm("¿Estas seguro de eliminar el registro?");
                if(comfirmacion){
                    alert("El reguistro se elimino correctamente");
                    fetch(`../productos/procesos.php?proceso=eliminarProducto&producto=${idProducto}`).then(resp=>resp.json()).then(resp=>{
                        this.buscarProducto();
                    });
                    }  
            
        }
    },
    created:function(){
        this.buscarProducto();
    }
});