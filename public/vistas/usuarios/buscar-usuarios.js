/**
 * @author 5 tech <usis003118@ugb.edu.sv>
 * @file  buscar-usuario.js < donde se hace la consulta a procesos.php para llamar los datos
 */

var appBuscarUsuarios = new Vue({
    el: '#frm-buscar-usuarios', /**conexion al html para saber donde se mostrara */
    data:{
        mis_cliente:[],
        valor:''
    },
    methods:{
        buscarUsuario: function () {/**obtencion de datos */
            fetch(`../usuarios/procesos.php?proceso=buscarUsuario&usuario=${this.valor}`).then(resp=>resp.json()).then(resp=>{
                this.mis_cliente = resp;
            });
        },
        modificarUsuario: function (usuario) {/**modificar los datos */
            appusuario.usuario = usuario;
            appusuario.usuario.accion = 'modificar';
        },
        eliminarUsuario: function (idUsuario) {/**delete datos */
            alertify.confirm("Control De Usuarios ","Esta seguro de eliminar",
            ()=>{
                fetch(`../usuarios/procesos.php?proceso=eliminarUsuario&usuario=${idUsuario}`).then(resp=>resp.json()).then(resp=>{
                    this.buscarUsuario();
            });
                alertify.success('Registro Eliminado correctamente.'); /**mensaje de satisfaccion */
            },
            ()=>{
                alertify.error('Cancelado....'); /**mensaje de error */
            });
    }
},
    created:function(){
        this.buscarUsuario(); /**asignacion de funcion */
    }
});