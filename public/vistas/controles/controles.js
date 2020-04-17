Vue.component('v-select', VueSelect.VueSelect);

var appcontroles = new Vue({
    el:'#frm-controles',
    data:{
        control:{
            idControl : 0,
            accion    : 'nuevo',
            usuario   : {
                idUsuario : 0,
                usuario   : ''
            },
            tipo       : '',
            fecha     : '',
            msg       : ''
        },
        usuarios : {}
       
    },
    methods:{
        guardarControles(){
            fetch(`private/modulos/controles/procesos.php?proceso=recibirDatos&control=${JSON.stringify(this.control)}`).then( resp=>resp.json() ).then(resp=>{
                this.control.msg = resp.msg;
            });
        },
        limpiarControles(){
            this.control.idControl=0;
            this.control.accion="nuevo";
            this.control.msg="";
        }
    },
    created(){
        fetch(`private/modulos/controles/procesos.php?proceso=traer_usuarios&control=''`).then( resp=>resp.json() ).then(resp=>{
            this.usuarios = resp.usuarios;
           
            
        });
    }
});