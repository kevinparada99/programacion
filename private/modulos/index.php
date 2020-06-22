<?php session_start();
/**
 * @author 5 tech <usis003118@ugb.edu.sv>
    *este al iniciar correctamente un usuario lo manda a principal.php 
    *y si no lo manda a login
 */
    if(isset($_SESSION['usuario'])) {
        header('location: principal/principal.php');
    }else{
        header('location: login.php');
    }


?>