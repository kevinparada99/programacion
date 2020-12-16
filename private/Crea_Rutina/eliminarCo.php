<?php  

$conexion = new mysqli("localhost","root","","proyec_nutricion");
if($conexion){
}else{
    echo "conexion fallida";
}

$id = $_REQUEST['id'];

$query = "DELETE FROM compartir WHERE NameUser ='$id' AND peso = '1'";
$resultado = $conexion->query($query);

if($resultado){
   
   header("location: compartidos.php");
}else{
     echo "no se pudo eliminar sorry";
}





?>