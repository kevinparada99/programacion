var appbuscar_controles = new Vue({
    el: '#frm-buscar-controles',
    data:{
        mis_controles:[],
        valor:''
    },
    methods:{
        buscarControles: function(){
            fetch(`private/Modulos/controles/procesos.php?proceso=buscarControl&control=${this.valor}`).then( resp=>resp.json() ).then(resp=>{ 
                this.mis_controles = resp;
            });
        },
        modificarControles:function(controles){
            appcontroles.controles = controles;
            appcontroles.controles.accion = 'modificar';
        },
        eliminarControles:function(idControl){
            fetch(`private/Modulos/controles/procesos.php?proceso=eliminarControl&control=${idControl}`).then( resp=>resp.json() ).then(resp=>{
                this.buscarControles();
            });
        }
    },
    created:function(){
        this.buscarControles();
    }
});