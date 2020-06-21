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
            enviarMensaje(){
             let   mensaje =document.querySelector('#inputmsg');
              let  usuario = document.querySelector("#inputusuario");

                var datos = 
                {
                    msg: mensaje.value.trim(),
                    user: usuario.value.trim()
                };
                socket.emit('enviarMensaje', datos);
                socket.emit('chatHistory');

                    datos.msg = '';
                    datos.user = '';
                    mensaje.value='';
                    this.msg='';

            },
            limpiarChat(){
                this.msg = '';
                this.user = '';
            }
        },
        created(){
            socket.emit('chatHistory');

        }
    });
    
    socket.on('recibirMensaje',msg=>{
      appchat.msgs.push(msg);
      console.log(msg);
     $.notification("Nuevo mensajes",msg, '../../../public/Nutricion-master/img/logonoti.png');
    });
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
    