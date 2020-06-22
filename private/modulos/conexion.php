<?php
    /**
 * @author 5 tech <usis003118@ugb.edu.sv>
    *ase la conexion con la base de datos de mysql de proyec_nutricion
 */
    try{
        $conexion = new PDO('mysql:host=localhost;dbname=proyec_nutricion', 'root', '');
    }catch(PDOException $prueba_error){
        echo "Error: " . $prueba_error->getMessage();
    }


?>