<?php session_start();
/**
 * @author 5 tech <usis003118@ugb.edu.sv>
    *se convierte el inicio.php cuando inicia un usuario
    *y si el usuario no esta no esta iniciado lo deja en login
 */
    if(isset($_SESSION['usuario'])){
        require 'mostrar.php';
    }else{
        header ('location: ../login.php');
    }
        
?>