<?php session_start();
/**
 * @author 5 tech <usis003118@ugb.edu.sv>
    *este es el que sirve para registrar un usuario
 */
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
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
            $error .= "'Favor ingresar el Correo'";
        } 
        else if (strlen($correo) > 30) {
                $error .= "'El Correo Es Demasiado Largo'"; 
            }
            else if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                $error .= "'El Correo es incorrecto'"; 
            }
        
        else if (empty($usuario)){
            $error .= "'Favor ingresar el Usuario'";
        }
        else if (strlen($usuario) > 20) {
            $error .= "'El Usuario Es Demasiado Largo'"; 
        }
        else if (strlen($usuario) < 4) {
            $error .= "'El Usuario Es Demasiado Corto'"; 
        }
        else if (empty($_POST['clave'])){
            $error .= "'Favor ingresar la contraseña'";
        }
        else if (strlen($_POST['clave']) < 8) {
            $error .= "'La contraseña Es Demasiada Corta tiene que ser mayor a 8 caracteres'"; 
        } 
        else if (strlen($_POST['clave']) > 12) {
            $error .= "'La contraseña Es Demasiada larga tiene que ser menor a 12 caracteres'"; 
        }
        else if (empty($_POST['clave2'])){
            $error .= "'Favor ingresar la contraseña de confirmacion'";
        
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
                $error .= "'Este usuario ya existe'";
            }
            /**
             * conprueva que las contraseñas sean iguales
             */
            if ($clave != $clave2){
                $error .= "' Las contraseñas no coinciden'";
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
 /* 
            require '../PHPMailer/Exception.php';
            require '../PHPMailer/PHPMailer.php';
            require '../PHPMailer/SMTP.php';

            $mail = new PHPMailer(true);

    try {

    $mail->SMTPOptions = array(
		'ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => true
		)
	);
    //Server settings
    $mail->SMTPDebug = 0;                   
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                    
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = '';                    
    $mail->Password   = '';                               
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
    $mail->Port       = 587;                                 

    //Recipients
    $mail->setFrom('geovannyparada99@gmail.com', 'Nutri5Tehc');
    $mail->addAddress($correo, 'Usuarioo');    


    // Content
    $mail->isHTML(true);                                 
    $mail->Subject = 'holaaaaaa pruevaa';
    $mail->Body    = 'Pruevaa  <b>nutri!</b>';

    $mail->send();
  
      } catch (Exception $e) {

      } 
     */
            $error .= "'Sea registrado exitosamente'";//mensaje que se registro
        }
       
    }

  


    require '../../public/frontend/register-vista.php';//vista de registrar
   

?>
  