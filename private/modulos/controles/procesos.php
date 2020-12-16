<?php 
/**
 * conexion a la base de datos desde config
 */
include('../../Config/Config.php');
$control = new control($conexion);
$proceso = '';
if( isset($_GET['proceso']) && strlen($_GET['proceso'])>0 ){
	$proceso = $_GET['proceso'];
}
$control->$proceso( $_GET['control'] );
print_r(json_encode($control->respuesta));
/**
 * @class control
 */

class control{
    private $datos = array(), $db;
    public $respuesta = ['msg'=>'correcto'];
    
    public function __construct($db){
        $this->db=$db;
    }
    /**
     * @function recibirDatos recibe los datos del control
     * @param object $control representa los datos en si
     */
    public function recibirDatos($control){
        $this->datos = json_decode($control, true);
        $this->validar_datos();
    }
    /**
     * funcion para validar que todos los campos no esten vacios
     */
    private function validar_datos(){
      
        date_default_timezone_set('America/El_salvador');
        $fecha_actual = date("d/m/y H:i:s A");

        if( empty($this->datos['usuario']['id']) ){
            $this->respuesta['msg'] = 'Por favor ingrese el usuario.';
        }
        if( empty($this->datos['tipo']) ){
            $this->respuesta['msg'] = 'Por favor ingrese la enfermedad';
        }
        if( empty($this->datos['medicamento']['id']) ){
            $this->respuesta['msg'] = 'Por favor ingrese el medicamento';
        }
        if( empty($this->datos['fecha']['id']) ){
            $this->datos['fecha'] = $fecha_actual;
        }
        if( empty($this->datos['cantidad']) ){
            $this->respuesta['msg'] = 'Por favor ingrese la cantidad de Medicamento';
        }
       
        
        $this->almacenar_control();
       
    }
    
    /**
     * 
     * funcion para almacenar en la tabla de controles
     * se introducen los datos obtenidos a los campos de la tabla en myqsl 
     */
    private function almacenar_control(){
        if( $this->respuesta['msg']==='correcto' ){
            if( $this->datos['accion']==='nuevo' ){
                $this->db->consultas('
                    INSERT INTO controles (idUsuario,tipo,idMedicamento,otro,observaciones,fecha,siguiente,cantidad) VALUES(
                        "'. $this->datos['usuario']['id'] .'",
                        "'. $this->datos['tipo'].'",
                        "'. $this->datos['medicamento']['id'] .'",
                        "'. $this->datos['otro'] .'",
                        "'. $this->datos['observaciones'] .'",
                        "'. $this->datos['fecha'] .'",
                        "'. $this->datos['siguiente'] .'",
                        "'. $this->datos['cantidad'] .'"
                    )
                ');
                $this->respuesta['msg'] = 'Registro insertado correctamente';
              //mensaje de registrado
                
              $this->actualizar_cantidad();
                /**
                 * se obtienen los datos que se actualizan y los actualiza los campos de la tabla
                 */
            } else if( $this->datos['accion']==='modificar' ){
                $this->db->consultas('
                    UPDATE controles SET
                        idUsuario     = "'. $this->datos['usuario']['id'] .'",
                        tipo      = "'. $this->datos['tipo'] .'",
                        idMedicamento     = "'. $this->datos['medicamento']['id'] .'",
                        otro         = "'. $this->datos['otro'] .'",
                        observaciones         = "'. $this->datos['observaciones'] .'",
                        fecha         = "'. $this->datos['fecha'] .'",
                        siguiente       = "'. $this->datos['siguiente'] .'",
                        cantidad       = "'. $this->datos['cantidad'] .'"
                    WHERE idControl = "'. $this->datos['idControl'] .'"
                ');
                $this->respuesta['msg'] = 'Registro actualizado correctamente';//mensaje que se actualizo
              
            }
        }
    }
    public function actualizar_cantidad(){
      
         $this->db->consultas('
        UPDATE medicamentos SET cantidad = cantidad - '. $this->datos['cantidad'].' WHERE idMedicamento = "'. $this->datos['medicamento']['id'] .'"
    ');

    }
       

    /**
     * funcion de buscar los datos de de la tabla controles y se realiza la consuta para que muetre 
     * todos los campos
     */
    public function buscarControl($valor = ''){
        if( substr_count($valor, '-')===2 ){
            $valor = implode('-', array_reverse(explode('-',$valor)));
        }
        $this->db->consultas('
            select controles.idControl, controles.idUsuario, controles.tipo,controles.siguiente, controles.idMedicamento, controles.otro, controles.observaciones,  controles.fecha,controles.cantidad,
               controles.fecha AS f, 
                usuarios.codigo, usuarios.nombre,
                medicamentos.codigom, medicamentos.nombrem,
                controles.tipo AS t,
                controles.otro AS k,
                controles.observaciones AS o,
                controles.siguiente AS s,
                controles.cantidad AS c
            from controles
                inner join usuarios on(usuarios.idUsuario=controles.idUsuario)
                inner join medicamentos on(medicamentos.idMedicamento=controles.idMedicamento)
            where usuarios.nombre like "%'. $valor .'%" or 
                controles.tipo like "%'. $valor .'%" or 
                controles.fecha like "%'. $valor .'%"
                order by siguiente

        ');
        /**
         * se obtiene el nombre de los productos de otras tablas por el id 
         * y los campos de la tabla controles
         */
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
                'otro'       => $value['k'],
                'k'           => $value['otro'],
                'observaciones'       => $value['o'],
                'o'           => $value['observaciones'],
                'fecha'       => $value['f'],
                'f'           => $value['fecha'],
                'siguiente'       => $value['s'],
                's'           => $value['siguiente'],
                'cantidad'       => $value['c'],
                'c'           => $value['cantidad']
      
            ]; 
        }
        return $this->respuesta = $datos;
    }
    /**
     * funcion para traer el nombre de usuario de la tabla de usuario
     */
    public function traer_usuarios(){
        $this->db->consultas('
            select usuarios.nombre AS label, usuarios.idUsuario AS id
            from usuarios
        ');
        $usuarios = $this->db->obtener_data();
        /**
         * funcion para traer el nombre del medicamento de la tabla medicamento
         */
        $this->db->consultas('
            select medicamentos.nombrem AS label, medicamentos.idMedicamento AS id
            from medicamentos
        ');
        $medicamentos = $this->db->obtener_data();
        return $this->respuesta = ['usuarios'=>$usuarios, 'medicamentos'=>$medicamentos ];
    }
    /**
     * funcion para eliminar un registro de la tabla control
     */
    public function eliminarControl($idControl = 0){
        $this->db->consultas('
            DELETE controles
            FROM controles
            WHERE controles.idControl="'.$idControl.'"
        ');
        return $this->respuesta['msg'] = 'Registro eliminado correctamente'; /** mensaje que se elimino*/ 
    }
}
?>