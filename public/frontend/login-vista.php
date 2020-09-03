<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login / Register Nutrición</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../../public/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
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
            
        
            
            <button type="submit">Entrar<label class="lnr lnr-chevron-right"></label></button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="../../public/js/jquery.js"></script>
    <script src="../../public/js/script.js"></script>
    <?php if(!empty($error)): ?>
                <script>
               if(<?php echo $error;?>.indexOf("Favor")>=0 ){/**mensaje de satisfaccion */
                    toastr.warning(<?php echo $error;?>);
                }
                else if(<?php echo $error;?>.indexOf("existe")>=0){/**mensaje de advertencia */
                    toastr.error(<?php echo $error;?>);
                } 
               </script>
            <?php endif; ?>

</body>
</html>
