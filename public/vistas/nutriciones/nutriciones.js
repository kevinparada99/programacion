Vue.component('v-select', VueSelect.VueSelect);

var appnutriciones = new Vue({
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
        guardarNutriciones(){
            fetch(`../nutriciones/procesos.php?proceso=recibirDatos&nutricion=${JSON.stringify(this.nutricion)}`).then( resp=>resp.json() ).then(resp=>{
                if( resp.msg.indexOf("correctamente")>=0 ){
                    alertify.success(resp.msg);
                }
                else if(resp.msg.indexOf("ingrese")>=0){
                    alertify.warning(resp.msg);
                } 
            });
        },
        limpiarNutriciones(){
            this.nutricion.idNutricion=0;
            this.nutricion.accion="nuevo";
            this.nutricion.msg="";
        }
    },
    created(){
        fetch(`../nutriciones/procesos.php?proceso=traer_nutri&nutricion=''`).then( resp=>resp.json() ).then(resp=>{
            this.usuarios = resp.usuarios;
            this.recetas = resp.recetas;
            this.horas = resp.horas;
            
            
        });
    }
});