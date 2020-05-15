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
            $this->respuesta['msg'] = 'Por favor ingrese el usuario.';
        }
        if( empty($this->datos['tipo']) ){
            $this->respuesta['msg'] = 'Por favor ingrese la enfermedad';
        }
        if( empty($this->datos['medicamento']['id']) ){
            $this->respuesta['msg'] = 'Por favor ingrese el medicamento';
        }
        $this->almacenar_control();
    }
    private function almacenar_control(){
        if( $this->respuesta['msg']==='correcto' ){
            if( $this->datos['accion']==='nuevo' ){
                $this->db->consultas('
                    INSERT INTO controles (idUsuario,tipo,idMedicamento,fecha,siguiente) VALUES(
                        "'. $this->datos['usuario']['id'] .'",
                        "'. $this->datos['tipo'].'",
                        "'. $this->datos['medicamento']['id'] .'",
                        "'. $this->datos['fecha'] .'",
                        "'. $this->datos['siguiente'] .'"
                    )
                ');
                $this->respuesta['msg'] = 'Registro insertado correctamente';
            } else if( $this->datos['accion']==='modificar' ){
                $this->db->consultas('
                    UPDATE controles SET
                        idUsuario     = "'. $this->datos['usuario']['id'] .'",
                        tipo      = "'. $this->datos['tipo'] .'",
                        idMedicamento     = "'. $this->datos['medicamento']['id'] .'",
                        fecha         = "'. $this->datos['fecha'] .'",
                        siguiente       = "'. $this->datos['siguiente'] .'"
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
            select controles.idControl, controles.idUsuario, controles.tipo,controles.siguiente, controles.idMedicamento,
                date_format(controles.fecha,"%d-%m-%Y") AS fecha, controles.fecha AS f, 
                usuarios.codigo, usuarios.nombre,
                medicamentos.codigom, medicamentos.nombrem, 
                controles.tipo AS t,
                controles.siguiente AS s
            from controles
                inner join usuarios on(usuarios.idUsuario=controles.idUsuario)
                inner join medicamentos on(medicamentos.idMedicamento=controles.idMedicamento)
            where usuarios.nombre like "%'. $valor .'%" or 
                controles.tipo like "%'. $valor .'%" or 
                controles.fecha like "%'. $valor .'%"
                order by siguiente

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
                'medicamento'      => [
                    'id'      => $value['idMedicamento'],
                    'label'   => $value['nombrem']
                ],
                'fecha'       => $value['f'],
                'f'           => $value['fecha'],
                'siguiente'       => $value['s'],
                's'           => $value['siguiente']

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
        $this->db->consultas('
            select medicamentos.nombrem AS label, medicamentos.idMedicamento AS id
            from medicamentos
        ');
        $medicamentos = $this->db->obtener_data();
        return $this->respuesta = ['usuarios'=>$usuarios, 'medicamentos'=>$medicamentos ];
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