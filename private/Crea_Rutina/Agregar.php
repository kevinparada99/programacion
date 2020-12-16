<html lang="es">
<head>
	<meta charset="UTF-8"/>
	<title>Agregar Reseta</title>
	<link rel="stylesheet" type="text/css" href="estilos.css">
	<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
</head>

<body>


<?php   

$link = mysqli_connect("localhost","root","");
if($link){
  mysqli_select_db($link,"proyec_nutricion");
  mysqli_query($link,"SET NAMES 'utf8'");
}

?>


<div id="boxContent"> 
			<!-- Formlario principal -->
	<h1>Formulario de contacto</h1>
	<form method="POST" action="Insertar.php" enctype="multipart/form-data">
	<div id="formContent">
	<div class="contenedorForm">
		<label for="nombre">Nombre R:</label>
		<input class="campoTexto" type="text" required id="nombre" name="nombre">
  </div>
  
	<div class="contenedorForm derecha">
		
<select name="idCategoria" id="" required class="campoTexto" style="height: auto;">
    <option value="">Tiempos de comida</option>

    <?php 
    $v = mysqli_query($link,"SELECT * FROM categories");
    while($tiempos = mysqli_fetch_row($v)){
        ?>
      <option value="<?php echo $tiempos[0]?>"><?php echo $tiempos[1]?></option>
      <?php 
    }
      ?>
</select>
		<label for="email">T.Comida:</label>
	</div>
	<div class="contenedorForm">
		<label for="mensaje">Ingredientes:</label>
		<textarea class="campoTexto" id="mensaje" name="ingredientes" required></textarea>
  </div>
  <div class="contenedorForm">
		<label for="mensaje">Preparacion:</label>
		<textarea class="campoTexto" name="preparacion" id="mensaje" name="ingredientes" required></textarea>
  </div>
  <div class="contenedorForm">
		<label for="mensaje">T.Calorias:</label>
		<input class="text" name="calorias" name="ingredientes" required></input>
  </div>
  <div class="contenedorForm">
		<label for="mensaje">Imagen:</label>
    <input type="file" name="imagen" id="imagen" required>
  </div>

		<input type="submit" value="Guardar" class="enviar-btn">
	</div>
  </form>
    <!-- Formulario para móviles -->
    
	<div id="formMobile">
  <form method="POST" action="Insertar.php" enctype="multipart/form-data">
		<input type="radio" name="radio-1" class="radio" id="radioNombre">
		<label for="radioNombre">Nombre:</label>
			<input type="text" id="nombreMobile" class="campoTexto" name="nombre" required placeholder="Nombre de la reseta">
		<input type="radio" name="radio-2" class="radio" id="radioEmail">
    <label for="radioEmail">T.Comida:</label>
    <select name="idCategoria" id="emailMobile" required class="campoTexto" style="height: auto;">
    <option value="">Tiempos de comida</option>

    <?php 
    $v = mysqli_query($link,"SELECT * FROM categories");
    while($tiempos = mysqli_fetch_row($v)){
        ?>
      <option value="<?php echo $tiempos[0]?>"><?php echo $tiempos[1]?></option>
      <?php 
    }
      ?>
</select>
		
		<input type="radio" name="radio-3" class="radio" id="radioMensaje">
		<label for="radioMensaje">Ingredientes:</label>
      <textarea id="mensajeMobile" name="ingredientes" class="campoTexto" required placeholder="Ingredientes"></textarea>
      
      <input type="radio" name="radio-3" class="radio" id="radioPreparacion">
		<label for="radioPreparacion">Preparacion:</label>
			<textarea id="preparacionMobile" name="preparacion" class="campoTexto" required placeholder="Preparacion"></textarea>


       
      <input type="radio" name="radio-3" class="radio" id="radioCalorias">
		<label for="radioCalorias">Preparacion:</label>
			<textarea id="caloriasMobile" name="calorias" class="campoTexto" required placeholder="Calorias"></textarea>

          
    
    <input type="file" name="imagen"  id="imagenMobile" required>

			<input type="submit" value="Guardar" class="enviar-btn">
	</div>

	
  </form>
</div>
</body>
</html>