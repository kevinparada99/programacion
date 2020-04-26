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
            var confirmacion = confirm("¿estas seguro de eliminar el registro?..");
            if (confirmacion){
                alert(" El registro se elimino corretamente....");
                fetch(`../controles/procesos.php?proceso=eliminarControl&control=${idControl}`).then(resp=>resp.json()).then(resp=>{
                  this.buscarControles();
              });
              }

        }
    },
    created(){
        this.buscarControles();
    }
});