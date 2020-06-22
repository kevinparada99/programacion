//NOTA: Este archivo debe de ir en la carpeta de node -> C:\Program Files\nodejs
var http = require('http').Server(),
    io   = require('socket.io')(http),
    MongoClient = require('mongodb').MongoClient,
    url  = 'mongodb://localhost:27017',
    dbName = 'fitnessChat';

    const webpush = require('web-push'),
        vapidKeys = {
            publicKey:'BAAyqRUSzvdxf9JGj54QY_wFCDVpsOxNCxsaNN_4JkpMGujBo9Bbj9B3rgBwgdL5hlexKZ3RurRoag9ZKtXPhrQ',
            privateKey:'_4z-LEjbtehJYfnWmZxpiiM-C1x8C9WC-LGU0I2mBdk'
        };
    var pushSubcriptions;
    webpush.setVapidDetails("mailto:luishernandez@ugb.edu.sv",vapidKeys.publicKey, vapidKeys.privateKey);
    

    io.on('connection',socket=>{
        socket.on('enviarMensaje',(datos)=>{
            MongoClient.connect(url, (err,client)=>{
                const db = client.db(dbName);
                db.collection('chat').insertOne({'user':datos.user, 'msg':datos.msg});
                io.emit('recibirMensaje',datos.msg);
                try {
                    const dataPush = JSON.stringify({
                       title:'Notificacion PUSH desde el SERVIDOR', 
                       'msg':datos.msg
                    });
                    console.log( "Endpoint: ", pushSubcriptions.endpoint );
                    webpush.sendNotification(pushSubcriptions,dataPush);
                } catch (error) {
                    console.log("Error al intentar enviar la notificacion push", error);
                }
            });
        });
    socket.on('chatHistory',()=>{
        MongoClient.connect(url, (err, client)=>{
            const db = client.db(dbName);
            db.collection('chat').find({}).toArray((err, data)=>{
                io.emit('chatHistory',data);
            }); 
        });
    });
    socket.on("suscribirse",(subcriptions)=>{
        pushSubcriptions = JSON.parse(subcriptions);
        console.log( pushSubcriptions.endpoint );
    });
});
http.listen(3001,()=>{
    console.log('Escuchando peticiones por el puerto 3001');
});