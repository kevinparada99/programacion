<?php session_start();
/**
 * @author 5 tech <usis003118@ugb.edu.sv>
    * este es el php del ligin
    *
 */

    if(isset($_SESSION['usuario'])) {//cuando un usuario ingresa correctamente lo manda al index.php
        header('location: index.php');
    }

    $error = '';
    /**
     * obtiene las variables POST de el usuario y la clave
     */
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $usuario = $_POST['usuario'];
        $clave = $_POST['clave'];
        $clave = hash('sha512', $clave);
        /**
         * validaciones del las variables de usuarios y contraseña
         * que no esten vacias 
         */
        if (empty($usuario)){
            $error .= '<i>Favor de ingresar el usuario</i>';
        } 
        else if (empty(trim ($_POST['clave']))){
            $error .= '<i>Favor de ingresar la clave</i>';
        }else{
            /**
            * conexion a la bd */        
            try{
            $conexion = new PDO('mysql:host=localhost;dbname=proyec_nutricion', 'root', '');
            }catch(PDOException $prueba_error){
                echo "Error: " . $prueba_error->getMessage();
            }
          /**
           * se traen los datos del usuario y la contarseña
           */
        $statement = $conexion->prepare('
        SELECT * FROM login WHERE usuario = :usuario AND clave = :clave'
        );
        /**
         * se comparan los datos
         */
        $statement->execute(array(
            ':usuario' => $usuario,
            ':clave' => $clave
        ));
            
        $resultado = $statement->fetch();
        
        /**
         * si el usuario es correcto lo manda a prinsipal.php
         * y sino muestra en mensaje 
         */
        if ($resultado !== false){
            $_SESSION['usuario'] = $usuario;
            header('location: principal/principal.php');
        }else{
            $error .= '<i>Este usuario no existe</i>';
        }
    }
}
require '../../public/frontend/login-vista.php';//vista del login


?>