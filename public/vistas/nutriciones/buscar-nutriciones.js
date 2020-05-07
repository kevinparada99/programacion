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
            alertify.confirm("Control De Nutricion ","Esta seguro de eliminar",
            ()=>{
                fetch(`../nutriciones/procesos.php?proceso=eliminarNutricion&nutricion=${idNutricion}`).then( resp=>resp.json() ).then(resp=>{
                    this.buscarNutriciones();
             });
                alertify.success('Registro Eliminado correctamente.');
            },
            ()=>{
                alertify.error('Cancelado....');
            });
    }
},
   
    created(){
        this.buscarNutriciones();
    }
});