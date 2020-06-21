<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login / Register Nutricion</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../../public/css/style.css">
</head>
<body>
<div class="container-form">

        <div class="header">
        <a href="../../index.html"><img src="https://img.icons8.com/plasticine/50/000000/return.png"/></a>
            <div class="logo-title">
                <img src="../../public/Nutricion-master/img/logo.png" alt="">
                <h2>Nutrición</h2>
            </div>
            <div class="menu">
                <a href="../../private/modulos/login.php"><li class="module-login active">Login</li></a>
                <a href="../../private/modulos/register.php"><li class="module-register">Registrar</li></a>
            </div>
        </div>
        
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="form">
            <div class="welcome-form"><h1>Bienvenidos A </h1><h2>Nutri5Tech</h2></div>
            <div class="user line-input">
                <label class="lnr lnr-user"></label>
                <input type="text" placeholder="Nombre Usuario" autofocus name="usuario">
            </div>
            <div class="password line-input">
                <label class="lnr lnr-lock"></label>
                <input type="password" placeholder="Contraseña" id="contraseña" name="clave">
                <img class="img-responsive" id="btnojo" src="../../public/image/ojo.jpg" style="width: 10%;">
            </div>
            
             <?php if(!empty($error)): ?>
            <div class="mensaje">
                <?php echo $error; ?>
            </div>
            <?php endif; ?>
            
            <button type="submit">Entrar<label class="lnr lnr-chevron-right"></label></button>
        </form>
    </div>
    <script src="../../public/js/jquery.js"></script>
    <script src="../../public/js/script.js"></script>
</body>
</html>