<?php
    
    try{
         $conexion = new PDO('mysql:host=localhost;dbname=proyec_nutricion', 'root', '');
    }catch(PDOException $prueba_error){
        echo "Error: " . $prueba_error->getMessage();
    }


?>