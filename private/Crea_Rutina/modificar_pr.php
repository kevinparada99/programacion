<?php 
$link = mysqli_connect("localhost","root","");
if($link){
    mysqli_select_db($link,"proyec_nutricion");
    mysqli_query($link,"SET NAMES 'utf8'");
  }
  $id = $_REQUEST['id'];
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

  $ficha22 = "UPDATE products SET product_cat = '$idCategoria',product_brand = '1',product_title ='$nombre',product_price ='$calorias',
  product_desc='$ingredientes',product_image='".$imagen."',product_keywords='$preparacion' WHERE product_id ='$id'";
  $insetar = mysqli_query($link,$ficha22);


  if($ficha22){
    echo'
       <script type="text/javascript">
        alert("La Reseta sea Modificado Correctamente!!");
        window.location.href="index.php";
        </script>';
}else{
    echo'
    <script type="text/javascript">
     alert("No se pudo Modificar");
     window.location.href="index.php";
     </script>';
}
