var appbuscar_enfermedades = new Vue({
    el: '#frm-buscar-enfermedades',
    data:{
        mis_enfermedades:[],
        valor:''
    },
    methods:{
        buscarEnfermedades: function(){
            fetch(`private/Modulos/enfermedades/procesos.php?proceso=buscarControl&control=${this.valor}`).then( resp=>resp.json() ).then(resp=>{ 
                this.mis_enfermedades = resp;
            });
        },
        modificarEnfermedades:function(enfermedades){
            appenfermedades.enfermedades = enfermedades;
            appenfermedades.enfermedades.accion = 'modificar';
        },
        eliminarEnfermedades:function(IdEnfermedad){
            fetch(`private/Modulos/enfermedades/procesos.php?proceso=eliminarControl&control=${IdEnfermedad}`).then( resp=>resp.json() ).then(resp=>{
                this.buscarEnfermedades();
            });
        }
    },
    created:function(){
        this.buscarEnfermedades();
    }
});