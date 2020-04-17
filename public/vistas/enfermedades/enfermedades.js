Vue.component('v-select', VueSelect.VueSelect);

var appenfermedades = new Vue({
    el:'#frm-enfermedades',
    data:{
        enfermedad:{
            idEnfermedad : 0,
            accion    : 'nuevo',
            receta   : {
                idReceta : 0,
                receta   : ''
            },
            nombre       : '',
            tipo     : '',
            msg       : ''
        },
        recetas : {}
       
    },
    methods:{
        guardarEnfermedades(){
            fetch(`private/modulos/enfermedades/procesos.php?proceso=recibirDatos&enfermedad=${JSON.stringify(this.enfermedad)}`).then( resp=>resp.json() ).then(resp=>{
                this.enfermedad.msg = resp.msg;
            });
        },
        limpiarEnfermedades(){
            this.enfermedad.idEnfermedad=0;
            this.enfermedad.accion="nuevo";
            this.enfermedad.msg="";
        }
    },
    created(){
        fetch(`private/modulos/enfermedades/procesos.php?proceso=traer_recetas&enfermedad=''`).then( resp=>resp.json() ).then(resp=>{
            this.recetas = resp.recetas;
           
            
        });
    }
});