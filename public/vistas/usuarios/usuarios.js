var appusuario = new Vue({
    el:'#frm-usuarios',
    data:{
        usuario:{
            idUsuario  : 0,
            accion    : 'nuevo',
            codigo    : '',
            nombre    : '',
            edad       : '',
            observacion  : '',
            msg       : ''
        }
    },
    methods:{
        guardarUsuario:function(){
            fetch(`private/modulos/usuarios/procesos.php?proceso=recibirDatos&usuario=${JSON.stringify(this.usuario)}`).then( resp=>resp.json() ).then(resp=>{
                this.usuario.msg = resp.msg;
                this.usuario.idUsuario = 0;
                this.usuario.codigo = '';
                this.usuario.nombre = '';
                this.usuario.edad = '';
                this.usuario.observacion = '';
                this.usuario.accion = 'nuevo';
                appBuscarUsuarios.buscarUsuario();
            });
        }
    }
});
