<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login / Register Nutrición</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../../public/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>
<body>


<div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          
          <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="sign-in-form">
            
          <h2 class="title">Iniciar sesión</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Usuario" name="usuario" id="Usuario" />
            </div>
            <div class="input-field">
            <i id="ojo" class="fas fa-eye"></i>
              <input type="password" placeholder="Contraseña" id="contraseña" name="clave" />
            </div>
            <input type="submit" value="Iniciar Sesión" class="btn solid" />
            <p class="social-text">Siguenos en</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>

          <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="sign-up-form">
            <h2 class="title">Regístrate</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Correo"/>
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="Nombre Usuario"/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password"  placeholder="Contraseña"/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="text" placeholder="Confirmar contraseña" />
            </div>
            <input type="submit" class="btn" value="Regístrate" />
            
            <p class="social-text">Siguenos en</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>
        </div>
      </div>
  
      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>¿Eres Nuevo?</h3>
            <p>
              Has clik al siguiente botón para crear tu cuenta !
            </p>
            <button class="btn transparent" onclick="window.location.href='../../private/modulos/register.php'"  id="sign-up-btn">
              Regístrate
            </button>
          </div>
          <img src="../../public/frontend/img/login.png" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>¿Ya tienes una Cuenta?</h3>
            <p>
            Inicie sesión
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Iniciar Sesión
            </button>
          </div>
          <img src="../../public/frontend/img/registrar.png" class="image" alt="" />
        </div>
      </div>
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
