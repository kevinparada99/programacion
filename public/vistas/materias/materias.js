var appmateria = new Vue({
    el:'#frm-materias',
    data:{
        materia:{
            idMateria    :0,
            accion      :'nuevo',
            codigo      :'',
            nombre      :'',
            modalidad   :'',
            informacion :'',
            msg         :''
            }
        },
        methods:{
            guardarMateria:function(){
                fetch(`private/modulos/materias/procesos.php?proceso=recibirDatos&materia=${JSON.stringify(this.materia)}`).then(resp => resp.json()).then(resp=>{
                    this.materia.msg = resp.msg;
                    this.materia.idMateria = 0;
                    this.materia.codigo = '';
                    this.materia.nombre = '';
                    this.materia.modalidad = '';
                    this.materia.informacion = '';
                    this.materia.accion = 'nuevo';
                    appBuscarMateria.buscarMateria();
                 });
        }
        }
});
