<?php
/**
 * @author 5 tech <usis003118@ugb.edu.sv>
    *prosesos registrar en la base de datos de controles
 */

/**
 * conexion a la base de datos desde config
 */
include('../../config/config.php');
$producto = new producto($conexion);

$proceso = '';
if( isset($_GET['proceso']) && strlen($_GET['proceso'])>0 ){
	$proceso = $_GET['proceso'];
}
$producto->$proceso( $_GET['producto'] );
print_r(json_encode($producto->respuesta));
/**
 * @class control
 */
class producto{
    private $datos = array(), $db;
    public $respuesta = ['msg'=>'correcto'];
    
    public function __construct($db){
        $this->db=$db;
    }
    /**
     * @function recibirDatos recibe los datos del control
     * @param object $control representa los datos en si
     */
    public function recibirDatos($producto){
        $this->datos = json_decode($producto, true);
        $this->validar_datos();
    }
    /**
     * funcion para validar que todos los campos no esten vacios
     */
    private function validar_datos(){
        date_default_timezone_set('America/El_salvador');
        $fecha_actual = date("d/m/y H:i:s A");
      
      
        if( empty(trim($this->datos['nombre'])) ){
            $this->respuesta['msg'] = 'Por favor ingrese el nombre del producto.';
        }
        if( empty(trim($this->datos['cantidad'])) ){
            $this->respuesta['msg'] = 'Por favor ingrese la cantidad del producto.';
        }
        if( empty(trim($this->datos['tipo'])) ){
            $this->respuesta['msg'] = 'Por favor ingrese el tipo del producto.';
        }
        if( empty(trim($this->datos['fecha'])) ){
            $this->respuesta['msg'] = 'Por favor ingrese la caducidad del producto.';
        }
        if( empty(trim($this->datos['registro'])) ){
            $this->datos['registro'] = $fecha_actual;
        }

      
        $this->almacenar_producto();
    }
    /**
     * funcion para almacenar en la tabla de productos
     * se introducen los datos obtenidos a los campos de la tabla en myqsl 
     */
    private function almacenar_producto(){
        if( $this->respuesta['msg']==='correcto' ){
            if( $this->datos['accion']==='nuevo' ){
                $this->db->consultas('
                    INSERT INTO productos (nombre,cantidad,tipo,fecha,registro) VALUES(
                        "'. $this->datos['nombre'] .'",
                        "'. $this->datos['cantidad'] .'",
                        "'. $this->datos['tipo'] .'",
                        "'. $this->datos['fecha'] .'",
                        "'. $this->datos['registro'] .'"
                    )
                ');
                $this->respuesta['msg'] = 'Registro insertado correctamente';
                /**
                 * se obtienen los datos que se actualizan y los actualiza los campos de la tabla
                 */
            } else if( $this->datos['accion']==='modificar' ){
                $this->db->consultas('
                    UPDATE productos SET
                        nombre     = "'. $this->datos['nombre'] .'",
                        cantidad   = "'. $this->datos['cantidad'] .'",
                        tipo   = "'. $this->datos['tipo'] .'",
                        fecha      = "'. $this->datos['fecha'] .'",
                        registro    = "'. $this->datos['registro'] .'"
                    WHERE idProducto = "'. $this->datos['idProducto'] .'"
                ');
                $this->respuesta['msg'] = 'Registro actualizado correctamente';
            }
        }
    }
    /**
     * funcion de buscar los datos de de la tabla producto y se realiza la consuta para que muetre 
     * todos los campos
     */
    public function buscarProducto($valor = ''){
        $this->db->consultas('
            select productos.idProducto, productos.nombre, productos.cantidad, productos.tipo, productos.fecha, productos.registro
            from productos
            where productos.idProducto like "%'. $valor .'%" or productos.nombre like "%'. $valor .'%" or productos.tipo like "%'. $valor .'%"
            order by fecha
        ');
        /**
         * se obtiene el nombre de los productos de otras tablas por el id 
         * y los campos de la tabla controles
         */
        return $this->respuesta = $this->db->obtener_data();
    }
    /**
     * funcion para eliminar un registro de la tabla control
     */
    public function eliminarProducto($idProducto = 0){
        $this->db->consultas('
            DELETE productos
            FROM productos
            WHERE productos.idProducto="'.$idProducto.'"
        ');
        return $this->respuesta['msg'] = 'Registro eliminado correctamente';
    }
}
?>