<?php 
 
/**
 * @author 5 tech <usis003118@ugb.edu.sv>
    *prosesos registrar en la base de datos de controles
 */

/**
 * @link incluir conexion a la base de datos desde config
 */
include('../../config/config.php');
$usuario = new usuario($conexion);

$proceso = '';
if( isset($_GET['proceso']) && strlen($_GET['proceso'])>0 ){
	$proceso = $_GET['proceso'];
}
$usuario->$proceso( $_GET['usuario'] );
print_r(json_encode($usuario->respuesta));
/**
 *  @package clase de usuario
 * 
 */

class usuario{
    private $datos = array(), $db;
    public $respuesta = ['msg'=>'correcto'];
    
    public function __construct($db){
        $this->db=$db;
    }
    /**
     * @function recibirDatos recibe los datos del control
     * @param object $control representa los datos en si
     */
    public function recibirDatos($usuario){
        $this->datos = json_decode($usuario, true);
        $this->validar_datos();
    }

    /**
     * funcion para validar que todos los campos no esten vacios
     */
    private function validar_datos(){
         date_default_timezone_set('America/El_salvador');
         $fecha_actual = date("d/m/y H:i:s A");
 
        if( empty(trim($this->datos['nombre']) )){
            $this->respuesta['msg'] = 'Por favor ingrese el nombre del usuario.';
        }
        if( empty(trim($this->datos['edad'])) ){
            $this->respuesta['msg'] = 'Por favor ingrese la fecha de nacimiento del usuario.';
        }
        if( empty(trim($this->datos['inicial'])) ){
            $this->respuesta['msg'] = 'Por favor ingrese el peso del usuario.';
        }
        if( empty(trim($this->datos['libras'])) ){
            $this->respuesta['msg'] = 'Por favor ingrese el peso del usuario.';
        }
        if( empty(trim($this->datos['fechaini'])) ){
            $this->respuesta['msg'] = 'Por favor ingrese la fecha del peso del usuario.';
        }
        if( empty($this->datos['medicamento']['id']) ){
            $this->respuesta['msg'] = 'Por favor ingrese el medicamento.';
        }
        if( empty(trim($this->datos['enfermedad'])) ){
            $this->respuesta['msg'] = 'Por favor ingrese la enfermedad del usuario.';
        }
        if( empty(trim($this->datos['observacion'])) ){
            $this->respuesta['msg'] = 'Por favor ingrese alguna observación del usuario.';
        }
        if( empty(trim($this->datos['fechaac']))){
            $this->datos['fechaac'] = $fecha_actual;
        }
        $this->almacenar_usuario();
    }
    /**
     * funcion para almacenar en la tabla de productos
     * se introducen los datos obtenidos a los campos de la tabla en myqsl 
     */
    private function almacenar_usuario(){
        if( $this->respuesta['msg']==='correcto' ){
            if( $this->datos['accion']==='nuevo' ){
                $this->db->consultas('
                    INSERT INTO usuarios (codigo,nombre,edad,inicial,libras,fechaini,actual,fechaac,idMedicamento,enfermedad,nacimiento,observacion,metabolismo,pesoideal,imc) VALUES(
                        "'. $this->datos['codigo'] .'",
                        "'. $this->datos['nombre'] .'",
                        "'. $this->datos['edad'] .'",
                        "'. $this->datos['inicial'] .'",
                        "'. $this->datos['libras'] .'",
                        "'. $this->datos['fechaini'] .'",
                        "'. $this->datos['actual'] .'",
                        "'. $this->datos['fechaac'] .'",
                        "'. $this->datos['medicamento']['id'] .'",
                        "'. $this->datos['enfermedad'] .'",
                        "'. $this->datos['naci'] .'",
                        "'. $this->datos['observacion'] .'",
                        "'. $this->datos['metabolismo'] .'",
                        "'. $this->datos['pesoideal'] .'",
                        "'. $this->datos['imc'] .'"
                    )
                ');
                $this->respuesta['msg'] = 'Registro insertado correctamente';
                /**
                 * se obtienen los datos que se actualizan y los actualiza los campos de la tabla
                 */
            } else if( $this->datos['accion']==='modificar' ){
                $this->db->consultas('
                    UPDATE usuarios SET
                        codigo     = "'. $this->datos['codigo'] .'",
                        nombre     = "'. $this->datos['nombre'] .'",
                        edad        = "'. $this->datos['edad'] .'",
                        inicial     = "'. $this->datos['inicial'] .'",
                        libras     = "'. $this->datos['libras'] .'",
                        fechaini     = "'. $this->datos['fechaini'] .'",
                        actual        = "'. $this->datos['actual'] .'",
                        fechaac     = "'. $this->datos['fechaac'] .'",
                        idMedicamento  = "'. $this->datos['medicamento']['id'] .'",
                        enfermedad     = "'. $this->datos['enfermedad'] .'",
                        nacimiento     = "'. $this->datos['naci'] .'",
                        observacion   = "'. $this->datos['observacion'] .'",
                        metabolismo   = "'. $this->datos['metabolismo'] .'",
                        pesoideal   = "'. $this->datos['pesoideal'] .'",
                        imc   = "'. $this->datos['imc'] .'"
                    WHERE idUsuario = "'. $this->datos['idUsuario'] .'"
                ');
                $this->respuesta['msg'] = 'Registro actualizado correctamente';
            }
        }
    }
    /**
     * funcion de buscar los datos de de la tabla usuario y se realiza la consuta para que muetre 
     * todos los campos
     */
    public function buscarUsuario($valor = ''){
        $this->db->consultas('
            select usuarios.idUsuario, usuarios.codigo, usuarios.nombre, usuarios.edad, usuarios.inicial,usuarios.libras, usuarios.fechaini, usuarios.actual, usuarios.fechaac, usuarios.idMedicamento,  usuarios.enfermedad, usuarios.nacimiento, usuarios.observacion,
                    medicamentos.codigom, medicamentos.nombrem,
                    usuarios.codigo AS c,
                    usuarios.nombre AS n,
                    usuarios.edad AS e,
                    usuarios.inicial AS i,
                    usuarios.libras AS l,
                    usuarios.fechaini AS f,
                    usuarios.actual AS a,
                    usuarios.fechaac AS z,
                    usuarios.enfermedad AS d,
                    usuarios.nacimiento AS t,
                    usuarios.observacion AS o
            from usuarios
                    inner join medicamentos on(medicamentos.idMedicamento=usuarios.idMedicamento)
            where 
            usuarios.idUsuario like "%'. $valor .'%" or
            usuarios.nombre like "%'. $valor .'%" or 
            usuarios.actual like "%'. $valor .'%"
        
            ');
            /**
         * se obtiene el nombre de los usuarios de otras tablas por el id 
         * y los campos de la tabla controles
         */ 
        $usuarios = $this->respuesta = $this->db->obtener_data();
        foreach ($usuarios as $key => $value) {
            $datos[] = [
                'idUsuario' => $value['idUsuario'],
                
                'codigo'       => $value['c'],
                'c'           => $value['codigo'],

                'nombre'       => $value['n'],
                'n'           => $value['nombre'],

                'edad'       => $value['e'],
                'e'           => $value['edad'],

                'inicial'       => $value['i'],
                'i'           => $value['inicial'],

                'libras'       => $value['l'],
                'l'           => $value['libras'],

                'fechaini'       => $value['f'],
                'f'           => $value['fechaini'],

                'actual'       => $value['a'],
                'a'           => $value['actual'],

                'fechaac'       => $value['z'],
                'z'           => $value['fechaac'],

                'medicamento'      => [
                    'id'      => $value['idMedicamento'],
                    'label'   => $value['nombrem']
                ],
                'enfermedad'       => $value['d'],
                'd'           => $value['enfermedad'],

                'nacimiento'       => $value['t'],
                't'           => $value['nacimiento'],

                'observacion'       => $value['o'],
                'o'           => $value['observacion']

            ]; 
        }
        return $this->respuesta = $datos;
    }
    /**
     * funcion para traer el nombre de usuario de la tabla de usuario
     */
    public function traer_medicamentos(){
        $this->db->consultas('
            select medicamentos.nombrem AS label, medicamentos.idMedicamento AS id
            from medicamentos
        ');
        $medicamentos = $this->db->obtener_data();
        
        return $this->respuesta = ['medicamentos'=>$medicamentos];
    }
/**
         *  para traer el nombre del medicamento de la tabla medicamento
         */

    public function eliminarUsuario($idUsuario = 0){

        $this->db->consultas('
            DELETE usuarios
            FROM usuarios
            WHERE usuarios.idUsuario="'.$idUsuario.'"
        ');
        return $this->respuesta['msg'] = 'Registro eliminado correctamente';/** mensaje que se elimino*/ 
    }
    
}

?>