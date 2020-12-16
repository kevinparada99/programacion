<?php  

$conexion = new mysqli("localhost","root","","proyec_nutricion");
if($conexion){
}else{
    echo "conexion fallida";
}

$id = $_REQUEST['id'];

$query = "DELETE FROM products WHERE product_id ='$id'";
$resultado = $conexion->query($query);

if($resultado){
   
   header("location: index.php");
}else{
     echo "no se pudo eliminar sorry";
}





?>