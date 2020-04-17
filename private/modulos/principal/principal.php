<?php session_start();

    if(isset($_SESSION['usuario'])){
        require '../../../public/Nutricion-master/index.html';
    }else{
        header ('location: ../login.php');
    }
        
?>