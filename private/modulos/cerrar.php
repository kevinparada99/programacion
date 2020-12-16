<?php session_start();
/**
 * @author 5 tech <usis003118@ugb.edu.sv>
    *este se ejecuta al presionar el botan de inicio en el control 
    *y sierra la secion del usuario y lo reidirige al index
 */
    session_destroy();
    $_SESSION = array();

    header('location: ../../index.php');

?>