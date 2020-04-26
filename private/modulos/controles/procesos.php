<?php 
include('../../Config/Config.php');
$control = new control($conexion);

$proceso = '';
if( isset($_GET['proceso']) && strlen($_GET['proceso'])>0 ){
	$proceso = $_GET['proceso'];
}
$control->$proceso( $_GET['control'] );
print_r(json_encode($control->respuesta));

class control{
    private $datos = array(), $db;
    public $respuesta = ['msg'=>'correcto'];
    
    public function __construct($db){
        $this->db=$db;
    }
    public function recibirDatos($control){
        $this->datos = json_decode($control, true);
        $this->validar_datos();
    }
    private function validar_datos(){
        if( empty($this->datos['usuario']['id']) ){
            $this->respuesta['msg'] = 'por favor ingrese el usuario';
        }
        if( empty($this->datos['tipo']) ){
            $this->respuesta['msg'] = 'por favor ingrese el tipo';
        }
        $this->almacenar_control();
    }
    private function almacenar_control(){
        if( $this->respuesta['msg']==='correcto' ){
            if( $this->datos['accion']==='nuevo' ){
                $this->db->consultas('
                    INSERT INTO controles (idUsuario,tipo,fecha) VALUES(
                        "'. $this->datos['usuario']['id'] .'",
                        "'. $this->datos['tipo'].'",
                        "'. $this->datos['fecha'] .'"
                    )
                ');
                $this->respuesta['msg'] = 'Registro insertado correctamente';
            } else if( $this->datos['accion']==='modificar' ){
                $this->db->consultas('
                    UPDATE controles SET
                        idUsuario     = "'. $this->datos['usuario']['id'] .'",
                        tipo      = "'. $this->datos['tipo'] .'",
                        fecha         = "'. $this->datos['fecha'] .'"
                    WHERE idControl = "'. $this->datos['idControl'] .'"
                ');
                $this->respuesta['msg'] = 'Registro actualizado correctamente';
            }
        }
    }
    public function buscarControl($valor = ''){
        if( substr_count($valor, '-')===2 ){
            $valor = implode('-', array_reverse(explode('-',$valor)));
        }
        $this->db->consultas('
            select controles.idControl, controles.idUsuario, controles.tipo, 
                date_format(controles.fecha,"%d-%m-%Y") AS fecha, controles.fecha AS f, 
                usuarios.codigo, usuarios.nombre, 
                controles.tipo AS t
            from controles
                inner join usuarios on(usuarios.idUsuario=controles.idUsuario)
            where usuarios.nombre like "%'. $valor .'%" or 
                controles.tipo like "%'. $valor .'%" or
                controles.fecha like "%'. $valor .'%"

        ');
        $controles = $this->respuesta = $this->db->obtener_data();
        foreach ($controles as $key => $value) {
            $datos[] = [
                'idControl' => $value['idControl'],
                'usuario'      => [
                    'id'      => $value['idUsuario'],
                    'label'   => $value['nombre']
                ],
                'tipo'       => $value['t'],
                't'           => $value['tipo'],

                'fecha'       => $value['f'],
                'f'           => $value['fecha']

            ]; 
        }
        return $this->respuesta = $datos;
    }
    public function traer_usuarios(){
        $this->db->consultas('
            select usuarios.nombre AS label, usuarios.idUsuario AS id
            from usuarios
        ');
        $usuarios = $this->db->obtener_data();
        return $this->respuesta = ['usuarios'=>$usuarios];
    }
    public function eliminarControl($idControl = 0){
        $this->db->consultas('
            DELETE controles
            FROM controles
            WHERE controles.idControl="'.$idControl.'"
        ');
        return $this->respuesta['msg'] = 'Registro eliminado correctamente';;
    }
}
?>