/**
 * @author 5 tech <usis003118@ugb.edu.sv>
 * @file chat.js -> sirve para el uso de la API de Notificaciones.
 */

/**
 * conexion a socket.io en el puerto 3001
 * @appchat se obtienen enlacan los input y botones al js por vue
 *  
 */

var usuario = document.querySelector("#inputusuario");
var socket = io.connect("http://localhost:3001", {
        'forceNew': true
    }),
    listaMsgs = [],
    appchat = new Vue({
        el: '#frm-chat1',
        data: {
            msg: '',
            user: '',
            msgs: []
        },
        methods: {
            /**@enviarMensaje se obtiene el usuario */
            enviarMensaje() {
                var mensaje = document.querySelector('#inputmsg');

                var datos = {
                    msg: mensaje.value.trim(),
                    user: usuario.value.trim()

                };

                /** se envia el mensaje y se obtiene el historial de los mensajes
                 * 
                 */
                socket.emit('enviarMensaje', datos);
                socket.emit('chatHistory');

                datos.msg = '';
                datos.user = '';
                mensaje.value = '';
                this.msg = '';



            },
            /**limpiar los input */
            limpiarChat() {
                this.msg = '';
                this.user = '';
            }
        },
        /**se crea el V */
        created() {
            socket.emit('chatHistory');

        }
    });

/**se recive el mensaje */
socket.on('recibirMensaje', msg => {
    appchat.msgs.push(msg);
    console.log(msg);
    /**se envia la notificacion con el titulo y mensaje, imajen  */
    $.notification("Nuevo mensajes", msg, '../../../public/Nutricion-master/img/logonoti.png');
});
/**se obtiene el istorial del chat con el usuario y el mensaje */
socket.on('chatHistory',msgs=>{
    var contenido = document.querySelector('#contenidoChat');
        contenido.innerHTML='';
        var contenidot = document.querySelector('#contenidoCha');
        contenidot.innerHTML='';
    appchat.msgs = [];
    listaMsgs = [];
    msgs.forEach(item => {
        if(item.user==usuario.value){
            contenido.innerHTML += `<li style="width:50%;">
            <div class="msj-rta macro">
                <div class="text text-r">
                    <p>${item.msg}</p>
                   <p><small>${item.user}</small></p>
                </div>                        
      </li>` 
            contenidot.innerHTML += `<li style="width:50%;">
            <div class="msj-rta macro">
                <div class="text text-r">
                    <p>${item.msg}</p>
                   <p><small>${item.user}</small></p>
                </div>                        
                </li>` 

        } else{
            contenido.innerHTML +=  `<li style="width:50%;">
            <div class="msj macro"  style=" float: right;" >
                <div class="text text-l">
                    <p> ${item.msg}</p>
                    <p><small>${item.user }</small></p>
                </div>
            </div>
        </li> `
            contenidot.innerHTML += `<li style="width:50%;">
            <div class="msj macro"  style=" float: right;" >
                <div class="text text-l">
                    <p> ${item.msg}</p>
                    <p><small>${item.user }</small></p>
                </div>
            </div>
        </li> `
        }
        contenido.scrollTop = contenido.scrollHeight;
        contenidot.scrollTop = contenidot.scrollHeight;
    });
   
});
