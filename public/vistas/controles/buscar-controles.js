var appbuscar_controles = new Vue({
    el: '#frm-buscar-controles',
    data:{
        mis_controles:[],
        valor:''
    },
    methods:{
        buscarControles(){
            fetch(`../controles/procesos.php?proceso=buscarControl&control=${this.valor}`).then( resp=>resp.json() ).then(resp=>{ 
                this.mis_controles = resp;
            });
        },
        modificarControl(control){
            appcontroles.control = control;
            appcontroles.control.accion = 'modificar';
        },
        eliminarControl(idControl){
            alertify.confirm("Control De Controles ","Esta seguro de eliminar",
            ()=>{
                fetch(`../controles/procesos.php?proceso=eliminarControl&control=${idControl}`).then(resp=>resp.json()).then(resp=>{
                    this.buscarControles();
             });
                alertify.success('Registro Eliminado correctamente.');
            },
            ()=>{
                alertify.error('Cancelado....');
            });
    }
},
    created(){
        this.buscarControles();
    }
});