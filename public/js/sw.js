/**
 * @author 5 tech <usis0160188@ugb.edu.sv>
 * @file sw.js envio de las notificaciones push
 */

 /**envio de la notificacion push con el titulo y el mensaje */
self.addEventListener('push', e=>{
    const data = e.data.json();
    console.log('Recibida la Notificacion PUSH: ', data);
    self.registration.showNotification(data.title,{
        body:data.msg,
        icon:''
    });
}); 