<?php session_start();

    if(isset($_SESSION['usuario'])){
        require '../../../public/vistas/inicio.php';
    }else{
        header ('location: ../login.php');
    }
        
?>