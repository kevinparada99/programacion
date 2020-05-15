var appBuscarMedicamentos = new Vue({
    el: '#frm-buscar-medicamentos',
    data:{
        mismedicamentos:[],
        valor:''
    },
    methods:{
        buscarMedicamento: function () {
            fetch(`../medicamentos/procesos.php?proceso=buscarMedicamento&medicamento=${this.valor}`).then(resp => resp.json()).then(resp => {
                this.mismedicamentos = resp;
            });
        },
        modificarMedicamento:function(medicamento){
            appmedicamento.medicamento = medicamento;
            appmedicamento.medicamento.accion = 'modificar';
        },
        eliminarMedicamento:function(idMedicamento){
            alertify.confirm("Control De Productos ","Esta seguro de eliminar",
            ()=>{
                fetch(`../medicamentos/procesos.php?proceso=eliminarMedicamento&medicamento=${idMedicamento}`).then(resp=>resp.json()).then(resp=>{
                    this.buscarMedicamento();
             });
                alertify.success('Registro Eliminado correctamente.');
            },
            ()=>{
                alertify.error('Cancelado....');
            });
    }
},
    created:function(){
        this.buscarMedicamento();
    }
});