
/**
 * @author 5 tech <usis003118@ugb.edu.sv>
 * @file chat.js -> sirve para el uso de la API de Notificaciones.
 */

 /**
  * conexion a socket.io en el puerto 3001
  * @appchat se obtienen enlacan los input y botones al js por vue
  *  
  */

var socket = io.connect("http://localhost:3001",{'forceNew':true}),
listaMsgs =[],
    appchat = new Vue({
        el:'#frm-chat1',
        data:{
            msg : '',
            user : '',
            msgs : []
        },
        methods:{
            /**@enviarMensaje se obtiene el usuario */
            enviarMensaje(){
            let   mensaje =document.querySelector('#inputmsg');
            let  usuario = document.querySelector("#inputusuario");
                var datos = 
                {
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
                    mensaje.value='';
                    this.msg='';

            },
            
            /**limpiar los input */
            limpiarChat(){
                this.msg = '';
                this.user = '';
            }
        },
        /**se crea el V */
        created(){
            socket.emit('chatHistory');

        }
    });
   
    /**se recive el mensaje */
    socket.on('recibirMensaje',msg=>{
    appchat.msgs.push(msg);
    console.log(msg);
    /**se envia la notificacion con el titulo y mensaje, imajen  */
    $.notification("Nuevo mensajes",msg, '../../../public/Nutricion-master/img/logonoti.png');
    });

    /**se obtiene el istorial del chat con el usuario y el mensaje */
    socket.on('chatHistory',msgs=>{
        appchat.msgs = [];
        listaMsgs = [];
        msgs.forEach(item => {
            
        let chats = {
                msg: item.msg,
                user: item.user
            }
            listaMsgs.push(chats);
            
        });
        appchat.msgs = listaMsgs;
    });
   