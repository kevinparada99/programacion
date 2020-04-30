var appBuscarUsuarios = new Vue({
    el:'#frm-buscar-usuarios',
    data:{
        misusuarios:[],
        valor:''
    },
    methods:{
        buscarUsuario:function(){
            fetch(`../usuarios/procesos.php?proceso=buscarUsuario&usuario=${this.valor}`).then(resp=>resp.json()).then(resp=>{
                this.misusuarios = resp;
            });
        },
        modificarUsuario:function(usuario){
            appusuario.usuario = usuario;
            appusuario.usuario.accion = 'modificar';
        },
        eliminarUsuario:function(idUsuario){
                var comfirmacion = confirm("¿Estas seguro de eliminar el registro?");
                if(comfirmacion){
                    alert("El reguistro se elimino correctamente");
                    fetch(`../usuarios/procesos.php?proceso=eliminarUsuario&usuario=${idUsuario}`).then(resp=>resp.json()).then(resp=>{
                        this.buscarUsuario();
                    });
                    }  
            
        }
    },
    created:function(){
        this.buscarUsuario();
    }
});