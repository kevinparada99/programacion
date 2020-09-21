

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Peso</title>
    <link rel="stylesheet" href="ori.css">
</head>
<header class="header" role="banner">
        <h1 class="logo">
          <a href="#">Nutri5 <span>tech</span></a>
        </h1>
        <div class="nav-wrap">
          <nav class="main-nav" role="navigation">
            <ul class="unstyled list-hover-slide">
              <li><a href="../../../index.html">Inicio</a></li>
              <li><a href="../peso_normal/ori.php">Peso Normal</a></li>
              <li><a href="../bajo_peso/ori.php">Bajo Peso</a></li>
              <li><a href="../peso_normal/dietas/dist/sobrepeso.html">Ver todas S.peso</a></li>
            </ul>
          </nav>
          <ul class="social-links list-inline unstyled list-hover-slide">
            <li><a href="#">Twitter</a></li>
            <li><a href="#">Google+</a></li>
            <li><a href="#">GitHub</a></li>
            <li><a href="#">CodePen</a></li>
          </ul>
        </div>
      </header>
<body>
     <input type="text" id="fname" style="display:none;"><br><br>
    <div class="container">
        <div class="row">

          <div class="col-md-6 col-sm-6 col-xs-12" id="hh"> 
           
         </div>
          </div> <br><br>
          
          <div class="col-md-6 col-sm-6 col-xs-12" id="h">
           
          </div><br><br>
          <div class="col-md-6 col-sm-6 col-xs-12" id="tres"> 
         
           </div>
        </div>
      </div>
</body>


<script>
var conten1 = document.querySelector('#hh');
var conten2 = document.querySelector('#h');
var conten3 = document.querySelector('#tres');
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>


function e(){
    $.ajax({url:"lol.php",success:function(cont){
        
        $("#cont").text(cont);
   }
   })
  
}


function contador2(){
    $.ajax({url:"contador2.php",success:function(cont){
        
        $("#contador2").text(cont);
   }
   })
  
}

function contador3(){
    $.ajax({url:"contador3.php",success:function(cont){
        
        $("#contador3").text(cont);
   }
   })
  
}


</script>





</html>
<?php 


function contador(){
    $gg = 1;
    $archivo = "contador.txt"; //el archivo que contiene en numero
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
// dos
function contador2(){
    $gg = 1;
    $archivo = "contador2.txt"; //el archivo que contiene en numero
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
// tres
function contador3(){
    $gg = 1;
    $archivo = "contador3.txt"; //el archivo que contiene en numero
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
   <script>

 function ordenar(a,dos,tres){ 
if(a >= dos && a>= tres){

      if(dos>tres){
        conten1.innerHTML += `<div class="card-noticia card_md">
        <div class="data">
                              <p class="data_day" id="cont"></p>
                   <p class="data_moth">Descargas</p>
                          </div>
                          <div class="wrap-img">
                              <img src="img/sobrePeso.jpg" alt="Background">
                          </div>
                          <div class="info">
                              <div class="title">
                                  <div class="icon">
                                      <i class="material-icons">Nut5Tec</i>
                                  </div>
                                  <h4>Lunes/Jueves!!</h4>
                              </div>
                              <div class="description">
                                  <p>
                                 ¿Estas en sobrepeso? Es muy importante mantenerse en un peso equilibrado para 
                                 una mejor salud.
                                  ¿Que deberia Comer Para bajar de peso?
                                  DESAYUNO: Tostada integral con tomate, aceite y kiwi, MERIENDA:1 Pieza mediana de Manzana. etc.
                                  </p>
                              </div>
                              <div class="action">
                                  <button class="btn btn-noticias" onclick="window.location.href='../peso_normal/dietas/dist/sobrepeso.html#nosotros'">Continuar Lendo</button>
                                  <a class="btn btn-noticias" onclick="e();">Descargar</a>
                              </div>
                          </div> `
                          
                          conten2.innerHTML += `<div class="card-noticia card_md">
                             <div class="data">
                              <p class="data_day" id="contador2"></p>
                   <p class="data_moth">Descargas</p>
                          </div>
                          <div class="wrap-img">
                              <img src="img/sobrepesoII.jpg" alt="Background">
                          </div>
                          <div class="info">
                              <div class="title">
                                  <div class="icon">
                                      <i class="material-icons">Nut5tec</i>
                                  </div>
                                  <h4>Martes/Viernes!!</h4>
                              </div>
                              <div class="description">
                                  <p>
                                      ¿Tienes obesidad o sobre peso? Esta es una de las mejores rutinas 
                                      diarias que puedes aprovechar!!.
                                      ¿Que deberia comer?  
                                      DESAYUNO:Tostada integral con tomate y yogur con manzana, MERIENDA:Naranja, ETC.
                                  </p>
                              </div>
                              <div class="action">
                                  <button class="btn btn-noticias" onclick="window.location.href='../peso_normal/dietas/dist/sobrepeso.html#menu'">Continuar Lendo</button>
                                  <a class="btn btn-noticias" onclick="contador2();">Descargar</a>
                              </div>
                          </div> `

                         conten3.innerHTML += ` <div class="card-noticia card_md">
                           <div class="data">
                          <p class="data_day" id="contador3"></p>
                          <p class="data_moth">Descargas</p>
                          </div>
                          <div class="wrap-img">
                              <img src="img/sobrePesoIII.jpg" alt="Background">
                          </div>
                          <div class="info">
                              <div class="title">
                                  <div class="icon">
                                      <i class="material-icons">Nut5tec</i>
                                  </div>
                                  <h4>Miercoles/Sabados</h4>
                              </div>
                              <div class="description">
                                  <p>
                                     Lo mejor para la salud es tener un peso normal o equiliblado.¿Que 
                                     deberia comer para bajar de peso? DESAYUNO:Gachas de avena con leche y canela y trocitos de plátano,
                                     MERIENDA:Kiwi, ETC.
                                  </p>
                              </div>
                              <div class="action">
                                  <button class="btn btn-noticias" onclick="window.location.href='../peso_normal/dietas/dist/sobrepeso.html#tercera'">Continuar Lendo</button>
                                  <a class="btn btn-noticias" onclick="contador3();">Descargar</a>
                              </div>
                          </div>  `



                          }else{
                            conten1.innerHTML += `<div class="card-noticia card_md">
                               <div class="data">
                              <p class="data_day" id="cont"></p>
                   <p class="data_moth">Descargas</p>
                          </div>
                          <div class="wrap-img">
                              <img src="img/sobrePeso.jpg" alt="Background">
                          </div>
                          <div class="info">
                              <div class="title">
                                  <div class="icon">
                                      <i class="material-icons">Nut5Tec</i>
                                  </div>
                                  <h4>Lunes/Jueves!!</h4>
                              </div>
                              <div class="description">
                                  <p>
                                 ¿Estas en sobrepeso? Es muy importante mantenerse en un peso equilibrado para 
                                 una mejor salud.
                                  ¿Que deberia Comer Para bajar de peso?
                                  DESAYUNO: Tostada integral con tomate, aceite y kiwi, MERIENDA:1 Pieza mediana de Manzana. etc.
                                  </p>
                              </div>
                              <div class="action">
                                  <button class="btn btn-noticias" onclick="window.location.href='../peso_normal/dietas/dist/sobrepeso.html#nosotros'">Continuar Lendo</button>
                                  <a class="btn btn-noticias" onclick="e();">Descargar</a>
                              </div>
                          </div>`
                          conten2.innerHTML += `<div class="card-noticia card_md">
                           <div class="data">
                          <p class="data_day" id="contador3"></p>
                          <p class="data_moth">Descargas</p>
                          </div>
                          <div class="wrap-img">
                              <img src="img/sobrePesoIII.jpg" alt="Background">
                          </div>
                          <div class="info">
                              <div class="title">
                                  <div class="icon">
                                      <i class="material-icons">Nut5tec</i>
                                  </div>
                                  <h4>Miercoles/Sabados</h4>
                              </div>
                              <div class="description">
                                  <p>
                                     Lo mejor para la salud es tener un peso normal o equiliblado.¿Que 
                                     deberia comer para bajar de peso? DESAYUNO:Gachas de avena con leche y canela y trocitos de plátano,
                                     MERIENDA:Kiwi, ETC.
                                  </p>
                              </div>
                              <div class="action">
                                  <button class="btn btn-noticias" onclick="window.location.href='../peso_normal/dietas/dist/sobrepeso.html#tercera'">Continuar Lendo</button>
                                  <a class="btn btn-noticias" onclick="contador3();">Descargar</a>
                              </div>
                          </div>  `
              
                          conten3.innerHTML += `<div class="card-noticia card_md">
                             <div class="data">
                              <p class="data_day" id="contador2"></p>
                   <p class="data_moth">Descargas</p>
                          </div>
                          <div class="wrap-img">
                              <img src="img/sobrepesoII.jpg" alt="Background">
                          </div>
                          <div class="info">
                              <div class="title">
                                  <div class="icon">
                                      <i class="material-icons">Nut5tec</i>
                                  </div>
                                  <h4>Martes/Viernes!!</h4>
                              </div>
                              <div class="description">
                                  <p>
                                      ¿Tienes obesidad o sobre peso? Esta es una de las mejores rutinas 
                                      diarias que puedes aprovechar!!.
                                      ¿Que deberia comer?  
                                      DESAYUNO:Tostada integral con tomate y yogur con manzana, MERIENDA:Naranja, ETC.
                                  </p>
                              </div>
                              <div class="action">
                                  <button class="btn btn-noticias" onclick="window.location.href='../peso_normal/dietas/dist/sobrepeso.html#menu'">Continuar Lendo</button>
                                  <a class="btn btn-noticias" onclick="contador2();">Descargar</a>
                              </div>
                          </div> ` 

  }                   
}else if(dos>=a && dos>=tres){
 if(a>tres){
    conten1.innerHTML +=`<div class="card-noticia card_md">
                             <div class="data">
                              <p class="data_day" id="contador2"></p>
                   <p class="data_moth">Descargas</p>
                          </div>
                          <div class="wrap-img">
                              <img src="img/sobrepesoII.jpg" alt="Background">
                          </div>
                          <div class="info">
                              <div class="title">
                                  <div class="icon">
                                      <i class="material-icons">Nut5tec</i>
                                  </div>
                                  <h4>Martes/Viernes!!</h4>
                              </div>
                              <div class="description">
                                  <p>
                                      ¿Tienes obesidad o sobre peso? Esta es una de las mejores rutinas 
                                      diarias que puedes aprovechar!!.
                                      ¿Que deberia comer?  
                                      DESAYUNO:Tostada integral con tomate y yogur con manzana, MERIENDA:Naranja, ETC.
                                  </p>
                              </div>
                              <div class="action">
                                  <button class="btn btn-noticias" onclick="window.location.href='../peso_normal/dietas/dist/sobrepeso.html#menu'">Continuar Lendo</button>
                                  <a class="btn btn-noticias" onclick="contador2();">Descargar</a>
                              </div>
                          </div> `

    conten2.innerHTML +=`<div class="card-noticia card_md">
        <div class="data">
                              <p class="data_day" id="cont"></p>
                   <p class="data_moth">Descargas</p>
                          </div>
                          <div class="wrap-img">
                              <img src="img/sobrePeso.jpg" alt="Background">
                          </div>
                          <div class="info">
                              <div class="title">
                                  <div class="icon">
                                      <i class="material-icons">Nut5Tec</i>
                                  </div>
                                  <h4>Lunes/Jueves!!</h4>
                              </div>
                              <div class="description">
                                  <p>
                                 ¿Estas en sobrepeso? Es muy importante mantenerse en un peso equilibrado para 
                                 una mejor salud.
                                  ¿Que deberia Comer Para bajar de peso?
                                  DESAYUNO: Tostada integral con tomate, aceite y kiwi, MERIENDA:1 Pieza mediana de Manzana. etc.
                                  </p>
                              </div>
                              <div class="action">
                                  <button class="btn btn-noticias" onclick="window.location.href='../peso_normal/dietas/dist/sobrepeso.html#nosotros'">Continuar Lendo</button>
                                  <a class="btn btn-noticias" onclick="e();">Descargar</a>
                              </div>
                          </div>`

    conten3.innerHTML +=`<div class="card-noticia card_md">
                           <div class="data">
                          <p class="data_day" id="contador3"></p>
                          <p class="data_moth">Descargas</p>
                          </div>
                          <div class="wrap-img">
                              <img src="img/sobrePesoIII.jpg" alt="Background">
                          </div>
                          <div class="info">
                              <div class="title">
                                  <div class="icon">
                                      <i class="material-icons">Nut5tec</i>
                                  </div>
                                  <h4>Miercoles/Sabados</h4>
                              </div>
                              <div class="description">
                                  <p>
                                     Lo mejor para la salud es tener un peso normal o equiliblado.¿Que 
                                     deberia comer para bajar de peso? DESAYUNO:Gachas de avena con leche y canela y trocitos de plátano,
                                     MERIENDA:Kiwi, ETC.
                                  </p>
                              </div>
                              <div class="action">
                                  <button class="btn btn-noticias" onclick="window.location.href='../peso_normal/dietas/dist/sobrepeso.html#tercera'">Continuar Lendo</button>
                                  <a class="btn btn-noticias" onclick="contador3();">Descargar</a>
                              </div>
                          </div> `

 }else{
    conten1.innerHTML +=`<div class="card-noticia card_md">
                             <div class="data">
                              <p class="data_day" id="contador2"></p>
                   <p class="data_moth">Descargas</p>
                          </div>
                          <div class="wrap-img">
                              <img src="img/sobrepesoII.jpg" alt="Background">
                          </div>
                          <div class="info">
                              <div class="title">
                                  <div class="icon">
                                      <i class="material-icons">Nut5tec</i>
                                  </div>
                                  <h4>Martes/Viernes!!</h4>
                              </div>
                              <div class="description">
                                  <p>
                                      ¿Tienes obesidad o sobre peso? Esta es una de las mejores rutinas 
                                      diarias que puedes aprovechar!!.
                                      ¿Que deberia comer?  
                                      DESAYUNO:Tostada integral con tomate y yogur con manzana, MERIENDA:Naranja, ETC.
                                  </p>
                              </div>
                              <div class="action">
                                  <button class="btn btn-noticias" onclick="window.location.href='../peso_normal/dietas/dist/sobrepeso.html#menu'">Continuar Lendo</button>
                                  <a class="btn btn-noticias" onclick="contador2();">Descargar</a>
                              </div>
                          </div> `

                          conten2.innerHTML +=`<div class="card-noticia card_md">
                           <div class="data">
                          <p class="data_day" id="contador3"></p>
                          <p class="data_moth">Descargas</p>
                          </div>
                          <div class="wrap-img">
                              <img src="img/sobrePesoIII.jpg" alt="Background">
                          </div>
                          <div class="info">
                              <div class="title">
                                  <div class="icon">
                                      <i class="material-icons">Nut5tec</i>
                                  </div>
                                  <h4>Miercoles/Sabados</h4>
                              </div>
                              <div class="description">
                                  <p>
                                     Lo mejor para la salud es tener un peso normal o equiliblado.¿Que 
                                     deberia comer para bajar de peso? DESAYUNO:Gachas de avena con leche y canela y trocitos de plátano,
                                     MERIENDA:Kiwi, ETC.
                                  </p>
                              </div>
                              <div class="action">
                                  <button class="btn btn-noticias" onclick="window.location.href='../peso_normal/dietas/dist/sobrepeso.html#tercera'">Continuar Lendo</button>
                                  <a class="btn btn-noticias" onclick="contador3();">Descargar</a>
                              </div>
                          </div> `

                          conten3.innerHTML += `<div class="card-noticia card_md">
        <div class="data">
                              <p class="data_day" id="cont"></p>
                   <p class="data_moth">Descargas</p>
                          </div>
                          <div class="wrap-img">
                              <img src="img/sobrePeso.jpg" alt="Background">
                          </div>
                          <div class="info">
                              <div class="title">
                                  <div class="icon">
                                      <i class="material-icons">Nut5Tec</i>
                                  </div>
                                  <h4>Lunes/Jueves!!</h4>
                              </div>
                              <div class="description">
                                  <p>
                                 ¿Estas en sobrepeso? Es muy importante mantenerse en un peso equilibrado para 
                                 una mejor salud.
                                  ¿Que deberia Comer Para bajar de peso?
                                  DESAYUNO: Tostada integral con tomate, aceite y kiwi, MERIENDA:1 Pieza mediana de Manzana. etc.
                                  </p>
                              </div>
                              <div class="action">
                                  <button class="btn btn-noticias" onclick="window.location.href='../peso_normal/dietas/dist/sobrepeso.html#nosotros'">Continuar Lendo</button>
                                  <a class="btn btn-noticias" onclick="e();">Descargar</a>
                              </div>
                          </div>`
 }
  }else if(tres>=a && tres>=dos){
   if(a>dos){
     conten1.innerHTML += `<div class="card-noticia card_md">
                           <div class="data">
                          <p class="data_day" id="contador3"></p>
                          <p class="data_moth">Descargas</p>
                          </div>
                          <div class="wrap-img">
                              <img src="img/sobrePesoIII.jpg" alt="Background">
                          </div>
                          <div class="info">
                              <div class="title">
                                  <div class="icon">
                                      <i class="material-icons">Nut5tec</i>
                                  </div>
                                  <h4>Miercoles/Sabados</h4>
                              </div>
                              <div class="description">
                                  <p>
                                     Lo mejor para la salud es tener un peso normal o equiliblado.¿Que 
                                     deberia comer para bajar de peso? DESAYUNO:Gachas de avena con leche y canela y trocitos de plátano,
                                     MERIENDA:Kiwi, ETC.
                                  </p>
                              </div>
                              <div class="action">
                                  <button class="btn btn-noticias" onclick="window.location.href='../peso_normal/dietas/dist/sobrepeso.html#tercera'">Continuar Lendo</button>
                                  <a class="btn btn-noticias" onclick="contador3();">Descargar</a>
                              </div>
                          </div> `

     conten2.innerHTML += `<div class="card-noticia card_md">
        <div class="data">
                              <p class="data_day" id="cont"></p>
                   <p class="data_moth">Descargas</p>
                          </div>
                          <div class="wrap-img">
                              <img src="img/sobrePeso.jpg" alt="Background">
                          </div>
                          <div class="info">
                              <div class="title">
                                  <div class="icon">
                                      <i class="material-icons">Nut5Tec</i>
                                  </div>
                                  <h4>Lunes/Jueves!!</h4>
                              </div>
                              <div class="description">
                                  <p>
                                 ¿Estas en sobrepeso? Es muy importante mantenerse en un peso equilibrado para 
                                 una mejor salud.
                                  ¿Que deberia Comer Para bajar de peso?
                                  DESAYUNO: Tostada integral con tomate, aceite y kiwi, MERIENDA:1 Pieza mediana de Manzana. etc.
                                  </p>
                              </div>
                              <div class="action">
                                  <button class="btn btn-noticias" onclick="window.location.href='../peso_normal/dietas/dist/sobrepeso.html#nosotros'">Continuar Lendo</button>
                                  <a class="btn btn-noticias" onclick="e();">Descargar</a>
                              </div>
                          </div>`


     conten3.innerHTML += `<div class="card-noticia card_md">
                             <div class="data">
                              <p class="data_day" id="contador2"></p>
                   <p class="data_moth">Descargas</p>
                          </div>
                          <div class="wrap-img">
                              <img src="img/sobrepesoII.jpg" alt="Background">
                          </div>
                          <div class="info">
                              <div class="title">
                                  <div class="icon">
                                      <i class="material-icons">Nut5tec</i>
                                  </div>
                                  <h4>Martes/Viernes!!</h4>
                              </div>
                              <div class="description">
                                  <p>
                                      ¿Tienes obesidad o sobre peso? Esta es una de las mejores rutinas 
                                      diarias que puedes aprovechar!!.
                                      ¿Que deberia comer?  
                                      DESAYUNO:Tostada integral con tomate y yogur con manzana, MERIENDA:Naranja, ETC.
                                  </p>
                              </div>
                              <div class="action">
                                  <button class="btn btn-noticias" onclick="window.location.href='../peso_normal/dietas/dist/sobrepeso.html#menu'">Continuar Lendo</button>
                                  <a class="btn btn-noticias" onclick="contador2();">Descargar</a>
                              </div>
                          </div> `
   }else{
       conten1.innerHTML += ` <div class="card-noticia card_md">
                           <div class="data">
                          <p class="data_day" id="contador3"></p>
                          <p class="data_moth">Descargas</p>
                          </div>
                          <div class="wrap-img">
                              <img src="img/sobrePesoIII.jpg" alt="Background">
                          </div>
                          <div class="info">
                              <div class="title">
                                  <div class="icon">
                                      <i class="material-icons">Nut5tec</i>
                                  </div>
                                  <h4>Miercoles/Sabados</h4>
                              </div>
                              <div class="description">
                                  <p>
                                     Lo mejor para la salud es tener un peso normal o equiliblado.¿Que 
                                     deberia comer para bajar de peso? DESAYUNO:Gachas de avena con leche y canela y trocitos de plátano,
                                     MERIENDA:Kiwi, ETC.
                                  </p>
                              </div>
                              <div class="action">
                                  <button class="btn btn-noticias" onclick="window.location.href='../peso_normal/dietas/dist/sobrepeso.html#tercera'">Continuar Lendo</button>
                                  <a class="btn btn-noticias" onclick="contador3();">Descargar</a>
                              </div>
                          </div>  `


       conten2.innerHTML += `<div class="card-noticia card_md">
                             <div class="data">
                              <p class="data_day" id="contador2"></p>
                   <p class="data_moth">Descargas</p>
                          </div>
                          <div class="wrap-img">
                              <img src="img/sobrepesoII.jpg" alt="Background">
                          </div>
                          <div class="info">
                              <div class="title">
                                  <div class="icon">
                                      <i class="material-icons">Nut5tec</i>
                                  </div>
                                  <h4>Martes/Viernes!!</h4>
                              </div>
                              <div class="description">
                                  <p>
                                      ¿Tienes obesidad o sobre peso? Esta es una de las mejores rutinas 
                                      diarias que puedes aprovechar!!.
                                      ¿Que deberia comer?  
                                      DESAYUNO:Tostada integral con tomate y yogur con manzana, MERIENDA:Naranja, ETC.
                                  </p>
                              </div>
                              <div class="action">
                                  <button class="btn btn-noticias" onclick="window.location.href='../peso_normal/dietas/dist/sobrepeso.html#menu'">Continuar Lendo</button>
                                  <a class="btn btn-noticias" onclick="contador2();">Descargar</a>
                              </div>
                          </div> `

       conten3.innerHTML += `<div class="card-noticia card_md">
        <div class="data">
                              <p class="data_day" id="cont"></p>
                   <p class="data_moth">Descargas</p>
                          </div>
                          <div class="wrap-img">
                              <img src="img/sobrePeso.jpg" alt="Background">
                          </div>
                          <div class="info">
                              <div class="title">
                                  <div class="icon">
                                      <i class="material-icons">Nut5Tec</i>
                                  </div>
                                  <h4>Lunes/Jueves!!</h4>
                              </div>
                              <div class="description">
                                  <p>
                                 ¿Estas en sobrepeso? Es muy importante mantenerse en un peso equilibrado para 
                                 una mejor salud.
                                  ¿Que deberia Comer Para bajar de peso?
                                  DESAYUNO: Tostada integral con tomate, aceite y kiwi, MERIENDA:1 Pieza mediana de Manzana. etc.
                                  </p>
                              </div>
                              <div class="action">
                                  <button class="btn btn-noticias" onclick="window.location.href='../peso_normal/dietas/dist/sobrepeso.html#nosotros'">Continuar Lendo</button>
                                  <a class="btn btn-noticias" onclick="e();">Descargar</a>
                              </div>
                          </div> `
   }
  }
}
var dos =  <?php echo contador2()?>;
var a = <?php echo contador()?>;
var tres = <?php echo contador3()?>;

ordenar(a,dos,tres);
document.querySelector("#cont").innerHTML = <?php echo contador()?>; 
document.querySelector("#contador2").innerHTML = <?php echo contador2()?>; 
document.querySelector("#contador3").innerHTML = <?php echo contador3()?>; 
</script>