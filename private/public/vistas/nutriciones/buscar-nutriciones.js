var appbuscar_nutriciones = new Vue({
    el: '#frm-buscar-nutriciones',
    data:{
        mis_nutriciones:[],
        valor:''
    },
    methods:{
        buscarNutriciones(){
            fetch(`../nutriciones/procesos.php?proceso=buscarNutricion&nutricion=${this.valor}`).then( resp=>resp.json() ).then(resp=>{ 
                this.mis_nutriciones = resp;
            });
        },
        modificarNutricion(nutricion){
            appnutriciones.nutricion = nutricion;
            appnutriciones.nutricion.accion = 'modificar';
        },
        eliminarNutricion(idNutricion){
            var confirmacion = confirm("¿estas seguro de eliminar el registro?..");
                if (confirmacion){
                  alert(" El registro se elimino corretamente....");
            fetch(`../nutriciones/procesos.php?proceso=eliminarNutricion&nutricion=${idNutricion}`).then( resp=>resp.json() ).then(resp=>{
                this.buscarNutriciones();
            });
        }

        }
    },
    created(){
        this.buscarNutriciones();
    }
});