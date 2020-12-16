/**
 * @author 5 tech <usis003118@ugb.edu.sv>
 * @file  usuario.js < donde se hace la consulta a procesos.php para llamar los datos
 */

Vue.component('v-select', VueSelect.VueSelect);
var appusuario = new Vue({
    el: '#frm-usuarios', /**conexion al html para saber donde se mostrara */
    /**data hace la conexion de todos los input por medio de Vue */
    data:{
        usuario:{
            idUsuario  : 0,
            accion    : 'nuevo',
            medicamento   : {
                idMedicamento : 0,
                medicamento   : ''
            },
            codigo     : '',
            nombre     : '',
            edad       : '',
            inicial    : '',
            libras     : '',
            fechaini   : '',
            actual     : '',
            fechaac    : '',
            metabolismo : '',
            imc : '',
            enfermedad : '',
            naci       : '',
            observacion: '',
            msg        : ''
        },
        medicamentos : {}
    },
    methods:{
        guardarUsuario:function(){
            let fechaDenacimiento = new Date(this.usuario.edad);
            let ahora = new Date();
            let agnios = ahora.getFullYear() - fechaDenacimiento.getFullYear();
            this.usuario.naci = agnios;

           if(this.usuario.actual == 'Masculino'){
            var a = 66.4730;
            var b = 13.7516;
            var c = 5.0033;
            var d = 6.7550;
            var k=4;
           }else{
            var a = 655.0955;
            var b = 9.5634;
            var c = 1.8496;
            var d = 4.6756;
            var k= 2.5;
           }
            
           if(this.usuario.libras == 'Libras'){
              var peso = this.usuario.inicial/2.2046;
           }else{
               var peso = this.usuario.inicial;
           }
            
           var mb = a+(b*peso)+(c*this.usuario.codigo)-(d*this.usuario.naci);
          
           this.usuario.metabolismo = Math.floor(mb);

           var pI = this.usuario.codigo -100 - ((this.usuario.codigo - 150) / 4) + ((this.usuario.naci - 20) / k)

           var PS = pI *2.2046; 
           this.usuario.pesoideal = Math.floor(PS);

           var alturacmi = this.usuario.codigo / 100.00;

           var tuIMC = peso / (alturacmi*alturacmi)

           this.usuario.imc = tuIMC.toFixed(2);

            fetch(`../usuarios/procesos.php?proceso=recibirDatos&usuario=${JSON.stringify(this.usuario)}`).then( resp=>resp.json() ).then(resp=>{
                if( resp.msg.indexOf("correctamente")>=0 ){
                    alertify.success(resp.msg);
                }
                else if(resp.msg.indexOf("ingrese")>=0){
                    alertify.warning(resp.msg);
                } 
            });
        },

            limpiarUsuarios:function(){
                this.usuario.idUsuario = 0;
                this.usuario.codigo = '';
                this.usuario.nombre = '';
                this.usuario.edad = '';
                this.usuario.inicial = '';
                this.usuario.libras = '';
                this.usuario.fechaini = '';
                this.usuario.medicamento = '';
                this.usuario.enfermedad = '';
                this.usuario.naci = '';
                this.usuario.observacion = '';
                this.usuario.accion = 'nuevo';
                appBuscarUsuarios.buscarUsuario();
            
        }
    },
    created() {/**asignacion de funcion */
        fetch(`../usuarios/procesos.php?proceso=traer_medicamentos&usuario=''`).then( resp=>resp.json() ).then(resp=>{
            this.medicamentos = resp.medicamentos;
        });
    }
});
