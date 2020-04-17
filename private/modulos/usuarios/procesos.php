
<?php 
include('../../config/config.php');
$usuario = new usuario($conexion);

$proceso = '';
if( isset($_GET['proceso']) && strlen($_GET['proceso'])>0 ){
	$proceso = $_GET['proceso'];
}
$usuario->$proceso( $_GET['usuario'] );
print_r(json_encode($usuario->respuesta));

class usuario{
    private $datos = array(), $db;
    public $respuesta = ['msg'=>'correcto'];
    
    public function __construct($db){
        $this->db=$db;
    }
    public function recibirDatos($usuario){
        $this->datos = json_decode($usuario, true);
        $this->validar_datos();
    }
    private function validar_datos(){
        if( empty($this->datos['codigo']) ){
            $this->respuesta['msg'] = 'por favor ingrese el codigo del usuario';
        }
        if( empty($this->datos['nombre']) ){
            $this->respuesta['msg'] = 'por favor ingrese el nombre del usuario';
        }
        if( empty($this->datos['edad']) ){
            $this->respuesta['msg'] = 'por favor ingrese la edad del usuario';
        }
        $this->almacenar_usuario();
    }
    private function almacenar_usuario(){
        if( $this->respuesta['msg']==='correcto' ){
            if( $this->datos['accion']==='nuevo' ){
                $this->db->consultas('
                    INSERT INTO usuarios (codigo,nombre,edad,observacion) VALUES(
                        "'. $this->datos['codigo'] .'",
                        "'. $this->datos['nombre'] .'",
                        "'. $this->datos['edad'] .'",
                        "'. $this->datos['observacion'] .'"
                    )
                ');
                $this->respuesta['msg'] = 'Registro insertado correctamente';
            } else if( $this->datos['accion']==='modificar' ){
                $this->db->consultas('
                    UPDATE usuarios SET
                        codigo     = "'. $this->datos['codigo'] .'",
                        nombre     = "'. $this->datos['nombre'] .'",
                        edad        = "'. $this->datos['edad'] .'",
                        observacion   = "'. $this->datos['observacion'] .'"
                    WHERE idUsuario = "'. $this->datos['idUsuario'] .'"
                ');
                $this->respuesta['msg'] = 'Registro actualizado correctamente';
            }
        }
    }
    public function buscarUsuario($valor = ''){
        $this->db->consultas('
            select usuarios.idUsuario, usuarios.codigo, usuarios.nombre, usuarios.edad, usuarios.observacion
            from usuarios
            where usuarios.codigo like "%'. $valor .'%" or usuarios.nombre like "%'. $valor .'%" or usuarios.edad like "%'. $valor .'%"
        ');
        return $this->respuesta = $this->db->obtener_data();
    }


    public function eliminarUsuario($idUsuario = 0){

        $this->db->consultas('
            DELETE usuarios
            FROM usuarios
            WHERE usuarios.idUsuario="'.$idUsuario.'"
        ');
        return $this->respuesta['msg'] = 'Registro eliminado correctamente';
    }
}
?>