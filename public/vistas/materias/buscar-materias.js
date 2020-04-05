var appBuscarMaterias = new Vue({
    el:'#frm-buscar-materias',
    data:{
        mismaterias:[],
        valor:''
    },
    methods:{
        buscarMateria:function(){
            fetch(`private/modulos/materias/procesos.php?proceso=buscarMateria&materia=${this.valor}`).then(resp=>resp.json()).then(resp=>{
                this.mismaterias = resp;
            });
        },
        modificarMateria:function(materia){
            appmateria.materia = materia;
            appmateria.materia.accion = 'modificar';
        },
        eliminarMateria:function(idMateria){
                var confirmar = confirm("¿estas seguro de eliminar el registro?..");
             if(confirmar){
                 alert("El registro se elimino corretamente....");
                fetch(`private/modulos/materias/procesos.php?proceso=eliminarMateria&materia=${idMateria}`).then(resp=>resp.json()).then(resp=>{
                    this.buscarMateria();
                });

                }
     
            
        }
    },
    created:function(){
        this.buscarMateria();
    }
});