<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://unpkg.com/vue-select@3.0.0/dist/vue-select.css">
    <link rel="stylesheet" href="../../../public/Nutricion-master/css/estilo.css">
    <link rel="stylesheet" href="../../../public/alertifyjs/css/alertify.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Control</title>
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
       <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
       <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Lato'>
</head>
<body class="bg-secondary">
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
       <img src="../../../public/Nutricion-master/img/logo1.png" alt=""> 
       
       
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="../cerrar.php">INICIO <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mostrar-usuarios" data-modulo="usuarios" data-form="usuarios" href="#">Usuarios</a>
                </li> 
                <li class="nav-item">
                    <a class="nav-link mostrar-productos" data-modulo="productos" data-form="productos" href="#">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mostrar-medicamentos" data-modulo="medicamentos" data-form="medicamentos" href="#">Medicamentos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mostrar-recetas" data-modulo="recetas" data-form="recetas" href="#">Recetas</a>
                </li> 
                <li class="nav-item">
                    <a class="nav-link mostrar-controles" data-modulo="controles" data-form="controles" href="#">Controles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mostrar-nutriciones" data-modulo="nutriciones" data-form="nutriciones" href="#">Nutriciones</a>
                </li>
            </ul>
        </div>
    </nav>
    

    <!-- partial:index.partial.html -->
    <form class="form-inline" v-on:submit.prevent="enviarMensaje" v-on:reset="limpiarChat" id="frm-chat1">
    
    <button class="chatbox-open">
        <i class="fa fa-comments fa-2x" aria-hidden="true"></i>
    </button>
    <button class="chatbox-close">
        <i class="fa fa-close fa-2x" aria-hidden="true"></i>
    </button>
    <section class="chatbox-popup">
        <header class="chatbox-popup__header">
            <aside style="flex:3">
                <i class="fa fa-heartbeat fa-3x " aria-hidden="true"></i>
            </aside>
            <aside style="flex:8">
                <h1>Nutri5Tech</h1> Personal (Online)
            </aside>
            <aside style="flex:1">
                <button class="chatbox-maximize"><i class="fa fa-window-maximize"
                        aria-hidden="true"></i></button>
            </aside>
        </header>
        <div class="container-scroll" id="chatt">
        <div class="card-body">
            
            <section id="messenger">
            <ul v-for="mensajes in msgs" id="messages"> 
                 <li> {{ mensajes.user }}: {{ mensajes.msg }}</li>
                </ul>
            </section>
        </div>
            </div>
        <footer class="chatbox-popup__footer">
            <aside style="flex:10">
                <input type="text" v-model="msg"  required placeholder="Escribe tu Mensaje" class="form-control ">
            </aside>
            <aside style="flex:1;color:#888;text-align:center;">
               <input type="submit" id="enviar" class="btn btn-success ">
            </aside>
        </footer>
    </section>
    <section class="chatbox-panel">
        <header class="chatbox-panel__header">
            <aside style="flex:3">
                <i class="fa fa-heartbeat fa-3x chatbox-popup__avatar" aria-hidden="true"></i>
            </aside>
            <aside style="flex:6">
                <h1>Nutri5tech</h1> Personal (Online)
            </aside>
            <aside style="flex:3;text-align:right;">
                <button class="chatbox-minimize" ><i class="fa fa-window-restore" aria-hidden="true"></i></button>
                <button class="chatbox-panel-close"><i class="fa fa-close" aria-hidden="true"></i></button>
            </aside>
        </header>
        <div class="card-body">
            <main id="contenedorChat"  style="overflow-y:scroll; height: 400px; width: 350px; color: #888; ">
                <section id="messenger">
                <input type="text" value="<?php echo $_SESSION['usuario']; ?>" id="inputusuario"  style="display:none">
                <ul v-for="mensajes in msgs" id="messages"> 
                        <li> {{ mensajes.user }}:   {{ mensajes.msg }}</li>
                </ul>
                </section>
            </main>
        </div>
        <footer class="chatbox-panel__footer">
            <aside style="flex:10">
                <input type="text" v-model="msg" id='inputmsg' required placeholder="Escribe tu Mensaje" class="form-control">
            </aside>
            <aside style="flex:1;color:#888;text-align:center;">
                <input type="submit" value="Enviar" id="enviar" class="btn btn-success">
            </aside>
        </footer>
    </section>
</form>
    <div class="container">
        <div class="modulos" id="vista-usuarios"></div>
        <div class="modulos" id="vista-buscar-usuarios"></div>
        <div class="modulos" id="vista-productos"></div>
        <div class="modulos" id="vista-buscar-productos"></div>
        <div class="modulos" id="vista-medicamentos"></div>
        <div class="modulos" id="vista-buscar-medicamentos"></div>
        <div class="modulos" id="vista-recetas"></div>
        <div class="modulos" id="vista-buscar-recetas"></div>
        <div class="modulos" id="vista-controles"></div>
        <div class="modulos" id="vista-buscar-controles"></div>
        <div class="modulos" id="vista-nutriciones"></div>
        <div class="modulos" id="vista-buscar-nutriciones"></div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script src="../../../public/js/jquery-ui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <script src="https://unpkg.com/vue-select@3.0.0"></script>
    <script src="../../../public/alertifyjs/alertify.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.dev.js"></script>
      <script src="../../../public/js/chat.js"></script>
      <script src="../../../public/vistas/chat/chat.js"></script>
    <script type="module" src="../../../public/js/app.js"></script>
</form>
</body>
</html>
