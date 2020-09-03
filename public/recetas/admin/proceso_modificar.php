<?php 

include("conexion.php");
$id = $_REQUEST['id'];
$nombre = $_POST['nombre'];
$informacion = $_POST['informacion'];
$link = $_POST['link'];
$Imagen = addslashes(file_get_contents($_FILES['Imagen']['tmp_name']));

$query = "UPDATE tabla_imagen SET nombre='$nombre',informacion='$informacion',link='$link',imagen='$Imagen' WHERE id ='$id'";
$resultado = $conexion->query($query);

if($resultado){
 header("location: res.php");
}else{
     echo "no";
}






?>
