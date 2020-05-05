<?php session_start();

    if(isset($_SESSION['usuario'])) {
        header('location: index.php');
    }

    
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $correo = $_POST['correo'];
        $usuario = $_POST['usuario'];
        $clave = $_POST['clave'];
        $clave2 = $_POST['clave2'];
        
        $clave = hash('sha512', $clave);
        $clave2 = hash('sha512', $clave2);
        
        $error = '';

        
        if (empty($correo)){
            $error .= '<i>Favor de rellenar ingresar el correo</i>';
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
        else if (empty($clave)){
            $error .= '<i>Favor ingresar la contraseña</i>';
        }
        else if (!strlen($clave) > 4) {
            $error .= '<i>la  Correo Es Demasiado Corta</i>'; 
        }
        else if (empty($clave2)){
            $error .= '<i>Favor ingresar la contraseña de confirmacion</i>';
        

        }else{
            try{
                $conexion = new PDO('mysql:host=localhost;dbname=proyec_nutricion', 'root', '');
            }catch(PDOException $prueba_error){
                echo "Error: " . $prueba_error->getMessage();
            }
            
            $statement = $conexion->prepare('SELECT * FROM login WHERE usuario = :usuario LIMIT 1');
            $statement->execute(array(':usuario' => $usuario));
            $resultado = $statement->fetch();
            
                        
            if ($resultado != false){
                $error .= '<i>Este usuario ya existe</i>';
            }
            
            if ($clave != $clave2){
                $error .= '<i> Las contraseñas no coinciden</i>';
            }
            
            
        }
        
        if ($error == ''){
            $statement = $conexion->prepare('INSERT INTO login (id, correo, usuario, clave) VALUES (null, :correo, :usuario, :clave)');
            $statement->execute(array(
                
                ':correo' => $correo,
                ':usuario' => $usuario,
                ':clave' => $clave
                
            ));
            
            $error .= '<i style="color: green;">Usuario registrado exitosamente</i>';
        }
    }



    require '../../public/frontend/register-vista.php';

?>