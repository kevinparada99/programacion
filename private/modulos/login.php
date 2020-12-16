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
            $error .= "'Favor de ingresar el usuario'";

        } 
        else if (empty(trim ($_POST['clave']))){
            $error .= "'Favor de ingresar la clave'";
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
            ':clave' => $clave,
        ));

        $resultado = $statement->fetch();
        /**
         * si el usuario es correcto lo manda a prinsipal.php
         * y sino muestra en mensaje 
         */
    
        if ($resultado !== false){
            $_SESSION['usuario'] = $usuario;
            $conn=mysqli_connect('localhost','root','','proyec_nutricion');
            $sql="SELECT * FROM login WHERE usuario='$usuario' AND clave='$clave'";
            $run_query=mysqli_query($conn,$sql);
            mysqli_data_seek ($run_query, 0);
            $extraido= mysqli_fetch_array($run_query);
            $_SESSION['uid']=$extraido['id'];
    
            header('location: principal/principal.php');
        }else{
            $error .= "'Este usuario no existe'";
        }

    
    }
}
require '../../public/frontend/login-vista.php';//vista del login


?>

