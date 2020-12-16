<?php 
$link = mysqli_connect("localhost","root","");
if($link){
    mysqli_select_db($link,"proyec_nutricion");
    mysqli_query($link,"SET NAMES 'utf8'");
  }
  date_default_timezone_set('america/el_salvador');
  $fecha_actual = date("Y/m/d h:i:s a");


  $idCategoria = $_POST['idCategoria'];
  $nombre = $_POST['nombre'];
  $calorias = $_POST['calorias'];
  $ingredientes = $_POST['ingredientes'];
  $preparacion = $_POST['preparacion'];
  $imagen = $_FILES['imagen'] ['name'];
  $achivo = $_FILES['imagen'] ['tmp_name'];
  $ruta = "assets/prod_images";
  $ruta = $ruta."/".$imagen;

  move_uploaded_file($achivo,$ruta);

  $ficha22 = "INSERT INTO products SET 	product_cat = '$idCategoria',product_brand = '1',product_title ='$nombre',product_price ='$calorias',
  product_desc='$ingredientes',product_image='".$imagen."',product_keywords='$preparacion',fecha ='$fecha_actual', peso = 1";
  $insetar = mysqli_query($link,$ficha22);


  if($ficha22){
    echo'
       <script type="text/javascript">
        alert("La Reseta se  Guardo Correctamente!!");
        window.location.href="index.php";
        </script>';
}else{
    echo'
    <script type="text/javascript">
     alert("No se pudo Guardar");
     window.location.href="index.php";
     </script>';
}



?>