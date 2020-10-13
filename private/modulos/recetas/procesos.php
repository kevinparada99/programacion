<?php 
/**
 * @author 5 tech <usis003118@ugb.edu.sv>
    *prosesos registrar en la base de datos de controles
 */

/**
 * conexion a la base de datos desde config
 */
include('../../config/config.php');
$receta = new receta($conexion);

$proceso = '';
if( isset($_GET['proceso']) && strlen($_GET['proceso'])>0 ){
	$proceso = $_GET['proceso'];
}
$receta->$proceso( $_GET['receta'] );
print_r(json_encode($receta->respuesta));
/**
 * @class control
 */

class receta{
    private $datos = array(), $db;
    public $respuesta = ['msg'=>'correcto'];
    
    public function __construct($db){
        $this->db=$db;
    }
    /**
     * @function recibirDatos recibe los datos del control
     * @param object $control representa los datos en si
     */
    public function recibirDatos($receta){
        $this->datos = json_decode($receta, true);
        $this->validar_datos();
    }
    /**
     * funcion para validar que todos los campos no esten vacios
     */
    private function validar_datos(){
        date_default_timezone_set('America/El_salvador');
        $fecha_actual = date("d/m/y H:i:s A");

       
        if( empty($this->datos['nombres']) ){
            $this->respuesta['msg'] = 'Por favor ingrese el nombres de la receta.';
        }
        if( empty($this->datos['ingrediente']) ){
            $this->respuesta['msg'] = 'Por favor ingrese los ingredientes de la receta.';
        }
        if( empty(trim($this->datos['informacion'])) ){
            $this->respuesta['msg'] = 'Por favor ingrese información de la receta.';
        }
        if( empty(trim($this->datos['registro'])) ){
            $this->datos['registro'] = $fecha_actual;
        }else{
            $this->datos['codigo'] = $fecha_actual;
        }
        $this->almacenar_receta();
    }
    /**
     * funcion para almacenar en la tabla de nutriciones
     * se introducen los datos obtenidos a los campos de la tabla en myqsl 
     */
    private function almacenar_receta(){
        if( $this->respuesta['msg']==='correcto' ){
            if( $this->datos['accion']==='nuevo' ){
                $this->db->consultas('
                    INSERT INTO recetas (codigo,nombres,ingrediente,informacion,registro) VALUES(
                        "'. $this->datos['codigo'] .'",
                        "'. $this->datos['nombres'] .'",
                        "'. $this->datos['ingrediente'] .'",
                        "'. $this->datos['informacion'] .'",
                        "'. $this->datos['registro'] .'"
                    )
                ');
                $this->respuesta['msg'] = 'Registro insertado correctamente';
                /**
                 * se obtienen los datos que se actualizan y los actualiza los campos de la tabla
                 */
            } else if( $this->datos['accion']==='modificar' ){
                $this->db->consultas('
                    UPDATE recetas SET
                        codigo     = "'. $this->datos['codigo'] .'",
                        nombres     = "'. $this->datos['nombres'] .'",
                        ingrediente  = "'. $this->datos['ingrediente'] .'",
                        informacion   = "'. $this->datos['informacion'] .'",
                        registro   = "'. $this->datos['registro'] .'"
                    WHERE idReceta = "'. $this->datos['idReceta'] .'"
                ');
                $this->respuesta['msg'] = 'Registro actualizado correctamente';//mensaje que se actualizo
            }
        }
    }
    /**
     * funcion de buscar los datos de de la tabla medicamentos y se realiza la consuta para que muetre 
     * todos los campos
     */
    public function buscarReceta($valor = ''){
        $this->db->consultas('
            select recetas.idReceta, recetas.codigo, recetas.nombres, recetas.ingrediente, recetas.informacion,recetas.registro
            from recetas
            where recetas.codigo like "%'. $valor .'%" or recetas.nombres like "%'. $valor .'%"  or recetas.ingrediente like "%'. $valor .'%"
        ');
        /**
         * se obtiene el nombre de los  recetas de otras tablas por el id 
         * y los campos de la tabla controles
         */
        return $this->respuesta = $this->db->obtener_data();
    }
    /**
     * funcion para eliminar un registro de la tabla control
     */
    public function eliminarReceta($idReceta = 0){
        $this->db->consultas('
            DELETE recetas
            FROM recetas
            WHERE recetas.idReceta="'.$idReceta.'"
        ');
        return $this->respuesta['msg'] = 'Registro eliminado correctamente';
    }
}
?>