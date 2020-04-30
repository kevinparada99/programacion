<?php session_start();

    if(isset($_SESSION['usuario'])){
        require '../../../public/vistas/index.html';
    }else{
        header ('location: ../login.php');
    }
        
?>