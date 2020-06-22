<?php session_start();
/**
 * @author 5 tech <usis003118@ugb.edu.sv>
    *este es el que sirve para registrar un usuario
 */

    if(isset($_SESSION['usuario'])) {//si ahy un usuario activo lo manda al index
        header('location: index.php');
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){//se crean las variables con los datos obtenidos
        
        $correo = $_POST['correo'];
        $usuario = $_POST['usuario'];
        $clave = $_POST['clave'];
        $clave2 = $_POST['clave2'];
        
        $clave = hash('sha512', $clave);
        $clave2 = hash('sha512', $clave2);
        
        $error = '';
        /**
         * se asen las validaciones del los campos de correo de usuario y las claves
         * que no esten vacias y que cumplan con lo pedido
         */
        if (empty($correo)){
            $error .= '<i>Favor de ingresar el correo</i>';
        } 
        else if (strlen($correo) > 30) {
                $error .= '<i>El Correo Es Demasiado Largo</i>'; 
            }
            else if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                $error .= '<i>El Correo es incorrecto</i>'; 
            }
        
        else if (empty($usuario)){
            $error .= '<i>Favor ingresar el usuario</i>';
        }
        else if (strlen($usuario) > 20) {
            $error .= '<i>El Usuario Es Demasiado Largo</i>'; 
        }
        else if (strlen($usuario) < 4) {
            $error .= '<i>El Usuario Es Demasiado Corto</i>'; 
        }
        else if (empty($_POST['clave'])){
            $error .= '<i>Favor ingresar la contraseña</i>';
        }
        else if (strlen($_POST['clave']) < 8) {
            $error .= '<i>La contraseña Es Demasiada Corta</i>'; 
        } 
        else if (strlen($_POST['clave']) > 12) {
            $error .= '<i>La contraseña Es Demasiada larga</i>'; 
        }
        else if (empty($_POST['clave2'])){
            $error .= '<i>Favor ingresar la contraseña de confirmacion</i>';
        
        }else{//si todo esta bien ase la consulta a la bd
            try{
                $conexion = new PDO('mysql:host=localhost;dbname=proyec_nutricion', 'root', '');
            }catch(PDOException $prueba_error){
                echo "Error: " . $prueba_error->getMessage();
            }
            /**conprueva que no se encuentre ya registrado ese usuario */
            $statement = $conexion->prepare('SELECT * FROM login WHERE usuario = :usuario LIMIT 1');
            $statement->execute(array(':usuario' => $usuario));
            $resultado = $statement->fetch();
            
            /**
               * si se encuentra uno manda un mensaje */          
            if ($resultado != false){
                $error .= '<i>Este usuario ya existe</i>';
            }
            /**
             * conprueva que las contraseñas sean iguales
             */
            if ($clave != $clave2){
                $error .= '<i> Las contraseñas no coinciden</i>';
            }
            
            
        }
        /**
         * inserta los datos de el usuario a la db 
         */
        if ($error == ''){
            $statement = $conexion->prepare('INSERT INTO login (id, correo, usuario, clave) VALUES (null, :correo, :usuario, :clave)');
            $statement->execute(array(
                
                ':correo' => $correo,
                ':usuario' => $usuario,
                ':clave' => $clave
                
            ));
            
            $error .= '<i style="color: green;">Usuario registrado exitosamente</i>';//mensaje que se registro
        }
    }


    require '../../public/frontend/register-vista.php';//vista de registrar

?>