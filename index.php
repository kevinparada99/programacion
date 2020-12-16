<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nutrición</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="public/Nutricion-master/css/estilos.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>
    <header>
        <nav>
            <sectioon class="contenedor nav">
                <div class="logo">
                    <img src="public/Nutricion-master/img/logo.png" alt="">
                </div>
                <div class="enlaces-header">
                    <a href="#">Inicio</a>
                    <li class="dropdown">
                        <a class="dropbtn">Calculadoras</a>
                        <div class="dropdown-content">
                            <div class="dropmenuitem"><a href="public/calculadora/Metabolismo.html"
                                    style="color: #9d9879;">Metabolismo</a></div>
                            <div class="dropmenuitem"><a href="public/calculadora/Peso_Ideal.html"
                                    style="color: #9d9879;">Peso Ideal</a></div>
                            <div class="dropmenuitem"><a href="public/calculadora/IMC.html"
                                    style="color: #9d9879;">Indice Masa Corporal</a></div>
                        </div>
                    </li>
                    <a href="public/recetas/admin/mostrar.php">Recetas</a>
                    <a href="informacion.html">Información</a>
                    <li class="dropdown">
                        <a class="dropbtn">Ayuda</a>
                        <div class="dropdown-content">
                            <div class="dropmenuitem"><a href="FAQ.html"
                                    style="color: #9d9879;">Informacion del sistema </a></div>
                            <div class="dropmenuitem"><a href="sistema.html"
                                    style="color: #9d9879;">Funcionalidad del sistema</a></div>
                                    <div class="dropmenuitem"><a href="FAQ2.html"
                                    style="color: #9d9879;">FAQ</a></div>
                        </div>
                    </li>
                    <a href="private/modulos/index.php">Control</a>
                    <a href="public/calculadora/dietas.html">Dietas</a>
                </div>
                <div class="hamburguer">
                    <i class="fas fa-bars"></i>
                </div>
            </sectioon>
        </nav>
        <div class="contenedor">
            <section class="contenido-header">
                <section class="textos-header">
                    <h1>Nutrición para adultos mayores</h1>
                    <h4>El software esta enfocado en ayudar a las personas mayores para mantener un control
                        y un cuidado de su salud nutricional.
                    </h4>
                    <a href="#">Ver video</a>
                </section>
                <img src="public/Nutricion-master/img/a2.jpg" alt="">
            </section>
        </div>
    </header>
    <section class="about-us">
        <div class="contenedor1">
            <h1 class="titulo">Conoce las herramientas de Nutri5tech</h1>
            <div class="contenedor-articulo">
                <div class="articulo" data-aos="zoom-in-right">
                    <i class="fas fa-apple-alt"></i>
                    <h3>Diseño</h3>
                    <p>Se hizo un diseño llamativo con el fin de proporcionar interés hacia las personas
                        tener un sistema simple pero elegante que ayude al propósito estipulado.
                    </p>
                </div>
                <div class="articulo" data-aos="zoom-in-right">
                    <i class="fas fa-head-side-mask"></i>
                    <h3>Diseño Web</h3>
                    <p>Diseño web para la ayuda y control de enfermedades, creación de recetas y proporcionar ayuda
                        a los adultos mayores.
                    </p>
                </div>
                <div class="articulo" data-aos="zoom-in-right">
                    <i class="fas fa-heartbeat"></i>
                    <h3>Desarrollo de Control</h3>
                    <p>Desarrollo del sistema para un control, ayuda y seguimiento para las personas mayores.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="questions contenedor">
        <section class="textos-questions">
            <h1>Cuidemos a nuestros mayores</h1>
            <p>El cuidado de las personas mayores es muy importante, ellos sirvieron para la sociedad antes
                y ahora nos toca cuidar de ellos.
            </p>
        </section>
        <img src="public/Nutricion-master/img/a1.jpg" alt="" data-aos="zoom-out-up" data-aos-duration="2000">
    </section>

    <div class="slideshow-container">
    
        <div class="mySlides">
            <h2>"Aquellos que piensan que no tienen tiempo para una alimentación saludable tarde o temprano encontrarán
                tiempo para la enfermedad”</h2>
            <h3 class="author">- Edward Stanley</h3>
        </div>
    
        <div class="mySlides">
            <h2>“Deje que los alimentos sean su medicina y que la medicina sea su alimento” </h2>
            <h3 class="author">- Hipócrates.</h3>
        </div>
    
        <div class="mySlides">
            <h2>El hombre inteligente debería considerar que la salud es la mayor de las bendiciones humanas. Que la
                comida sea tu medicina.</h2>
            <h3 class="author">- Hipócrates</h3>
        </div>
    
        <a class="prev" onclick="plusSlides(-1)">❮</a>
        <a class="next" onclick="plusSlides(1)">❯</a>
    
    </div>
    
    <div class="dot-container">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
    </div>

    <section class="results">
        <div class="contenedor1 conten-results">
            <section class="numbers">
                <div class="number" data-aos="zoom-in-left">
                    <h4>+<?php echo contador3();?></h4>
                    <p>Personas que han visitado el sitio</p>
                </div>
                <div class="number" data-aos="zoom-in-left">
                    <h4>+0</h4>
                    <p>Personas a quienes se le ha brindado el servicio.</p>
                </div>
                <div class="number" data-aos="zoom-in-left">
                    <h4>+0</h4>
                    <p>Personas que han visto recetas de nuestra plataforma.</p>
                </div>
                <div class="number" data-aos="zoom-in-left">
                    <h4>+5</h4>
                    <p>Número de recetas que pueden encontrar en este sitio.</p>
                </div>
            </section>
            <section class="results-text">
                <h4>Una vida sana para los adultos</h4>
                <p>Registro de personas que han utilizado el sotfware y que han sido beneficiados con los
                    nuestras herramientas.
                </p>
            </section>
        </div>
    </section>

    <?php
    function contador3(){
    $gg = 0;
    $archivo = "visitas.txt"; //el archivo que contiene en numero
    $f = fopen($archivo, "r"); //abrimos el archivo en modo de lectura
    if($gg == 0)
    {
        $contador = fread($f, filesize($archivo)); //leemos el archivo
        $contador = $contador +1; //sumamos +1 al contador
        fclose($f);
    }else{
        $contador = fread($f, filesize($archivo)); //leemos el archivo
        $contador = $contador; //sumamos +1 al contador
        fclose($f);
    }
    $f = fopen($archivo, "w+");
    if($f)
    {
        fwrite($f, $contador);
        fclose($f);
    }
    return $contador;
 
  }


?>

    <section class="contenedor1 services">
        <img src="public/Nutricion-master/img/imagen4.svg" alt="">
        <div class="box-skills">
            <h4><i class="far fa-check-circle"></i> Web nutricional</h4>
            <h4><i class="far fa-check-circle"></i> Control alimenticio</h4>
            <h4><i class="far fa-check-circle"></i> Informacion nutricional</h4>
            <h4><i class="far fa-check-circle"></i> Contactos con especialistas</h4>
            <h4><i class="far fa-check-circle"></i> Soporte Web</h4>
        </div>
    </section>

    <footer>
        <div class="partFooter">
            <img src="public/Nutricion-master/img/logo.png" alt="">

        </div>
        <div class="partFooter">
            <h4>Servicios</h4>
            <a href="#">Asilo +503 1234-4578</a>
            <a href="#">Hospital +503 1245-7845</a>
            <a href="#">Emergencia +503 1548-4875 </a>
        </div>
        <div class="partFooter">
            <h4>FAQ</h4>
            <a href="FAQ.html">Preguntas frecuentes</a>

        </div>
        <div class="partFooter">
            <h4>Contáctanos</h4>
            <div class="social-media">
                <i class="fab fa-facebook-f"></i>
                <i class="fab fa-twitter"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-youtube"></i>
                <h5>Derechos reservados 2020 ©</h5>
            </div>
        </div>
    </footer>
    <div class="go-faq-container">
        <div class="go-faq-button">
            <i class="fas fa-question"></i></far>
        </div>
    </div>
    <div class="go-top-container">
        <div class="go-top-button">
            <i class="fas fa-chevron-up"></i>
        </div>
    </div>
    
    <script src="public/js/slider.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://kit.fontawesome.com/c15b744a04.js" crossorigin="anonymous"></script>
    <script src="public/Nutricion-master/js/main.js"></script>
</body>

</html>