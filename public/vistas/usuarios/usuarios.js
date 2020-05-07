var appusuario = new Vue({
    el:'#frm-usuarios',
    data:{
        usuario:{
            idUsuario  : 0,
            accion    : 'nuevo',
            codigo     : '',
            nombre     : '',
            edad       : '',
            inicial    : '',
            fechaini   : '',
            actual     : '',
            fechaac    : '',
            medicamento : '',
            enfermedad: '',
            observacion  : '',
            msg       : ''
        }
    },
    methods:{
        guardarUsuario:function(){
            fetch(`../usuarios/procesos.php?proceso=recibirDatos&usuario=${JSON.stringify(this.usuario)}`).then( resp=>resp.json() ).then(resp=>{
                if( resp.msg.indexOf("correctamente")>=0 ){
                    alertify.success(resp.msg);
                }
                else if(resp.msg.indexOf("ingrese")>=0){
                    alertify.warning(resp.msg);
                } 
            });
        },

            limpiarUsuarios:function(){
                this.usuario.idUsuario = 0;
                this.usuario.codigo = '';
                this.usuario.nombre = '';
                this.usuario.edad = '';
                this.usuario.inicial = '';
                this.usuario.fechaini = '';
                this.usuario.medicamento = '';
                this.usuario.enfermedad = '';
                this.usuario.observacion = '';
                this.usuario.accion = 'nuevo';
                appBuscarUsuarios.buscarUsuario();
            
        }
    }
});
