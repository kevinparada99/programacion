<?php session_start();

    if(isset($_SESSION['usuario'])) {
        header('location: principal/principal.php');
    }else{
        header('location: login.php');
    }


?>