<?php 

include("conexion.php");

$nombre = $_POST['nombre'];
$informacion = $_POST['informacion'];
$link = $_POST['link'];
$Imagen = addslashes(file_get_contents($_FILES['Imagen']['tmp_name']));

$query = "INSERT INTO tabla_imagen(nombre,informacion,link,imagen) VALUES('$nombre','$informacion','$link','$Imagen')";

$resultado = $conexion->query($query);

if($resultado){
    echo'
       <script type="text/javascript">
        alert("La Reseta se  Guardo Correctamente!!");
        window.location.href="res.php";
        </script>';
}else{
    echo'
    <script type="text/javascript">
     alert("No se pudo Guardar");
     window.location.href="res.php";
     </script>';
}



?>
