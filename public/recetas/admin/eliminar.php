<?php 

include("conexion.php");
$id = $_REQUEST['id'];

$query = "DELETE FROM tabla_imagen WHERE id ='$id'";
$resultado = $conexion->query($query);

if($resultado){
   
   header("location: res.php");
}else{
     echo "no";
}


?>
