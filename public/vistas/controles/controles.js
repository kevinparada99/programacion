/**
 * @author 5 tech <usis003118@ugb.edu.sv>
 * @file  controles.js < donde se hace la consulta a procesos.php para llamar los datos
 */

Vue.component('v-select', VueSelect.VueSelect);

var appcontroles = new Vue({
    el: '#frm-controles', /**conexion al html para saber donde se mostrara */
    /**data hace la conexion de todos los input por medio de Vue */
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
            cantidad : '',
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
        guardarControles(){/**Guarda los datos  */
            fetch(`../controles/procesos.php?proceso=recibirDatos&control=${JSON.stringify(this.control)}`).then( resp=>resp.json() ).then(resp=>{
                if( resp.msg.indexOf("correctamente")>=0 ){/**mensaje de satisfaccion */
                    alertify.success(resp.msg);
                }
                else if(resp.msg.indexOf("ingrese")>=0){/**mensaje de advertencia */
                    alertify.warning(resp.msg);
                } 
            });
        },
        limpiarControles(){/**deja en blanco los campos del imput */
            this.control.idControl=0;
            this.control.accion="nuevo";
        }
    },
    created() {/**asignacion de funcion */
        fetch(`../controles/procesos.php?proceso=traer_usuarios&control=''`).then( resp=>resp.json() ).then(resp=>{
            this.usuarios = resp.usuarios;
            this.medicamentos = resp.medicamentos;
        });
    }
});
document.getElementById('mostrarocultar');
var btn = document.getElementById('botonde'),
contador=0;

/**@function mostrar cuando se presiona el boton muestra otro imput para otro medicamento  */
function mostrar() {
    if(contador == 0){
    mostrarocultar.style="display: block;";
    btn.value="ocultar";
    contador=1;
    /**y cuando se preciona se vuelve visible */
    }else if(contador == 1){
        mostrarocultar.style="display: none;";
        contador=0;
        btn.value="Otro";
    }
}
btn.addEventListener('click',mostrar,true)

