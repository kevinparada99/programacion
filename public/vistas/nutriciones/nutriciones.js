/**
 * @author 5 tech <usis003118@ugb.edu.sv>
 * @file  nutricion.js < donde se hace la consulta a procesos.php para llamar los datos
 */


Vue.component('v-select', VueSelect.VueSelect);

var appnutriciones = new Vue({
    /**conexion al html para saber donde se mostrara */
    /**data hace la conexion de todos los input por medio de Vue */
    el:'#frm-nutriciones',
    data:{
        nutricion:{
            idNutricion : 0,
            accion    : 'nuevo',
            usuario   : {
                idUsuario : 0,
                usuario   : ''
            },
            receta    : {
                idReceta : 0,
                receta   : ''
            },
            hora    : {
                idHora : 0,
                hora   : ''
            },
            fecha     : '',
            msg       : ''
        },
        usuarios : {},
        recetas  : {},
        horas  : {}
    },
    methods:{
        guardarNutriciones() {/**Guarda los datos  */
            fetch(`../nutriciones/procesos.php?proceso=recibirDatos&nutricion=${JSON.stringify(this.nutricion)}`).then( resp=>resp.json() ).then(resp=>{
                if (resp.msg.indexOf("correctamente") >= 0) {/**mensaje de satisfaccion */
                    alertify.success(resp.msg);
                }
                else if (resp.msg.indexOf("ingrese") >= 0) {/**mensaje de advertencia */
                    alertify.warning(resp.msg);
                } 
            });
        },
        limpiarNutriciones() {/**deja en blanco los campos del imput */
            this.nutricion.idNutricion=0;
            this.nutricion.accion="nuevo";
            this.nutricion.msg="";
        }
    },
    created() {/**asignacion de funcion */
        fetch(`../nutriciones/procesos.php?proceso=traer_nutri&nutricion=''`).then( resp=>resp.json() ).then(resp=>{
            this.usuarios = resp.usuarios;
            this.recetas = resp.recetas;
            this.horas = resp.horas;
            
            
        });
    }
});