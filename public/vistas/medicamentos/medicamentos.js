var appmedicamento = new Vue({
    el:'#frm-medicamentos',
    data:{
        medicamento:{
            idMedicamento  : 0,
            accion    : 'nuevo',
            codigom    : '',
            nombrem    : '',
            cantidad  : '',
            tipo  : '',
            ingreso: '',
            fecha  : '',
            registro  : '',
            msg       : ''
        }
    },
    methods:{
        guardarMedicamento:function(){
            fetch(`../medicamentos/procesos.php?proceso=recibirDatos&medicamento=${JSON.stringify(this.medicamento)}`).then( resp=>resp.json() ).then(resp=>{
                if( resp.msg.indexOf("correctamente")>=0 ){
                    alertify.success(resp.msg);
                }
                else if(resp.msg.indexOf("ingrese")>=0){
                    alertify.warning(resp.msg);
                } 
            });
        },
            limpiarMedicamento:function(){
                this.medicamento.idProducto = 0;
                this.medicamento.codigo = '';
                this.medicamento.nombre = '';
                this.medicamento.cantidad = '';
                this.medicamento.tipo = '';
                this.medicamento.ingreso = '';
                this.medicamento.fecha = '';
                this.medicamento.registro = '';
                this.medicamento.accion = 'nuevo';
                appBuscarMedicamentos.buscarMedicamento();
            }       
        }
});
