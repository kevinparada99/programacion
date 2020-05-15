var appBuscarUsuarios = new Vue({
    el:'#frm-buscar-usuarios',
    data:{
        mis_cliente:[],
        valor:''
    },
    methods:{
        buscarUsuario:function(){
            fetch(`../usuarios/procesos.php?proceso=buscarUsuario&usuario=${this.valor}`).then(resp=>resp.json()).then(resp=>{
                this.mis_cliente = resp;
            });
        },
        modificarUsuario:function(usuario){
            appusuario.usuario = usuario;
            appusuario.usuario.accion = 'modificar';
        },
        eliminarUsuario:function(idUsuario){
            alertify.confirm("Control De Usuarios ","Esta seguro de eliminar",
            ()=>{
                fetch(`../usuarios/procesos.php?proceso=eliminarUsuario&usuario=${idUsuario}`).then(resp=>resp.json()).then(resp=>{
                    this.buscarUsuario();
             });
                alertify.success('Registro Eliminado correctamente.');
            },
            ()=>{
                alertify.error('Cancelado....');
            });
    }
},
    created:function(){
        this.buscarUsuario();
    }
});