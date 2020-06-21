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
            medicamento   : {
                idMedicamento : 0,
                medicamento   : ''
            },
            otro : '',
            observaciones:  '',
            fecha     : '',
            siguiente : '',
            msg       : ''
        },
        usuarios : {},
        medicamentos : {}

       
    },
    methods:{
        guardarControles(){
            fetch(`../controles/procesos.php?proceso=recibirDatos&control=${JSON.stringify(this.control)}`).then( resp=>resp.json() ).then(resp=>{
                if( resp.msg.indexOf("correctamente")>=0 ){
                    alertify.success(resp.msg);
                }
                else if(resp.msg.indexOf("ingrese")>=0){
                    alertify.warning(resp.msg);
                } 
            });
        },
        limpiarControles(){
            this.control.idControl=0;
            this.control.accion="nuevo";
        }
    },
    created(){
        fetch(`../controles/procesos.php?proceso=traer_usuarios&control=''`).then( resp=>resp.json() ).then(resp=>{
            this.usuarios = resp.usuarios;
            this.medicamentos = resp.medicamentos;
        });
    }
});
document.getElementById('mostrarocultar');
var btn = document.getElementById('botonde'),
 contador=0;

function mostrar() {
    if(contador == 0){
    mostrarocultar.style="display: block;";
    btn.value="ocultar";
    contador=1;
    }else if(contador == 1){
        mostrarocultar.style="display: none;";
        contador=0;
        btn.value="Otro";
    }
}
btn.addEventListener('click',mostrar,true)

